<?php

namespace App\Repositories;

use Illuminate\Support\Facades\{DB,Auth};
use App\Contracts\{FcmInterface,RentInterface};
use App\Services\{AdminNotifyService,WhatsAppService};
use App\Models\{Task,RentCart,RentRequestDetail,RentRequest,Customer};

class RentRepository implements RentInterface
{
    protected $whatsAppService;
    protected $fcmNotification;
    protected $adminNotify;

    public function __construct(
        WhatsAppService $whatsAppService,
        FcmInterface $fcmNotification,
        AdminNotifyService $adminNotify
    ){
        $this->whatsAppService = $whatsAppService;
        $this->fcmNotification = $fcmNotification;
        $this->adminNotify     = $adminNotify;
    }

	public function cartItemList($guard)
	{
		return Auth::guard($guard)->user()->rentCarts()->with(
			['productRent','product.brand', 'product.category', 'product.subCategory', 'product.rents']
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

	public function orderList($guard = null, $pagination = false)
	{
        $relations = [
            'customer',
            'timeSlot',
            'details',
            'details.productRent',
            'details.product.brand',
            'details.product.category',
            'details.product.subCategory',
            'details.product.resources',
            'details.product.rents',
            'details.product.reviews.order.customer',
            'operations',
            'operations.actor'
        ];
        $query = RentRequest::query();
		if (!is_null($guard)) {
            $customer_id = Auth::guard($guard)->user()->id;
			$query->whereCustomerId($customer_id);
		}
        $query->with($relations)->orderBy('created_at', 'desc');
		return $pagination ? $query->paginate() : $query->get();
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
                $product = $row->product;
                $order->details()->create([
                    'product_id'=> $row->product_id,
                    'product_rent_id'=> $row->product_rent_id,
                    'quantity'  => $row->quantity,
                    'from'      => $row->from,
                    'to'        => $row->to,
                    'delivery_charges' => $product->delivery_charges
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
            if(settings('rent_order_fcm_notification_to_customer') == 'Yes' && $guard == 'customerapi'){
                $data = [
                    'title'     => 'Rent Request',
                    'body'      => 'Your rental request has been submitted successfully.',
                    'user_type' => 'App\Models\Customer',
                    'user_id'   => $customer->id
                ];
                $this->fcmNotification->store($data);
            }
            if(settings('rent_order_fcm_notification_to_admin') == 'Yes'){
                $data = [
                    'title'  => 'New Rent Request',
                    'body'   => 'New rent request received from '. $customer->name,
                    'type'   => 'Rent Request',
                    'id'     => $order->id,
                    'name'   => $customer->name,
                    'image'  => $customer->image,
                    'message'=> 'New rent request submit click on link to see detail',
                ];
                $this->adminNotify->sendNotification($data);
            }
            return $order;
        });
        return $responce;
	}

	public function orderFind($id)
	{
        $relations = [
            'customer',
            'timeSlot',
            'details',
            'details.productRent',
            'details.product.brand',
            'details.product.category',
            'details.product.subCategory',
            'details.product.resources',
            'details.product.rents',
            'details.product.reviews.order.customer',
            'operations',
            'operations.actor'
        ];
		return RentRequest::with($relations)->find($id);
	}

    public function orderUpdate($data, $id, $guard)
	{
        DB::transaction(function () use ($data, $id, $guard) {
            $employeeFcm = false;
            $customerFcm = false;
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
                    $customerFcm = true;
                    break;

                case 'Confirmed':
                    $order->operations()->create([
                        'actor_id'   => auth()->user()->id,
                        'actor_type' => 'App\Models\User',
                        'action'     => 'Change Order Status to Confirmed'
                    ]);
                    $customerFcm = true;
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
                        'employee_service' => $data['employee_service'],
                        'task_id'     => $order->id,
                        'status'      => 'Pending'
                    ]);
                    $employeeFcm = true;
                    $customerFcm = true;
                    $employee = $data['warehouseboy'];
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
                        'employee_service' => $data['employee_service'],
                        'task_id'     => $order->id,
                        'status'      => 'Pending'
                    ]);
                    $employeeFcm = true;
                    $customerFcm = true;
                    $employee = $data['driver'];
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
                    $customerFcm = true;
                    $data['status'] = 'Out For Delivery';
                    break;

                case 'Delivered':
                    $order->operations()->create([
                        'actor_id' => Auth::guard('employee')->user()->id,
                        'actor_type' => 'App\Models\Employee',
                        'action' => 'Order delivered to customer.'
                    ]);
                    $customerFcm = true;
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
                        'employee_service' => $data['employee_service'],
                        'task_id'     => $order->id,
                        'status'      => 'Pending'
                    ]);
                    $data['status'] = 'Returning';
                    $employeeFcm = true;
                    $customerFcm = true;
                    $employee = $data['driver'];
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
                    $customerFcm = true;
                    break;
                case 'Completed':
                    $order->operations()->create([
                        'actor_id' => auth()->user()->id,
                        'actor_type' => 'App\Models\User',
                        'action' => 'Order status change to completed'
                    ]);
                    break;
            }
            $order->update($data);
            if($order->status == 'Collected' || $order->status == 'Cancelled'){
                foreach($order->details as $row){
                    $row->product->increment('quantity', $row->quantity);
                }
            }
            if (settings('rent_order_fcm_notification_to_customer') == 'Yes' && $customerFcm) {
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
                    'title'     => 'Rent Request ' . $data['status'],
                    'body'      => $body,
                    'user_type' => 'App\Models\Customer',
                    'user_id'   => $order->customer->id
                ];
                $this->fcmNotification->store($fcmData);
            }
            if (settings('employee_task_fcm_notification') == 'Yes' && $employeeFcm) {
                $fcmData = [
                    'title'     => 'Rent Order Assign',
                    'body'      => 'New task assign to you check your task list',
                    'user_type' => 'App\Models\Employee',
                    'user_id'   => $employee
                ];
                $this->fcmNotification->store($fcmData);
            }
        });
        return true;
	}

    public function updatePayment($data, $id)
    {
        DB::transaction(function () use ($data, $id) {
            $request = RentRequest::find($id);
                $request->operations()->create([
                    'actor_id' => auth()->user()->id,
                    'actor_type' => 'App\Models\User',
                    'action' => 'Request payment updated by admin.'
                ]);
                $data['payment_received'] = 'Yes';
                unset($data['status']);
            $request->update($data);
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

    public function dateExtend($date, $id)
    {
        RentRequestDetail::find($id)->update(['to' => strtotime($date)]);
    }
}
