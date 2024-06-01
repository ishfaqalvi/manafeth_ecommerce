<?php

namespace App\Repositories;
use App\Models\Task;
use App\Models\RentRequestDetail;
use App\Services\WhatsAppService;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Contracts\{FcmInterface,RentInterface};
use App\Models\{RentCart,RentRequest,Customer};

class RentRepository implements RentInterface
{
    protected $whatsAppService;
    protected $fcmNotification;

    public function __construct(
        WhatsAppService $whatsAppService,
        FcmInterface $fcmNotification
    ){
        $this->whatsAppService = $whatsAppService;
        $this->fcmNotification = $fcmNotification;
    }

	public function cartItemList($guard)
	{
		return Auth::guard($guard)->user()->rentCarts()->with(
			['product.brand', 'product.category', 'product.subCategory']
		)->get();
	}

    public function cartStoreItem($data, $guard)
	{
        if($guard == 'Admin'){
            $customer = Customer::find($data['customer_id']);
        }else{
            $customer = Auth::guard($guard)->user();
        }
        $product = $data['product_id'];
        $data['customer_id'] = $customer->id;
        $checkProduct = $customer->rentCarts()->whereProductId($product)->first();
        if ($checkProduct) {
            return false;
        }
        $cart = RentCart::create($data);
        if(settings('rent_item_add_to_cart_whatsapp_notification') == 'Yes'){
            $data = [
                $customer->name,
                $customer->mobile_number,
                $cart->product->name,
                $cart->quantity,
                date('d M Y', $cart->from),
                date('d M Y', $cart->to)
            ];
            $this->whatsAppService->sendMessage('rental_product_added_to_cart', $data);
        }
        return true;
	}

	public function cartUpdateItem($data, $id)
	{
		RentCart::find($id)->update($data);
	}

	public function cartDeleteItem($id)
	{
		RentCart::find($id)->delete();
	}

	public function orderList($guard = null)
	{
		if ($guard) {
            $customer_id = Auth::guard($guard)->user()->id;
			$orders = RentRequest::whereCustomerId($customer_id)->with(
				['details','details.product.brand', 'details.product.category', 'details.product.subCategory','operations']
			)->get();
		}else{
			$orders = RentRequest::with(
				['details','details.product.brand', 'details.product.category', 'details.product.subCategory','operations']
			)->get();
		}
		return $orders;
	}

    public function orderNew()
    {
        return new RentRequest();
    }

    public function orderStore($data, $guard)
	{
        $customer = $guard == 'Admin' ? Customer::find($data['customer_id']) : Auth::guard($guard)->user();
        if($customer->rentCarts()->count() == 0)
        {
            return false;
        }
        $responce = DB::transaction(function () use($data, $guard, $customer) {
            $products = '';
            $order = $customer->rentRequests()->create($data);
            foreach($customer->rentCarts as $row){
                $order->details()->create([
                    'product_id'=> $row->product_id,
                    'quantity'  => $row->quantity,
                    'from'      => $row->from,
                    'to'        => $row->to
                ]);
                $row->product->decrement('quantity', $row->quantity);
                $products .= $row->product->name.' ( '.$row->quantity.' Qty)'.' (From: '. date('d M Y', $row->from).') (To: '.date('d M Y', $row->to).')';
                $row->delete();
            }
            $order->operations()->create([
                'actor_id'   => $guard == 'Admin' ? auth()->user()->id : $customer->id,
                'actor_type' => $guard == 'Admin' ? 'App\Models\User' : 'App\Models\Customer',
                'action'     => 'Rental Request Placed'
            ]);
            if(settings('rent_order_whatsapp_notification') == 'Yes'){
                $data = [$data['name'], $data['phone_number'], $products];
                $this->whatsAppService->sendMessage('renta_order_placed', $data);
            }
            if(settings('rent_order_fcm_notification') == 'Yes' && $guard == 'customerapi'){
                $data = [
                    'title' => 'Rent Request',
                    'body' => 'Your rental request has been submitted successfully.',
                    'customer_id' => $customer->id
                ];
                $this->fcmNotification->store($data);
            }
            return $order;
        });
        return $responce;
	}

	public function orderFind($id)
	{
		return RentRequest::with(['details','details.product.brand', 'details.product.category', 'details.product.subCategory','operations'])->find($id);
	}

