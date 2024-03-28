<?php

namespace App\Repositories;
use App\Contracts\CustomerInterface;
use Illuminate\Support\Facades\{Validator,Hash,Mail, Auth};
use App\Models\{Customer,Token};
use App\Mail\OTPMail;

class CustomerRepository implements CustomerInterface
{
	public function register($data)
    {
    	$checkUser = Customer::whereEmail($data['email'])->first();
        if ($checkUser) {
            $customer = $checkUser;
        }else{
            $customer = Customer::create($data);
            $message = 'Your account has been created successfully. Check your email for account verification.';
        }
        $otp = rand(1000, 9999);
        Mail::to($data['email'])->send(new OTPMail($otp, 'Account Varification'));
        Token::updateOrCreate(['email' => $data['email']], [
            'email'      => $data['email'],
            'otp'        => $otp,
            'expiry_time'=> now()->addMinutes(10),
            'used'       => false
        ]);
    }

    public function verifiOtp($data)
    {
        $record = Token::where('email', $data['email'])
                ->where('otp', $data['otp'])
                ->where('expiry_time', '>', now())
                ->where('used', false)
                ->first();
        if (!$record) { return false} else { return true}
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
}