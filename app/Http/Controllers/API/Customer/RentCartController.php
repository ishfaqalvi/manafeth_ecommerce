<?php

namespace App\Http\Controllers\API\Customer;
use App\Http\Controllers\API\BaseController;

use App\Models\RentCart;
use Illuminate\Http\Request;

/**
 * Class RentCartController
 * @package App\Http\Controllers
 */
class RentCartController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $data = auth()->user()->rentCarts()->with(['product.brand', 'product.category', 'product.subCategory'])->get();
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
            $customer = auth()->user()->id;
            $checkProduct = RentCart::whereProductId($product)->whereCustomerId($customer)->first();
            if ($checkProduct) {
                return $this->sendResponse('Record Exist', 'This product already exist in cart.');    
            }
            RentCart::create([
                'customer_id'=> $customer,
                'product_id' => $product,
                'quantity'   => $request->quantity,
                'from'       => $request->from,
                'to'         => $request->to,
            ]);
            $data = auth()->user()->rentCarts()->with(['product.brand', 'product.category', 'product.subCategory'])->get();
            return $this->sendResponse($data, 'Product added in cart list successfully.');
        } catch (\Throwable $th) {
            return $this->sendException($th->getMessage());
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  RentCart $rentCart
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, RentCart $cart)
    {
        try {
            $cart->update($request->all());
            $data = auth()->user()->rentCarts()->with(['product.brand', 'product.category', 'product.subCategory'])->get();
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
            RentCart::find($id)->delete();
            $data = auth()->user()->rentCarts()->with(['product.brand', 'product.category', 'product.subCategory'])->get();
            return $this->sendResponse($data, 'Product deleted from cart list successfully.');
        } catch (\Throwable $th) {
            return $this->sendException($th->getMessage());
        }
    }
}
