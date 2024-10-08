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
    public function index(Request $request)
    {
        try {
            $data = $this->order->orderList(Auth::guard('customerapi')->user()->id, null, false, $request->all());
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
            $responce = $this->order->orderStore($request->all(), 'customerapi');
            if($responce){
                return $this->sendResponse($responce, 'Order created successfully.');
            }
            return $this->sendResponse('No Record Found', 'Your cart is empty.');
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
    public function cancel(Request $request)
    {
        try {
            if ($this->order->orderFind($request->id)->status == 'Pending') {
                $this->order->orderUpdate(['status' => 'Cancelled'], $request->id, 'customerapi');
                return $this->sendResponse('', 'Order cancelled successfully.');
            }
            return $this->sendError('Invalid Action', 'You can not cancel the under process order.');
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
            if ($this->order->orderFind($id)->status == 'Cancelled') {
                $data = $this->order->orderDelete($id);
                return $this->sendResponse($data, 'Order deleted successfully.');
            }
            return $this->sendError('Invalid Action', 'You can delete only cancelled order.');
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
    public function reviews(Request $request)
    {
        try {
            $responce = $this->order->orderReview($request->all());
            if($responce){
                return $this->sendResponse('', 'Review submitted successfully.');
            }
            return $this->sendError('Invalid Action', 'Review already submitted.');
        } catch (\Throwable $th) {
            return $this->sendException($th->getMessage());
        }
    }
}
