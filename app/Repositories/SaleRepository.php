<?php

namespace App\Repositories;

use App\Models\OrderDetail;
use App\Contracts\FcmInterface;
use App\Contracts\SaleInterface;
use App\Services\WhatsAppService;
use App\Models\OrderDetailService;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\{Product,Cart,Order,Customer};

class SaleRepository implements SaleInterface
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

	public function orderList($customer_id = null, $pagination = false)
	{
        $query = Order::query();
		if (!is_null($customer_id)) {
            $query->whereCustomerId($customer_id);
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
            'details.product.subCategory',
            'details.product.reviews.order.customer'
        ];
		return $pagination ? $query->with($relations)->paginate() : $query->with($relations)->get();
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
        if($customer->carts()->count() == 0)
        {
            return false;
        }
        $responce = DB::transaction(function () use($data, $guard, $customer) {
            $products = '';
            $order = $customer->orders()->create($data);
            if (isset($data['buy_now']) && !is_null($data['buy_now'])) {
                $product = Product::find($data['product_id']);
                $detail = $order->details()->create([
                    'product_id'=> $data['product_id'],
                    'quantity'  => 1,
                    'price'     => $product->price - $product->discount
                ]);
                $product->decrement('quantity');
                $this->storeServices($detail->id, $product);
                $products .= $product->name.' ( 1 Qty)';
            }else{
                foreach($customer->carts as $row){
                    $product = $row->product;
                    $detail = $order->details()->create([
                        'product_id'=> $row->product_id,
                        'quantity'  => $row->quantity,
                        'price'     => $product->price - $product->discount
                    ]);
                    $products .= $product->name.' ( '.$row->quantity.' Qty)';
                    $product->decrement('quantity', $row->quantity);
                    $this->storeServices($detail->id, $product);
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
            if(settings('sale_order_fcm_notification') == 'Yes' && $guard == 'customerapi'){
                $data = [
                    'title' => 'Order Placed',
                    'body' => 'Your order has been placed successfully.',
                    'customer_id' => $customer->id
                ];
                $this->fcmNotification->store($data);
            }
            return $order;
        });
        return $responce;
	}

	public function orderUpdate($data, $id)
	{
        DB::transaction(function () use($data, $id) {
            $order = Order::find($id);
            if($data['status'] == 'Cancelled'){
                foreach($order->details as $row){
                    $row->product->increment('quantity', $row->quantity);
                }
            }
            if(settings('sale_order_fcm_notification') == 'Yes'){
                $data = [
                    'title' => 'Order '. $data['status'],
                    'body' => 'Your order has been updated successfully.',
                    'customer_id' => $order->customer->id
                ];
                $this->fcmNotification->store($data);
            }
            $order->update($data);
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

    public function storeServices($orderDetailId, $product)
    {
        if($product->maintenance > 0 && $product->warranty > 0){
            $currentDate = now();
            $endDate = now()->addMonths($product->warranty);
            $intervalDays = $endDate->diffInDays($currentDate) / $product->maintenance;
            while ($currentDate->lte($endDate)) {
                OrderDetailService::create([
                    'order_detail_id' => $orderDetailId,
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
