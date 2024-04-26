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
    public function index()
    {
        try {
            $data = $this->maintenence->list('customerapi');
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

            $data = $this->maintenence->list('customerapi');
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
            if ($this->maintenence->find($id)->status == 'Pending') {
                $this->maintenence->delete($id);
                $data = $this->maintenence->list('customerapi');
                return $this->sendResponse($data, 'Maintenence Request deleted successfully.');
            }
            return $this->sendResponse('', 'Your request is in under process.');
        } catch (\Throwable $th) {
            return $this->sendException($th->getMessage());
        }
    }
}
