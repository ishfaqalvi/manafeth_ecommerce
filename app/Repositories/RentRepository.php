<?php

namespace App\Repositories;
use App\Services\WhatsAppService;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\{RentCart,RentRequest,Customer};
use App\Contracts\{FcmInterface,RentInterface};

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
        $product = $data['product_id'];
        $customer = Auth::guard($guard)->user();
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

	public function orderList($guard)
	{
		if ($guard) {
            $customer_id = Auth::guard($guard)->user()->id;
			$orders = RentRequest::whereCustomerId($customer_id)->with(
				['details','details.product.brand', 'details.product.category', 'details.product.subCategory']
			)->get();
		}else{
			$orders = RentRequest::with(
				['details','details.product.brand', 'details.product.category', 'details.product.subCategory']
			)->get();
		}
		return $orders;
	}

    public function orderStore($data, $guard)
	{
        $responce = DB::transaction(function () use($data, $guard) {
            $products = '';
            $customer = Auth::guard($guard)->user();
            $order = $customer->rentRequests()->create($data);
            foreach($customer->rentCarts as $row){
                $order->details()->create([
                    'product_id'=> $row->product_id,
                    'quantity'  => $row->quantity,
                    'from'      => $row->from,
                    'to'        => $row->to
                ]);
                $products .= $row->product->name.' ( '.$row->quantity.' Qty)';
                $row->delete();
            }
            if(settings('rent_order_whatsapp_notification') == 'Yes'){
                $data = [$data['full_name'], $data['phone_number'], $products];
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
        });
        return $responce;
	}

	public function orderFind($id)
	{
		return RentRequest::find($id);
	}

	public function orderUpdate($data, $id)
	{
		return RentRequest::find($id)->update($data);
	}

	public function orderDelete($id)
	{
		return RentRequest::find($id)->delete();
	}
}
