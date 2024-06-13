<?php

namespace App\Repositories;

use \Mpdf\Mpdf;
use Illuminate\Support\Facades\{DB,Auth,File};
use App\Contracts\{FcmInterface,SaleInterface};
use App\Services\{AdminNotifyService,WhatsAppService};
use App\Models\{User,Task,Product,Cart,Order,Customer,OrderDetail,OrderDetailService};

class SaleRepository implements SaleInterface
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
		return Auth::guard($guard)->user()->carts()->with(['product.brand', 'product.category', 'product.subCategory', 'product.reviews.order.customer'])->get();
	}

    public function cartStoreItem($data, $guard)
	{
        if($guard == 'Admin'){
            $customer = Customer::find($data['customer_id']);
        }else{
            $customer = Auth::guard($guard)->user();
        }
        $product = $data['product_id'];
        $checkProduct = $customer->carts()->whereProductId($product)->first();
        if ($checkProduct) {
            return false;
        }
        $cart = Cart::create(['customer_id' => $customer->id, 'product_id' => $product, 'quantity' => $data['quantity']]);
        if(settings('sale_item_add_to_cart_whatsapp_notification') == 'Yes'){
            $data = [$customer->name, $customer->mobile_number, $cart->product->name];
            $this->whatsAppService->sendMessage('sale_product_added_to_cart', $data);
        }
        return true;
	}

	public function cartUpdateItem($data, $id)
	{
		Cart::find($id)->update($data);
	}

	public function cartDeleteItem($id)
	{
		Cart::find($id)->delete();
	}

	public function orderList($customer_id = null, $employee_id = null,$pagination = false)
	{
        $query = Order::query();
		if (!is_null($customer_id)) {
            $query->whereCustomerId($customer_id);
		}
        if (!is_null($employee_id)) {
            $query->whereAssignTo($employee_id);
		}
        $relations = [
            'customer',
            'timeSlot',
            'details',
            'operations',
            'operations.actor',
            'details.services',
            'details.product.brand',
            'details.product.category',
            'details.product.resources',
            'details.product.subCategory',
            'details.product.reviews.order.customer'
        ];
        $query->with($relations)->orderBy('created_at', 'desc');
		return $pagination ? $query->paginate() : $query->get();
	}

	public function orderNew()
	{
		return new Order();
	}

    public function orderFind($id)
	{
        $relations = [
            'customer',
            'timeSlot',
            'details',
            'operations',
            'operations.actor',
            'details.services',
            'details.product.brand',
            'details.product.category',
            'details.product.resources',
            'details.product.subCategory',
            'details.product.reviews.order.customer'
        ];
		return Order::with($relations)->find($id);
	}

	public function orderStore($data, $guard)
	{
        if($guard == 'Admin'){
            $customer = Customer::find($data['customer_id']);
        }else{
            $customer = Auth::guard($guard)->user();
        }
        if($customer->carts()->count() == 0 && !isset($data['buy_now']))
        {
            return false;
        }
        $responce = DB::transaction(function () use($data, $guard, $customer) {
            $products = '';
            $order = $customer->orders()->create($data);
            if (isset($data['buy_now']) && !is_null($data['buy_now'])) {
                $product = Product::find($data['product_id']);
                $price = $product->discount > 0 ? $product->discount : $product->price;
                $detail = $order->details()->create([
                    'product_id' => $data['product_id'],
                    'quantity'   => 1,
                    'price'      => $price,
                    'warranty'   => $product->warranty,
                    'maintenance'=> $product->maintenance
                ]);
                $product->decrement('quantity');
                $this->storeServices($detail->id, $product);
                $products .= $product->name.' ( 1 Qty)';
            }else{
                foreach($customer->carts as $row){
                    $product = $row->product;
                    $price = $product->discount > 0 ? $product->discount : $product->price;
                    $detail = $order->details()->create([
                        'product_id' => $row->product_id,
                        'quantity'   => $row->quantity,
                        'price'      => $price,
                        'warranty'   => $product->warranty,
                        'maintenance'=> $product->maintenance
                    ]);
                    $products .= $product->name.' ( '.$row->quantity.' Qty)';
                    $product->decrement('quantity', $row->quantity);
                    $row->delete();
                }
            }
            $order->operations()->create([
                'actor_id'   => $guard == 'Admin' ? auth()->user()->id : $customer->id,
                'actor_type' => $guard == 'Admin' ? 'App\Models\User' : 'App\Models\Customer',
                'action'     => 'Order Placed'
            ]);
            if(settings('sale_order_whatsapp_notification') == 'Yes'){
                $data = [$customer->name, $customer->mobile_number, $products];
                $this->whatsAppService->sendMessage('purchase_order_placed', $data);
            }
            if(settings('sale_order_fcm_notification_to_customer') == 'Yes' && $guard == 'customerapi'){
                $data = [
                    'title'     => 'Order Placed',
                    'body'      => 'Your order has been placed successfully.',
                    'user_type' => 'App\Models\Customer',
                    'user_id'   => $customer->id
                ];
                $this->fcmNotification->store($data);
            }
            if(settings('sale_order_fcm_notification_to_admin') == 'Yes'){
                $data = [
                    'title'  => 'New Sale Order',
                    'body'   => 'New sale order received from '. $customer->name,
                    'type'   => 'Sale Order',
                    'id'     => $order->id,
                    'name'   => $customer->name,
                    'image'  => $customer->image,
                    'message'=> 'New sale order submit click on link to see detail',
                ];
                $this->adminNotify->sendNotification($data);
            }
            return $order;
        });
        return $responce;
	}

    public function orderConfirm($data, $id)
	{
        $responce = DB::transaction(function () use($data, $id) {
            $order = Order::find($id);
            $order->update($data);
            foreach($data['ids'] as $key => $id){
                $detail = OrderDetail::find($id);
                $detail->update([
                    'price'         => $data['price'][$key],
                    'warranty'      => $data['warranty'][$key],
                    'maintenance'   => $data['maintenance'][$key],
                    'serial_number' => $data['serial_number'][$key]
                ]);
                $this->storeServices($detail);
            }
            $order->operations()->create([
                'actor_id'   => auth()->user()->id,
                'actor_type' => 'App\Models\User',
                'action'     => 'Change Order Status to Confirmed'
            ]);

            if (settings('sale_order_fcm_notification_to_customer') == 'Yes') {
                $fcmData = [
                    'title'     => 'Order Confirmed',
                    'body'      => 'Your order has been confirmed successfully.',
                    'user_type' => 'App\Models\Customer',
                    'user_id'   => $order->customer->id
                ];
                $this->fcmNotification->store($fcmData);
            }
            return $order;
        });
        return $responce;
	}

	public function orderUpdate($data, $id, $guard)
	{
        DB::transaction(function () use ($data, $id, $guard) {
            $employeeFcm = false;
            $order = Order::find($id);
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

                case 'Assign To Warehouse Boy':
                    $order->operations()->create([
                        'actor_id' => auth()->user()->id,
                        'actor_type' => 'App\Models\User',
                        'action' => 'Order assigned to warehouse boy.'
                    ]);
                    Task::create([
                        'employee_id' => $data['warehouseboy'],
                        'task_type'   => 'App\Models\Order',
                        'task_id'     => $order->id,
                        'status'      => 'Pending'
                    ]);
                    $employeeFcm = true;
                    $employee = $data['warehouseboy'];
                    $data['status'] = 'Processing';
                    break;

                case 'Assign To Driver':
                    $order->operations()->create([
                        'actor_id' => auth()->user()->id,
                        'actor_type' => 'App\Models\User',
                        'action' => 'Order assigned to driver.'
                    ]);
                    Task::create([
                        'employee_id' => $data['driver'],
                        'task_type'   => 'App\Models\Order',
                        'task_id'     => $order->id,
                        'status'      => 'Pending'
                    ]);
                    $employeeFcm = true;
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
                    $data['status'] = 'On the Way';
                    break;

                case 'Delivered':
                    $order->operations()->create([
                        'actor_id' => Auth::guard('employee')->user()->id,
                        'actor_type' => 'App\Models\Employee',
                        'action' => 'Order delivered to customer.'
                    ]);
                    break;

                case 'Completed':
                    $order->operations()->create([
                        'actor_id' => auth()->user()->id,
                        'actor_type' => 'App\Models\User',
                        'action' => 'Order completed by admin.'
                    ]);
                    break;
            }
            $order->update($data);
            if (settings('sale_order_fcm_notification_to_customer') == 'Yes') {
                if($order->status == 'On the Way'){
                    $driver = Auth::guard('employee')->user();
                    $body = 'Your order is on the way! Your driver, '. $driver->name .', will deliver your order soon. You can contact them at '. $driver->mobile_number.' if you have any questions or concerns. Thank you for choosing us!';
                }else{
                    $body = 'Your order has been ' . $data['status'] . ' successfully.';
                }
                $fcmData = [
                    'title'     => 'Order ' . $data['status'],
                    'body'      => $body,
                    'user_type' => 'App\Models\Customer',
                    'user_id'   => $order->customer->id
                ];
                $this->fcmNotification->store($fcmData);
            }
            if (settings('employee_task_fcm_notification') == 'Yes' && $employeeFcm) {
                $fcmData = [
                    'title'     => 'Order Assign',
                    'body'      => 'New task assign to you check your task list',
                    'user_type' => 'App\Models\Employee',
                    'user_id'   => $employee
                ];
                $this->fcmNotification->store($fcmData);
            }
            // if($order->status == 'Completed'){
            //     $data = ['order' => $order];
            //     $html = view('admin.order.invoice', $data)->render();
            //     $mpdf = new Mpdf();
            //     $mpdf->WriteHTML($html);
            //     $fileName = 'invoice_' . $order->id . '.pdf';
            //     $filePath = public_path('uploads/orders/' . $fileName);
            //     if (!File::exists(public_path('uploads/orders'))) {
            //         File::makeDirectory(public_path('uploads/orders'), 0755, true);
            //     }
            //     $mpdf->Output($filePath, 'F');
            //     $order->update(['invoice' => 'uploads/orders/'.$fileName]);
            // }
        });
        return true;
	}

	public function orderDelete($id)
	{
		return Order::find($id)->delete();
	}

    public function orderReview($data)
    {
        $record = OrderDetail::find($data['id']);
        if(is_null($record->star) && is_null($record->remarks)){
            $record->update($data);
            return true;
        }
        return false;
    }

    public function storeServices($detail)
    {
        if($detail->maintenance > 0 && $detail->warranty > 0){
            $currentDate = now();
            $endDate = now()->addYears($detail->warranty);
            $intervalDays = $endDate->diffInDays($currentDate) / $detail->maintenance;
            while ($currentDate->lte($endDate)) {
                OrderDetailService::create([
                    'order_detail_id' => $detail->id,
                    'date' => $currentDate->toDateString(),
                    'status' => 'Pending'
                ]);
                $currentDate->addDays($intervalDays);
            }
        }
    }

    public function updateServices($id)
    {
        OrderDetailService::find($id)->update(['status' => 'Completed']);
    }
}
