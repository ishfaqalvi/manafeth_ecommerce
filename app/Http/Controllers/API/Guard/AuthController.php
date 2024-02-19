<?php

namespace App\Http\Controllers\API\Guard;

use App\Http\Controllers\API\BaseController;
use Illuminate\Support\Facades\{Validator,Hash,Mail};
use App\Models\{SecurityGuard,Token};
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
                'first_name'         => 'required|string|max:50',
                'last_name'          => 'required|string|max:50',
                'preferred_name'     => 'required|string|max:50',
                'email'              => 'required|email|unique:security_guards,email',
                'password'           => 'required|min:8|max:16',
                'confirm_password'   => 'required|min:8|max:16|same:password',
                'licence_number'     => 'required|unique:security_guards,licence_number',
                'licence_expiry_date'=> 'required|date',
                'home_address'       => 'required|string',
                'postal_address'     => 'required|string'
            ]);
            if ($validator->fails()) {
                return $this->sendError('Validation Error.', $validator->errors());
            }
            $guard = SecurityGuard::create($request->all());
            return $this->sendResponse($guard, 'Your account has been created successfully.');
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
                'email'    => 'required|string|email|exists:security_guards',
                'password' => 'required|min:8|max:16'
            ]);
            if ($validator->fails()) {
                return $this->sendError('Validation Error.', $validator->errors());
            }
            $guard = SecurityGuard::where('email', $request->email)->first();
            if (!$guard || !Hash::check($request->password, $guard->password)) {
                return $this->sendError('Unauthorised.', ['error' => 'The provided credentials are incorrect.']);
            }
            $guard->token = $guard->createToken('guard-token')->plainTextToken;
            return $this->sendResponse($guard, 'Guard login successfully.');
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
                'first_name'         => 'required|string|max:50',
                'last_name'          => 'required|string|max:50',
                'preferred_name'     => 'required|string|max:50',
                'email'              => 'required|email|unique:security_guards,email,'. auth()->user()->id,
                'licence_number'     => 'required|unique:security_guards,licence_number,'. auth()->user()->id,
                'licence_expiry_date'=> 'required|date',
                'home_address'       => 'required|string',
                'postal_address'     => 'required|string',
                'current_password'   => 'nullable|required_with:new_password',
                'new_password'       => 'nullable|min:8|max:16',
                'confirm_password'   => 'nullable|min:8|max:16|same:new_password'
            ]);
            if ($validator->fails()) {
                return $this->sendError('Validation Error.', $validator->errors());
            }
            $guard = auth()->user();
            $input = $request->all();
            if ($request->new_password) {
                if (Hash::check($input['current_password'], $guard->password)) {
                    $input['password'] = $request->new_password;
                } else {
                    return $this->sendError('Password Error.', 'Oops! current password is incorrect.');
                }
            }
            $guard->update($input);
            return $this->sendResponse($guard, 'Your profile updated successfully.');
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
                'email' => 'required|email|exists:security_guards',
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
                'email' => 'required|email|exists:security_guards',
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
                return $this->sendResponse('', 'Invalid or expired OTP.');    
            }
            $savedOTP->update(['used' => true]);
            return $this->sendResponse('', 'OTP verified. Proceed to reset password.');
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
                'email'           => 'required|email|exists:security_guards',
                'new_password'    => 'required|min:8|max:16',
                'confirm_password'=> 'required|min:8|max:16|same:new_password'
            ]);
            if ($validator->fails()) {
                return $this->sendError('Validation Error.', $validator->errors());
            }
            $guard = SecurityGuard::whereEmail($request->email)->first();
            $guard->update(['password' => $request->new_password]);
            Token::where('email',$request->email)->delete();
            return $this->sendResponse('', 'Password has been reset successfully.');
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
        $user = User::find($id);
        $user->tokens()->delete();
        $user->delete();
        return $this->sendResponse('', 'Your account removed successfully.');
    }
}
