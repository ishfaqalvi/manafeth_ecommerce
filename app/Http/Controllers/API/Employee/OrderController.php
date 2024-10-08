<?php

namespace App\Http\Controllers\API\Employee;
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
            $data = $this->order->orderList(null, Auth::guard('employee')->user()->id, false, $request->all());
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
    public function update(Request $request)
    {
        try {
            $this->order->orderUpdate($request->all(), $request->id, 'employee');
            return $this->sendResponse('', 'Order action created successfully.');
        } catch (\Throwable $th) {
            return $this->sendException($th->getMessage());
        }
    }
}
