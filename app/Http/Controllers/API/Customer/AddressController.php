<?php

namespace App\Http\Controllers\API\Customer;

use Illuminate\Http\Request;
use App\Contracts\CustomerInterface;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\API\BaseController;

/**
 * Class AddressController
 * @package App\Http\Controllers
 */
class AddressController extends BaseController
{
    protected $customer;

    public function __construct(CustomerInterface $customer){
        $this->customer = $customer;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $data = $this->customer->addressList(Auth::guard('customerapi')->user()->id);
            return $this->sendResponse($data, 'Customer address list get successfully.');
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
            $input = $request->all();
            $input['customer_id'] = Auth::guard('customerapi')->user()->id;
            $this->customer->addressStore($input);
            $data = $this->customer->addressList(Auth::guard('customerapi')->user()->id);
            return $this->sendResponse($data, 'Address created successfully.');
        } catch (\Throwable $th) {
            return $this->sendException($th->getMessage());
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Address $address
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        try {
            $this->customer->addressUpdate($request->all(), $request->id);
            $data = $this->customer->addressList(Auth::guard('customerapi')->user()->id);
            return $this->sendResponse($data, 'Address updated successfully.');
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
            $this->customer->addressDelete($id);
            $data = $this->customer->addressList(Auth::guard('customerapi')->user()->id);
            return $this->sendResponse($data, 'Address deleted successfully.');
        } catch (\Throwable $th) {
            return $this->sendException($th->getMessage());
        }
    }
}
