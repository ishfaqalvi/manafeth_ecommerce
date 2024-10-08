<?php

namespace App\Http\Controllers\API\Customer;
use App\Http\Controllers\API\BaseController;

use App\Contracts\RentInterface;
use Illuminate\Http\Request;

/**
 * Class RentCartController
 * @package App\Http\Controllers
 */
class RentCartController extends BaseController
{
    protected $cart;

    public function __construct(RentInterface $cart){
        $this->cart = $cart;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $data = $this->cart->cartItemList('customerapi');
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
            $responce = $this->cart->cartStoreItem($request->all(), 'customerapi');
            if ($responce == false) {
                return $this->sendError('Record Exist', 'This product already exist in cart.');
            }
            $data = $this->cart->cartItemList('customerapi');
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
    public function update(Request $request,$cart)
    {
        try {
            $this->cart->cartUpdateItem($request->all(), $cart);
            $data = $this->cart->cartItemList('customerapi');
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
            $this->cart->cartDeleteItem($id);
            $data = $this->cart->cartItemList('customerapi');
            return $this->sendResponse($data, 'Product deleted from cart list successfully.');
        } catch (\Throwable $th) {
            return $this->sendException($th->getMessage());
        }
    }
}
