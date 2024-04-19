<?php

namespace App\Http\Controllers\API\Customer;

use Illuminate\Http\Request;
use App\Contracts\CustomerInterface;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\API\BaseController;

class AuthController extends BaseController
{
    protected $customer;

    public function __construct(CustomerInterface $customer){
        $this->customer = $customer;
    }

    /**
     * Register API
     *
     * @return \Illuminate\Http\Response
     */
    public function register(Request $request)
    {
        try {
            $customer = $this->customer->register($request->all());
            $message = 'Your account has been created successfully. Check your email for account verification.';
            return $this->sendResponse($customer, $message);
        } catch (\Throwable $th) {
            return $this->sendException($th->getMessage());
        }
    }

    /**
     * Login API
     *
     * @return \Illuminate\Http\Response
     */
    public function login(Request $request)
    {
        try {
            $responce = $this->customer->appLogin($request->all());
            if ($responce == false) {
                return $this->sendError('Unauthorised.', ['error' => 'The provided credentials are incorrect.']);
            }
            return $this->sendResponse($responce, 'Customer login successfully.');
        } catch (\Throwable $th) {
            return $this->sendException($th->getMessage());
        }
    }

    /**
     * Profile View API
     *
     * @return \Illuminate\Http\Response
     */
    public function view()
    {
        return $this->sendResponse(Auth::guard('customerapi')->user(), 'Profile data get successfully.');
    }


    /**
     * Guard Update API
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        try {
            $customer = $this->customer->update($request->all(), auth('customerapi')->user()->id);
            return $this->sendResponse($customer, 'Your profile updated successfully.');
        } catch (\Throwable $th) {
            return $this->sendException($th->getMessage());
        }
    }

    /**
     * Forgot Guard Password API
     *
     * @return \Illuminate\Http\Response
     */
    public function forgotPass(Request $request)
    {
        try {
            $this->customer->forgotPassword($request->all());
            return $this->sendResponse('', 'OTP sent to your email successfully.');
        } catch (\Throwable $th) {
            return $this->sendException($th->getMessage());
        }
    }

    /**
     * Verify OTP API
     *
     * @return \Illuminate\Http\Response
     */
    public function verifiOtp(Request $request)
    {
        try {
            $responce = $this->customer->verifyOTP($request->all());
            if ($responce == 'false') {
                return $this->sendError('Invalid Error', 'Invalid or expired OTP.');
            }
            return $this->sendResponse('', 'OTP verified successfully.');
        } catch (\Throwable $th) {
            return $this->sendException($th->getMessage());
        }
    }

    /**
     * Guard Reset Password API
     *
     * @return \Illuminate\Http\Response
     */
    public function resetPass(Request $request)
    {
        try {
            $responce = $this->customer->resetPassword($request->all());
            if($responce == true){
                return $this->sendResponse('', 'Password has been reset successfully.');
            }
            return $this->sendError('Invalid Error', 'Invalid email or expired OTP.');
        } catch (\Throwable $th) {
            return $this->sendException($th->getMessage());
        }
    }

    /**
     * Account varification API
     *
     * @return \Illuminate\Http\Response
     */
    public function accountVarify(Request $request)
    {
        try {
            $this->customer->verifyAccount($request->all());
            return $this->sendResponse('', 'Your account verified successfully.');
        } catch (\Throwable $th) {
            return $this->sendException($th->getMessage());
        }
    }

    /**
     * Logout API
     *
     * @return \Illuminate\Http\Response
     */
    public function logout()
    {
        $this->customer->appLogout();
        return $this->sendResponse('', 'You have successfully logout.');
    }

    /**
     * Remove Account API
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->customer->delete($id);
        return $this->sendResponse('', 'Your account removed successfully.');
    }
}
