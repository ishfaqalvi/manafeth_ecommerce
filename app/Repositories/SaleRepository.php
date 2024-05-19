<?php

namespace App\Repositories;

use App\Models\OrderDetail;
use App\Contracts\FcmInterface;
use App\Contracts\SaleInterface;
use App\Services\WhatsAppService;
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
		return Auth::guard($guard)->user()->carts()->with(['product.brand', 'product.category', 'product.subCategory'])->get();
	}

    public function cartStoreItem($data, $guard)
	{
        $product = $data['product_id'];
        $customer = Auth::guard($guard)->user();

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
        $relations = ['timeSlot','details','details.product.brand', 'details.product.category', 'details.product.subCategory'];
		return $pagination ? $query->with($relations)->paginate() : $query->with($relations)->get();
	}

	public function orderFind($id)
	{
		return Order::find($id);
	}

	public function orderStore($data, $guard)
	{
        $responce = DB::transaction(function () use($data, $guard) {
            $products = '';
            $customer = Auth::guard($guard)->user();
            $order = $customer->orders()->create($data);
            if (!is_null($data['buy_now'])) {
                $product = Product::find($data['product_id']);
                $order->details()->create([
                    'product_id'=> $data['product_id'],
                    'quantity'  => 1,
                    'price'     => $product->price - $product->discount
                ]);
                $product->decrement('quantity');
                $products .= $product->name.' ( 1 Qty)';
            }else{
                foreach($customer->carts as $row){
                    $order->details()->create([
                        'product_id'=> $row->product_id,
                        'quantity'  => $row->quantity,
                        'price'     => $row->product->price - $row->product->discount
                    ]);
                    $products .= $row->product->name.' ( '.$row->quantity.' Qty)';
                    $row->product->decrement('quantity', $row->quantity);
                    $row->delete();
                }
            }
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
}
