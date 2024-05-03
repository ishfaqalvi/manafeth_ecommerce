<?php

namespace App\Http\Controllers\API\Customer;
use App\Http\Controllers\API\BaseController;

use Illuminate\Http\Request;
use App\Contracts\CouponInterface;

/**
 * Class CouponController
 * @package App\Http\Controllers
 */
class CouponController extends BaseController
{
    protected $coupon;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct(CouponInterface $coupon)
    {
        $this->coupon = $coupon;
    }

    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function apply(Request $request)
    {
        try {
            $responce = $this->coupon->apply('customerapi', $request->code);
            if($responce['status']){
                return $this->sendResponse('', $responce['message']);
            }
            return $this->sendError('Invalid Error', $responce['message']);
        } catch (\Throwable $th) {
            return $this->sendException($th->getMessage());
        }
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function discount()
    {
        try {
            $responce = $this->coupon->discount('customerapi');
            return $this->sendResponse($responce, 'Coupon code discount get successfully.');
        } catch (\Throwable $th) {
            return $this->sendException($th->getMessage());
        }
    }
}
