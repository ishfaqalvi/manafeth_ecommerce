<?php

namespace App\Http\Controllers\API\Customer;
use Illuminate\Http\Request;

use App\Contracts\SaleInterface;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\API\BaseController;

/**
 * Class OrderController
 * @package App\Http\Controllers
 */
class OrderController extends BaseController
{
    protected $order;

    public function __construct(SaleInterface $order){
        $this->order = $order;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $data = $this->order->orderList(Auth::guard('customerapi')->user()->id);
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
            if (count($this->order->cartItemList('customerapi')) == 0) {
                return $this->sendResponse('No Record Found', 'Your cart is empty.');
            }
            $data = $this->order->orderStore($request->all(), 'customerapi');
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
            if ($this->order->orderFind($id)->status == 'Pending') {
                $data = $this->order->orderDelete($id);
                return $this->sendResponse($data, 'Order deleted successfully.');
            }else{
                return $this->sendResponse('', 'You can not delete under process order.');
            }
        } catch (\Throwable $th) {
            return $this->sendException($th->getMessage());
        }
    }
}
