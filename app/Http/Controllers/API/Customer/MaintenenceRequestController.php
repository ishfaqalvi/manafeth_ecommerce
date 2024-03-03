<?php

namespace App\Http\Controllers\API\Customer;
use App\Http\Controllers\API\BaseController;

use App\Models\MaintenenceRequest;
use Illuminate\Http\Request;

/**
 * Class MaintenenceRequestController
 * @package App\Http\Controllers
 */
class MaintenenceRequestController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $data = auth()->user()->maintenenceRequests()->with(['product.brand', 'product.category', 'product.subCategory'])->get();
            return $this->sendResponse($data, 'Maintenence Request list get successfully.');
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
            auth()->user()->maintenenceRequests()->create($request->all());

            $data = auth()->user()->maintenenceRequests()->with(['product.brand', 'product.category', 'product.subCategory'])->get();
            return $this->sendResponse($data, 'Maintenence Request created successfully.');
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
            $request = MaintenenceRequest::find($id);
            if ($request->status == 'Pending') {
                $request->delete();
                $data = auth()->user()->maintenenceRequests()->with(['product.brand', 'product.category', 'product.subCategory'])->get();
                return $this->sendResponse($data, 'Maintenence Request deleted successfully.');    
            }
            return $this->sendResponse('', 'Your request is in under process.');
        } catch (\Throwable $th) {
            return $this->sendException($th->getMessage());
        }
    }
}
