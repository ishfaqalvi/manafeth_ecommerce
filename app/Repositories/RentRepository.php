<?php

namespace App\Repositories;
use App\Contracts\RentInterface;
use Illuminate\Support\Facades\Auth;
use App\Models\{RentCart,RentRequest,Customer};

class RentRepository implements RentInterface
{
	public function cartItemList($guard)
	{
		return Auth::guard($guard)->user()->rentCarts()->with(
			['product.brand', 'product.category', 'product.subCategory']
		)->get();
	}

    public function cartStoreItem($data, $guard)
	{
        $product = $data['product_id'];
        $data['customer_id'] = Auth::guard($guard)->user()->id;
        $checkProduct = Auth::guard($guard)->user()->rentCarts()->whereProductId($product)->first();
        if ($checkProduct) {
            return false;
        }
        RentCart::create($data);
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
		$order = Auth::guard($guard)->user()->rentRequests()->create($data);
        foreach($customer->rentCarts as $row){
            $order->details()->create([
                'product_id'=> $row->product_id,
                'quantity'  => $row->quantity,
                'from'      => $row->from,
                'to'        => $row->to
            ]);
            $row->delete();
        }
        return true;
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
