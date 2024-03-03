<?php

namespace App\Http\Controllers\API\Customer;
use App\Http\Controllers\API\BaseController;

use App\Models\RentRequest;
use Illuminate\Http\Request;

/**
 * Class RentRequestController
 * @package App\Http\Controllers
 */
class RentRequestController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $data = auth()->user()->rentRequests()->with(['details','details.product.brand', 'details.product.category', 'details.product.subCategory'])->get();
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
            $customer = auth()->user()->id;
            if (auth()->user()->rentCarts()->count() == 0) {
                return $this->sendResponse('No Record Found', 'Your cart is empty.');    
            }
            $order = auth()->user()->rentRequests()->create($request->all());
            foreach(auth()->user()->rentCarts as $row){
                $order->details()->create([
                    'product_id'=> $row->product_id,
                    'quantity'  => $row->quantity,
                    'from'      => $row->from,
                    'to'        => $row->to
                ]);
            }
            $data = auth()->user()->rentRequests()->with(['details','details.product.brand', 'details.product.category', 'details.product.subCategory'])->get();
            return $this->sendResponse($data, 'Rent Request created successfully.');
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
            $order = RentRequest::find($id);
            if ($order->status == 'Pending') {
                $order->delete();
                $data = auth()->user()->rentRequests()->with(['details','details.product.brand', 'details.product.category', 'details.product.subCategory'])->get();
                return $this->sendResponse($data, 'Request deleted successfully.');    
            }else{
                return $this->sendResponse('', 'You can not delete under process request.');
            }
        } catch (\Throwable $th) {
            return $this->sendException($th->getMessage());
        }
    }
}
