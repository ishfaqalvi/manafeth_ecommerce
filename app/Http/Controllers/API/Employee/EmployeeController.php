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
class EmployeeController extends BaseController
{
    /**
     * Drivers list API
     *
     * @return \Illuminate\Http\Response
     */
    public function drivers()
    {
        return $this->sendResponse(drivers(), 'Drivers list successfully.');
    }
}
