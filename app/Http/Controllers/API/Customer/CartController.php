<?php

namespace App\Http\Controllers\API\Customer;
use App\Http\Controllers\API\BaseController;

use App\Models\Cart;
use Illuminate\Http\Request;

/**
 * Class CartController
 * @package App\Http\Controllers
 */
class CartController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        try {
            $data = auth()->user()->carts()->filter($request->all())->with(['product.brand', 'product.category', 'product.subCategory'])->paginate();
            return $this->sendResponse($data, 'Cart Product list get successfully.');
        } catch (\Throwable $th) {
            return $this->sendException($th->getMessage());
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $product = $request->product_id;
            $type = $request->type;
            $customer = auth()->user()->id;
            $checkProduct = Cart::whereProductId($product)->whereCustomerId($customer)->whereType($type)->first();
            if ($checkProduct) {
                return $this->sendError('Record Exist', 'This product already exist in cart.');    
            }
            Cart::create([
                'customer_id'=> $customer,
                'product_id' => $product,
                'type'       => $type,
                'quantity'   => $request->quantity
            ]);
            $data = auth()->user()->carts()->with(['product.brand', 'product.category', 'product.subCategory'])->paginate();
            return $this->sendResponse($data, 'Product added in cart list successfully.');
        } catch (\Throwable $th) {
            return $this->sendException($th->getMessage());
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Cart $cart
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cart $cart)
    {
        try {
            $cart->update($request->all());
            $data = auth()->user()->carts()->with(['product.brand', 'product.category', 'product.subCategory'])->paginate();
            return $this->sendResponse($data, 'Product updated from cart list successfully.');
        } catch (\Throwable $th) {
            return $this->sendException($th->getMessage());
        }
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        try {
            Cart::find($id)->delete();
            $data = auth()->user()->carts()->with(['product.brand', 'product.category', 'product.subCategory'])->paginate();
            return $this->sendResponse($data, 'Product deleted from cart list successfully.');
        } catch (\Throwable $th) {
            return $this->sendException($th->getMessage());
        }
    }
}
