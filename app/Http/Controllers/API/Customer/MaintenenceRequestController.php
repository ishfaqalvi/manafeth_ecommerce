<?php

namespace App\Http\Controllers\API\Customer;
use Illuminate\Http\Request;

use App\Contracts\MaintenenceInterface;
use App\Http\Controllers\API\BaseController;

/**
 * Class MaintenenceRequestController
 * @package App\Http\Controllers
 */
class MaintenenceRequestController extends BaseController
{
    protected $maintenence;

    public function __construct(MaintenenceInterface $maintenence){
        $this->maintenence = $maintenence;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        try {
            $data = $this->maintenence->list('customerapi', false, $request->all());
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
            $this->maintenence->store('customerapi', $request->all());

            $data = $this->maintenence->list('customerapi', false);
            return $this->sendResponse($data, 'Maintenence Request created successfully.');
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
            if ($this->maintenence->find($request->id)->status == 'Pending') {
                $this->maintenence->update(['status' => 'Rejected'], $request->id, 'customerapi');
                return $this->sendResponse('', 'Maintenence Request cancelled successfully.');
            }
            return $this->sendResponse('', 'Your request is under process.');
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
            if ($this->maintenence->find($id)->status == 'Rejected') {
                $this->maintenence->delete($id);
                $data = $this->maintenence->list('customerapi', false);
                return $this->sendResponse($data, 'Maintenence Request deleted successfully.');
            }
            return $this->sendResponse('', 'Your can only delete rejected requests.');
        } catch (\Throwable $th) {
            return $this->sendException($th->getMessage());
        }
    }
}
