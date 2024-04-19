<?php

namespace App\Http\Controllers\Web\Customer;
use App\Http\Controllers\API\BaseController;

use App\Contracts\SaleInterface;
use Illuminate\Http\Request;

/**
 * Class CartController
 * @package App\Http\Controllers
 */
class CartController extends BaseController
{
    protected $cart;

    public function __construct(SaleInterface $cart){
        $this->cart = $cart;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cartItems = $this->cart->cartItemList('customer');

        return view('web.customer.cart.index', compact('cartItems'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $responce = $this->cart->cartStoreItem($request->all(), 'customer');
        return response()->json(['success' => $responce]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Cart $cart
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $responce = $this->cart->cartUpdateItem($request->all(), $request->id);
        return response()->json(['success' => true]);
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy(Request $request)
    {
        $this->cart->cartDeleteItem($request->id);
        return response()->json(['success' => true]);
    }
}
