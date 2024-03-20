<?php

namespace App\Repositories;
use App\Contracts\RentInterface;
use App\Models\{Cart,Order,Customer};

class RentRepository implements RentInterface
{
	public function cartItemList()
	{
		return auth()->user()->carts()->with(['product.brand', 'product.category', 'product.subCategory'])->get();
	}

	public function cartCheckItem($id)
	{
		return auth()->user()->carts()->whereProductId($id)->first();
	}

	public function cartStoreItem($data)
	{
        $data['customer_id'] = auth()->user()->id;
        Cart::create($data);
        return auth()->user()->carts()->with(['product.brand', 'product.category', 'product.subCategory'])->get();
	}

	public function cartUpdateItem($data, $id)
	{
		Cart::find($id)->update($data);
		return auth()->user()->carts()->with(['product.brand', 'product.category', 'product.subCategory'])->get();
	}

	public function cartDeleteItem($id)
	{
		Cart::find($id)->delete();
		return auth()->user()->carts()->with(['product.brand', 'product.category', 'product.subCategory'])->get();
	}

	public function orderList($customer_id)
	{
		if ($customer_id) {
			$orders = Order::whereCustomerId($customer_id)->with(['details','details.product.brand', 'details.product.category', 'details.product.subCategory'])->get();
		}else{
			$orders = Order::with(['details','details.product.brand', 'details.product.category', 'details.product.subCategory'])->get();
		}
		return $orders;
	}

	public function orderFind($id)
	{
		return Order::find($id);
	}

	public function orderStore($data, $customer_id)
	{
		$customer = Customer::find($customer_id);
		$order = $customer->orders()->create($data);
        foreach($customer->carts as $row){
            $order->details()->create([
                'product_id'=> $row->product_id,
                'quantity'  => $row->quantity,
                'price'     => $row->product->price - $row->product->discount
            ]);
            $row->delete();
        }
        return $order;
	}

	public function orderUpdate($data, $id)
	{
		return Order::find($id)->update($data);
	}

	public function orderDelete($id)
	{
		return Order::find($id)->delete();
	}
}