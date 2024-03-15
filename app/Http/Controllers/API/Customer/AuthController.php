<?php

namespace App\Http\Controllers\API\Customer;

use App\Http\Controllers\API\BaseController;
use Illuminate\Support\Facades\{Validator,Hash,Mail};
use App\Models\{Customer,Token};
use Illuminate\Http\Request;
use App\Mail\OTPMail;
 
class AuthController extends BaseController
{
    /**
     * Register API
     *
     * @return \Illuminate\Http\Response
     */
    public function register(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'name'            => 'required|string|max:50',
                'email'           => 'required|email',
                'password'        => 'required|min:8|max:16',
                'confirm_password'=> 'required|min:8|max:16|same:password',
                'address'         => 'required|string'
            ]);
            if ($validator->fails()) {
                return $this->sendError('Validation Error.', $validator->errors());
            }
            $checkUser = Customer::whereEmail($request->email)->first();
            if ($checkUser) {
                if(!empty($checkUser->email_verified_at))
                {
                    return $this->sendError('Validation Error.', ['error' => 'User already registerd against this email.']);    
                }else{
                    $customer = $checkUser;
                    $message = 'Your account is already exist but not varified. Check your email for account verification.';
                }   
            }else{
                $customer = Customer::create($request->all());
                $message = 'Your account has been created successfully. Check your email for account verification.';
            }
            $otp = rand(1000, 9999);
            Mail::to($request->email)->send(new OTPMail($otp, 'Account Varification'));
            Token::updateOrCreate(['email' => $request->email], [
                'email'      => $request->email,
                'otp'        => $otp,
                'expiry_time'=> now()->addMinutes(10),
                'used'       => false
            ]);
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
            $validator = Validator::make($request->all(), [
                'email'    => 'required|string|email|exists:customers',
                'password' => 'required|min:8|max:16'
            ]);
            if ($validator->fails()) {
                return $this->sendError('Validation Error.', $validator->errors());
            }
            $customer = Customer::where('email', $request->email)->first();
            if(empty($customer->email_verified_at))
            {
                return $this->sendError('Varification.', ['error' => 'Oops! your account is not varified.']);    
            }
            if (!$customer || !Hash::check($request->password, $customer->password)) {
                return $this->sendError('Unauthorised.', ['error' => 'The provided credentials are incorrect.']);
            }
            $customer->token = $customer->createToken('customer-token')->plainTextToken;
            return $this->sendResponse($customer, 'Customer login successfully.');
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
        return $this->sendResponse(auth()->user(), 'Profile data get successfully.');
    }

    /**
     * Guard Update API
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'name'            => 'required|string|max:50',
                'email'           => 'required|email|unique:customers,email,'.auth()->user()->id,
                'address'         => 'required|string',
                'current_password'=> 'nullable|required_with:new_password',
                'new_password'    => 'nullable|min:8|max:16',
                'confirm_password'=> 'nullable|min:8|max:16|same:new_password'
            ]);
            if ($validator->fails()) {
                return $this->sendError('Validation Error.', $validator->errors());
            }
            $customer = auth()->user();
            $input = $request->all();
            if ($request->new_password) {
                if (Hash::check($input['current_password'], $customer->password)) {
                    $input['password'] = $request->new_password;
                } else {
                    return $this->sendError('Password Error.', 'Oops! current password is incorrect.');
                }
            }
            $customer->update($input);
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
            $validator = Validator::make($request->all(), [
                'email' => 'required|email|exists:customers',
            ]);
            if ($validator->fails()) {
                return $this->sendError('Validation Error.', $validator->errors());
            }
            $otp = rand(1000, 9999);
            $expiryTime = now()->addMinutes(10);
            Mail::to($request->email)->send(new OTPMail($otp,'Forgot Password'));
            Token::updateOrCreate(['email' => $request->email], [
                'email'      => $request->email,
                'otp'        => $otp,
                'expiry_time'=> $expiryTime,
                'used'       => false
            ]);
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
            $validator = Validator::make($request->all(), [
                'email' => 'required|email|exists:customers',
                'otp'   => 'required',
            ]);
            if ($validator->fails()) {
                return $this->sendError('Validation Error.', $validator->errors());
            }
            $savedOTP = Token::where('email', $request->email)
                    ->where('otp', $request->otp)
                    ->where('expiry_time', '>', now())
                    ->where('used', false)
                    ->first();
            if (!$savedOTP) {
                return $this->sendError('Invalid Error', 'Invalid or expired OTP.');    
            }
            $savedOTP->update(['used' => true]);
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
            $validator = Validator::make($request->all(), [
                'email'           => 'required|email|exists:customers',
                'new_password'    => 'required|min:8|max:16',
                'confirm_password'=> 'required|min:8|max:16|same:new_password'
            ]);
            if ($validator->fails()) {
                return $this->sendError('Validation Error.', $validator->errors());
            }
            $customer = Customer::whereEmail($request->email)->first();
            $customer->update(['password' => $request->new_password]);
            Token::where('email',$request->email)->delete();
            return $this->sendResponse('', 'Password has been reset successfully.');
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
            $validator = Validator::make($request->all(), [
                'email' => 'required|email|exists:customers'
            ]);
            if ($validator->fails()) {
                return $this->sendError('Validation Error.', $validator->errors());
            }
            $customer = Customer::whereEmail($request->email)->first();
            $customer->email_verified_at = now();
            $customer->save();
            Token::whereEmail($request->email)->delete();
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
        auth()->user()->tokens()->delete();
        return $this->sendResponse('', 'You have successfully logout.');
    }

    /**
     * Remove Account API
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $customer = Customer::find($id);
        $customer->tokens()->delete();
        $customer->delete();
        return $this->sendResponse('', 'Your account removed successfully.');
    }
}
