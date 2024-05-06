<?php
namespace App\Repositories;

use App\Mail\OTPMail;
use App\Contracts\CustomerInterface;
use App\Models\{Customer, Token, Address};
use Illuminate\Support\Facades\{Validator,Hash,Mail, Auth};

class CustomerRepository implements CustomerInterface
{
	public function register($data)
    {
    	$checkUser = Customer::whereEmail($data['email'])->first();
        if ($checkUser) {
            $customer = $checkUser->update($data);
        }else{
            $customer = Customer::create($data);
        }
        $otp = rand(1000, 9999);
        Mail::to($data['email'])->send(new OTPMail($otp, 'Account Varification'));
        Token::updateOrCreate(['email' => $data['email']], [
            'email'      => $data['email'],
            'otp'        => $otp,
            'expiry_time'=> now()->addMinutes(10),
            'used'       => false
        ]);
        return $customer;
    }

    public function verifyOTP($data)
    {
        $record = Token::where('email', $data['email'])
                ->where('otp', $data['otp'])
                ->where('expiry_time', '>', now())
                ->where('used', 0)
                ->first();
        if (!$record){
            return "false";
        }else {
            return "true";
        }
    }

    public function verifyAccount($data)
    {
        $customer = Customer::whereEmail($data['email'])->first();
        $customer->email_verified_at = now();
        $customer->save();
        Token::whereEmail($data['email'])->delete();
    }

    public function webLogin($credentials, $email)
    {
        $customer = Customer::where('email', $email)->whereNotNull('email_verified_at')->first();
        if ($customer && Auth::guard('customer')->attempt($credentials)) {
            return true;
        } else {
            return false;
        }
    }

    public function webLogout()
    {
        Auth::guard('customer')->logout();
    }

    public function appLogin($data)
    {
        $customer = Customer::where('email', $data['email'])->whereNotNull('email_verified_at')->first();
        if (!$customer || !Hash::check($data['password'], $customer->password)) {
            return false;
        }else{
            $customer->token = $customer->createToken('customer-token')->plainTextToken;
            return $customer;
        }
    }

    public function appLogout()
    {
        auth('customerapi')->user()->tokens()->delete();
    }

    public function view()
    {
        return Auth::guard('customer')->user();
    }

    public function update($data, $id)
    {
        $customer = Customer::find($id);
        if (!empty($data['new_password'])) {
            $data['password'] = $data['new_password'];
        }
        return $customer->update($data);
    }

    public function forgotPassword($data)
    {
        $customer = Customer::whereEmail($data['email'])->first();
        if($customer){
            $otp = rand(1000, 9999);
            Token::updateOrCreate(['email' => $data['email']], [
                'email'      => $data['email'],
                'otp'        => $otp,
                'expiry_time'=> now()->addMinutes(10),
                'used'       => false
            ]);
            Mail::to($data['email'])->send(new OTPMail($otp, 'Forgot Password'));
            return true;
        }else{
            return false;
        }
    }

    public function resetPassword($data)
    {
        $record = Token::where('email', $data['email'])
                ->where('otp', $data['otp'] ?? '')
                ->where('expiry_time', '>', now())
                ->where('used', 0)
                ->first();
        if (!$record){
            return false;
        }else {
            $customer = Customer::whereEmail($data['email'])->first();
            $customer->update(['password' => $data['new_password']]);
            $record->delete();
            return true;
        }
    }

    public function delete($id)
    {
        $customer = Customer::find($id);
        $customer->tokens()->delete();
        $customer->delete();
    }

    public function checkEmail($data)
    {
        if (isset($data['id'])) {
            $user = Customer::where('id','!=',$data['id'])->where('email', $data['email'])->first();
        }else{
            $user = Customer::where('email', $data['email'])->first();
        }
        if($user && !empty($user->email_verified_at)){ return "false"; }else{ return "true";}
    }

    public function verifyEmail($data)
    {
        $user = Customer::where('email', $data['email'])->first();
        if($user){ return "true"; }else{ return "false";}
    }

    public function checkPassword($data)
    {
        $customer = Customer::find($data['id']);
        if(!Hash::check($data['old_password'], $customer['password'])) { echo "false"; }else{ echo "true";}
    }

    public function addressList($id)
    {
        return Address::whereCustomerId($id)->get();
    }

    public function addressNew()
    {
        return new Address();
    }

    public function addressStore($data)
    {
        Address::create($data);
    }

    public function addressFind($id)
    {
        return Address::find($id);
    }

    public function addressUpdate($data, $id)
    {
        Address::find($id)->update($data);
    }

    public function addressDelete($id)
    {
        Address::find($id)->delete();
    }
}
