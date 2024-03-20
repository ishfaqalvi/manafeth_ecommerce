<?php

namespace App\Repositories;
use App\Contracts\RentInterface;
use App\Models\{RentCart,RentRequest,Customer};

class RentRepository implements RentInterface
{
	public function cartItemList()
	{
		return auth()->user()->rentCarts()->with(
			['product.brand', 'product.category', 'product.subCategory']
		)->get();
	}

	public function cartCheckItem($id)
	{
		return auth()->user()->rentCarts()->whereProductId($id)->first();
	}

	public function cartStoreItem($data)
	{
        $data['customer_id'] = auth()->user()->id;
        RentCart::create($data);
        return auth()->user()->rentCarts()->with(
        	['product.brand', 'product.category', 'product.subCategory']
        )->get();
	}

	public function cartUpdateItem($data, $id)
	{
		RentCart::find($id)->update($data);
		return auth()->user()->rentCarts()->with(
			['product.brand', 'product.category', 'product.subCategory']
		)->get();
	}

	public function cartDeleteItem($id)
	{
		RentCart::find($id)->delete();
		return auth()->user()->rentCarts()->with(
			['product.brand', 'product.category', 'product.subCategory']
		)->get();
	}

	public function orderList($customer_id)
	{
		if ($customer_id) {
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

	public function orderFind($id)
	{
		return RentRequest::find($id);
	}

	public function orderStore($data, $customer_id)
	{
		$customer = Customer::find($customer_id);
		$order = $customer->rentRequests()->create($data);
        foreach($customer->rentCarts as $row){
            $order->details()->create([
                'product_id'=> $row->product_id,
                'quantity'  => $row->quantity,
                'from'      => $row->from,
                'to'        => $row->to
            ]);
            $row->delete();
        }
        return $order;
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