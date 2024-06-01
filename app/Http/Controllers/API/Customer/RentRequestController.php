<?php

namespace App\Http\Controllers\API\Customer;
use App\Http\Controllers\API\BaseController;

use App\Contracts\RentInterface;
use Illuminate\Http\Request;

/**
 * Class RentRequestController
 * @package App\Http\Controllers
 */
class RentRequestController extends BaseController
{
    protected $order;

    public function __construct(RentInterface $order){
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
            $data = $this->order->orderList('customerapi');
            return $this->sendResponse($data, 'Rent Request list get successfully.');
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
            return $this->sendResponse($data, 'Rent Request created successfully.');
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
                $this->order->orderUpdate(['status' => 'Cancelled'], $request->id, 'employee');
                return $this->sendResponse('', 'Request cancelled successfully.');
            }
            return $this->sendError('Invalid Action', 'You can not cancel the under process request.');
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
                $this->order->orderDelete($id);
                return $this->sendResponse('', 'Request deleted successfully.');
            }else{
                return $this->sendResponse('', 'You can not delete under process request.');
            }
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