    public function orderUpdate($data, $id, $guard)
	{
        DB::transaction(function () use ($data, $id, $guard) {
            $order = RentRequest::find($id);
            $actorId = $guard == 'Admin' ? auth()->user()->id : $order->customer->id;
            $actorType = $guard == 'Admin' ? 'App\Models\User' : 'App\Models\Customer';

            switch ($data['status']) {
                case 'Cancelled':
                    foreach ($order->details as $row) {
                        $row->product->increment('quantity', $row->quantity);
                    }
                    $order->operations()->create([
                        'actor_id' => $actorId,
                        'actor_type' => $actorType,
                        'action' => 'Order Cancelled'
                    ]);
                    break;

                case 'Confirmed':
                    $order->operations()->create([
                        'actor_id'   => auth()->user()->id,
                        'actor_type' => 'App\Models\User',
                        'action'     => 'Change Order Status to Confirmed'
                    ]);
                    break;

                case 'Processing':
                    $order->operations()->create([
                        'actor_id' => auth()->user()->id,
                        'actor_type' => 'App\Models\User',
                        'action' => 'Order assigned to warehouse boy.'
                    ]);
                    Task::create([
                        'employee_id' => $data['warehouseboy'],
                        'task_type'   => 'App\Models\RentRequest',
                        'task_id'     => $order->id,
                        'status'      => 'Pending'
                    ]);
                    break;

                case 'Assign To Driver for deliver':
                    $order->operations()->create([
                        'actor_id' => auth()->user()->id,
                        'actor_type' => 'App\Models\User',
                        'action' => 'Order assigned to driver for delivery.'
                    ]);
                    Task::create([
                        'employee_id' => $data['driver'],
                        'task_type'   => 'App\Models\RentRequest',
                        'task_id'     => $order->id,
                        'status'      => 'Pending'
                    ]);
                    $data['status'] = 'Processing';
                    break;

                case 'Ready for Pickup':
                    $order->operations()->create([
                        'actor_id' => Auth::guard('employee')->user()->id,
                        'actor_type' => 'App\Models\Employee',
                        'action' => 'Order is ready for pickup by driver.'
                    ]);
                    break;

                case 'Picked Up':
                    $order->operations()->create([
                        'actor_id' => Auth::guard('employee')->user()->id,
                        'actor_type' => 'App\Models\Employee',
                        'action' => 'Order picked up by driver.'
                    ]);
                    $data['status'] = 'Out For Delivery';
                    break;

                case 'Delivered':
                    $order->operations()->create([
                        'actor_id' => Auth::guard('employee')->user()->id,
                        'actor_type' => 'App\Models\Employee',
                        'action' => 'Order delivered to customer.'
                    ]);
                    break;

                case 'Assign To Driver for return':
                    $order->operations()->create([
                        'actor_id' => auth()->user()->id,
                        'actor_type' => 'App\Models\User',
                        'action' => 'Order assigned to driver to return product.'
                    ]);
                    Task::create([
                        'employee_id' => $data['driver'],
                        'task_type'   => 'App\Models\RentRequest',
                        'task_id'     => $order->id,
                        'status'      => 'Pending'
                    ]);
                    $data['status'] = 'Returning';
                    break;

                case 'Ready For Return':
                    $order->operations()->create([
                        'actor_id' => Auth::guard('employee')->user()->id,
                        'actor_type' => 'App\Models\Employee',
                        'action' => 'Order is ready for return by driver.'
                    ]);
                    break;

                case 'Out For Return':
                    $order->operations()->create([
                        'actor_id' => Auth::guard('employee')->user()->id,
                        'actor_type' => 'App\Models\Employee',
                        'action' => 'Order picked up by driver.'
                    ]);
                    break;

                case 'Returned':
                    $order->operations()->create([
                        'actor_id' => Auth::guard('employee')->user()->id,
                        'actor_type' => 'App\Models\Employee',
                        'action' => 'Order return to warehoue by driver.'
                    ]);
                    break;

                case 'Collecting':
                    $order->operations()->create([
                        'actor_id' => auth()->user()->id,
                        'actor_type' => 'App\Models\User',
                        'action' => 'Warhouse boy collecting products.'
                    ]);
                    Task::create([
                        'employee_id' => $data['warehouseboy'],
                        'task_type'   => 'App\Models\RentRequest',
                        'task_id'     => $order->id,
                        'status'      => 'Pending'
                    ]);
                    break;

                case 'Collected':
                    $order->operations()->create([
                        'actor_id' => Auth::guard('employee')->user()->id,
                        'actor_type' => 'App\Models\Employee',
                        'action' => 'Warhouse boy collected products.'
                    ]);
                    break;

                case 'Completed':
                    $order->operations()->create([
                        'actor_id' => auth()->user()->id,
                        'actor_type' => 'App\Models\User',
                        'action' => 'Order status change to completed'
                    ]);
                    $data['payment_received'] = 'Yes';
                    break;
            }
            $order->update($data);
            if($order->status == 'Collected' || $order->status == 'Cancelled'){
                foreach($order->details as $row){
                    $row->product->increment('quantity', $row->quantity);
                }
            }
            if (settings('rent_order_fcm_notification') == 'Yes') {
                if($order->status == 'Out For Delivery'){
                    $driver = Auth::guard('employee')->user();
                    $body = 'Your order is on the way! Your driver, '. $driver->name .', will deliver your order soon. You can contact them at '. $driver->mobile_number.' if you have any questions or concerns. Thank you for choosing us!';
                }elseif($order->status == 'Ready For Return'){
                    $driver = Auth::guard('employee')->user();
                    $body = 'Your rent period is end now its time to return the product! Your driver, '. $driver->name .', will picked up your order soon. You can contact them at '. $driver->mobile_number.' if you have any questions or concerns. Thank you for choosing us!';
                }else{
                    $body = 'Your order has been ' . $data['status'] . ' successfully.';
                }
                $fcmData = [
                    'title' => 'Rent Request ' . $data['status'],
                    'body' => $body,
                    'customer_id' => $order->customer->id
                ];
                $this->fcmNotification->store($fcmData);
            }
        });
        return true;
	}

    public function orderDelete($id)
	{
        $request = RentRequest::find($id);
        $request->details()->delete();
		return $request->delete();
	}

    public function orderReview($data)
    {
        $record = RentRequestDetail::find($data['id']);
        if(is_null($record->star) && is_null($record->remarks)){
            $record->update($data);
            return true;
        }
        return false;
    }
}
