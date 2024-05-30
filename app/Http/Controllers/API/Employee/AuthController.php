<?php

namespace App\Http\Controllers\API\Employee;

use Illuminate\Http\Request;
use App\Contracts\EmployeeInterface;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\API\BaseController;

class AuthController extends BaseController
{
    protected $employee;

    public function __construct(EmployeeInterface $employee){
        $this->employee = $employee;
    }

    /**
     * Login API
     *
     * @return \Illuminate\Http\Response
     */
    public function login(Request $request)
    {
        try {
            $responce = $this->employee->login($request->all());
            if ($responce['status'] == false) {
                return $this->sendError('Unauthorised.', ['error' => $responce['message']]);
            }
            return $this->sendResponse($responce, 'Employee login successfully.');
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
        return $this->sendResponse(auth::guard('employee')->user(), 'Profile data get successfully.');
    }

    /**
     * Guard Update API
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        try {
            $employee = $this->employee->update($request->all(), auth::guard('employee')->user()->id);
            return $this->sendResponse($employee, 'Your profile updated successfully.');
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
            $responce = $this->employee->forgotPassword($request->all());
            if($responce){
                return $this->sendResponse('', 'OTP sent to your email successfully.');
            }else{
                return $this->sendError('Invalid Error', 'Email is not exist is our record.');
            }
        } catch (\Throwable $th) {
            return $this->sendException($th->getMessage());
        }
    }

    /**
     * Reset Password API
     *
     * @return \Illuminate\Http\Response
     */
    public function resetPass(Request $request)
    {
        try {
            $responce = $this->employee->resetPassword($request->all());
            if($responce == true){
                return $this->sendResponse('', 'Password has been reset successfully.');
            }
            return $this->sendError('Invalid Error', 'Invalid email or expired OTP.');
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
        $this->employee->logout();
        return $this->sendResponse('', 'You have successfully logout.');
    }

    /**
     * Validate a resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function checkOldPass(Request $request)
    {
        $responce = $this->employee->checkPassword($request->all());
        if($responce){
            return $this->sendResponse('', 'You have successfully verify password.');
        }else{
            return $this->sendError('Invalid Error', 'Invalid Password.');
        }
    }
}
