<?php

namespace App\Repositories;

use App\Contracts\SaleInterface;
use Illuminate\Support\Facades\Auth;
use App\Models\{Product,Cart,Order,Customer};

class SaleRepository implements SaleInterface
{
	public function cartItemList($guard)
	{
		return Auth::guard($guard)->user()->carts()->with(['product.brand', 'product.category', 'product.subCategory'])->get();
	}

    public function cartStoreItem($data, $guard)
	{
        $product = $data['product_id'];
        $checkProduct = Auth::guard($guard)->user()->carts()->whereProductId($product)->first();
        if ($checkProduct) {
            return false;
        }
        Cart::create(['customer_id' => Auth::guard($guard)->user()->id, 'product_id' => $product]);
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

	public function orderStore($data, $guard)
	{
		$customer = Auth::guard($guard)->user();
		$order = $customer->orders()->create($data);
        if (!is_null($data['buy_now'])) {
            $product = Product::find($data['product_id']);
            $order->details()->create([
                'product_id'=> $data['product_id'],
                'quantity'  => 1,
                'price'     => $product->price - $product->discount
            ]);
        }else{
            foreach($customer->carts as $row){
                $order->details()->create([
                    'product_id'=> $row->product_id,
                    'quantity'  => $row->quantity,
                    'price'     => $row->product->price - $row->product->discount
                ]);
                $row->delete();
            }
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
