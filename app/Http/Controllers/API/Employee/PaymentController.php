<?php

namespace App\Http\Controllers\API\Employee;
use App\Http\Controllers\API\BaseController;

use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Contracts\MaintenenceInterface;
use App\Contracts\SaleInterface;
use App\Contracts\RentInterface;

/**
 * Class PaymentController
 * @package App\Http\Controllers
 */
class PaymentController extends BaseController
{
    protected $maintenence;
    protected $order;
    protected $rent;

    public function __construct(MaintenenceInterface $maintenence, SaleInterface $order, RentInterface $rent){
        $this->maintenence = $maintenence;
        $this->order = $order;
        $this->rent = $rent;
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function sale(Request $request)
    {
        try {
            $input = $request->all();
            $input['orderable_type'] = 'App\Models\Order';
            $input['collectable_id'] = auth::guard('employee')->user()->id;
            $input['collectable_type'] = 'App\Models\Employee';
            $responce = $this->order->addPayment($input);
            return $this->sendResponse($responce, 'Payment created successfully.');
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
    public function rent(Request $request)
    {
        try {
            $input = $request->all();
            $input['orderable_type'] = 'App\Models\RentRequest';
            $input['collectable_id'] = auth::guard('employee')->user()->id;
            $input['collectable_type'] = 'App\Models\Employee';
            $responce = $this->rent->addPayment($input);
            return $this->sendResponse($responce, 'Payment created successfully.');
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
    public function maintenence(Request $request)
    {
        try {
            $input = $request->all();
            $input['orderable_type'] = 'App\Models\MaintenenceRequest';
            $input['collectable_id'] = auth::guard('employee')->user()->id;
            $input['collectable_type'] = 'App\Models\Employee';
            $responce = $this->maintenence->addPayment($input);
            return $this->sendResponse($responce, 'Payment created successfully.');
        } catch (\Throwable $th) {
            return $this->sendException($th->getMessage());
        }
    }
}
