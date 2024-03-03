<?php

namespace App\Http\Controllers\API\Customer;
use App\Http\Controllers\API\BaseController;

use App\Models\Order;
use Illuminate\Http\Request;

/**
 * Class OrderController
 * @package App\Http\Controllers
 */
class OrderController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $data = auth()->user()->orders()->with(['details','details.product.brand', 'details.product.category', 'details.product.subCategory'])->get();
            return $this->sendResponse($data, 'Orders list get successfully.');
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
            $customer = auth()->user()->id;
            if (auth()->user()->carts()->count() == 0) {
                return $this->sendResponse('No Record Found', 'Your cart is empty.');    
            }
            $order = auth()->user()->orders()->create($request->all());
            foreach(auth()->user()->carts as $row){
                $order->details()->create([
                    'product_id'=> $row->product_id,
                    'quantity'  => $row->quantity,
                    'price'     => $row->product->price - $row->product->discount
                ]);
            }
            $data = auth()->user()->orders()->with(['details','details.product.brand', 'details.product.category', 'details.product.subCategory'])->get();
            return $this->sendResponse($data, 'Order created successfully.');
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
            $order = Order::find($id);
            if ($order->status == 'Pending') {
                $order->delete();
                $data = auth()->user()->orders()->with(['details','details.product.brand', 'details.product.category', 'details.product.subCategory'])->get();
                return $this->sendResponse($data, 'Order deleted successfully.');    
            }else{
                return $this->sendResponse('', 'You can not delete under process order.');
            }
        } catch (\Throwable $th) {
            return $this->sendException($th->getMessage());
        }
    }
}