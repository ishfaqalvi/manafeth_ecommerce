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
        // Initialize response variables
        $customer = null;
        $message = '';
        $status = false;

        // Check if the customer is registering as 'Registered'
        if ($data['type'] === 'Registered') {
            // Check if the customer already exists by email or mobile number
            $checkUser = Customer::where('email', $data['email'])
                                ->orWhere('mobile_number', $data['mobile_number'])
                                ->first();

            if ($checkUser) {
                // If the customer exists and is a Guest, update to Registered
                if ($checkUser->type === 'Guest') {
                    $checkUser->update($data);
                    $customer = $checkUser;
                    $message = 'Your account has been updated to a registered account.';
                    $status = true;
                } else {
                    // If the customer is already Registered, return an error message
                    return [
                        'status' => false,
                        'message' => 'Already registered an account against this email or mobile number.'
                    ];
                }
            } else {
                // If no existing customer is found, create a new Registered customer
                $customer = Customer::create($data);
                $message = 'Your account has been created successfully.';
                $status = true;
            }

            // Post-registration verification for Registered users only
            if ($customer) {
                if (isset($data['verification_by']) && $data['verification_by'] === 'Phone') {
                    // Mark the email as verified if registered by phone
                    $customer->update(['email_verified_at' => now()]);
                    $message .= ' Your account has been verified by phone.';
                } else {
                    // Send OTP to email for verification
                    $otp = rand(1000, 9999);
                    Mail::to($data['email'])->send(new OTPMail($otp, 'Account Verification'));
                    Token::updateOrCreate(['email' => $data['email']], [
                        'email'       => $data['email'],
                        'otp'         => $otp,
                        'expiry_time' => now()->addMinutes(10),
                        'used'        => false
                    ]);
                    $message .= ' Check your email for account verification.';
                }
            }
        } else {
            if($data['otpEmail'] && $data['email']){
                $checkUser = Customer::whereEmail($data['email'])->first();
            }else{
                $checkUser = Customer::whereMobileNumber($data['mobile_number'])->first();
            }
            if ($checkUser) {
                $customer = $checkUser;
                $message = 'User already exists.';
                $status = true;
            } else {
                $customer = Customer::create($data);
                $message = 'Guest account created successfully.';
                $status = true;
            }
        }

        return [
            'status' => $status,
            'message' => $message,
            'customer' => $customer
        ];
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
        if(isset($data['email'])){
            $customer = Customer::where('email', $data['email'])->whereNotNull('email_verified_at')->first();
        }
        if(isset($data['mobile_number'])){
            $customer = Customer::where('mobile_number', $data['mobile_number'])->whereNotNull('email_verified_at')->first();
        }
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
        if(count($customer->orders) > 0 || count($customer->rentRequests) > 0 || count($customer->maintenenceRequests) > 0 ){
            return false;
        }
        $customer->addresses()->delete();
        $customer->favouriteProducts()->delete();
        $customer->carts()->delete();
        $customer->coupons()->delete();
        $customer->tokens()->delete();
        $customer->delete();
        return true;
    }

    public function checkEmail($data)
    {
        $query = Customer::query();
        if (isset($data['id'])) {
            $query->where('id','!=', $data['id']);
        }
        $user = $query->where('email', $data['email'])->first();
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

    public function list()
    {
        return Customer::paginate();
    }

    public function new()
    {
        return new Customer();
    }

    public function store($data)
    {
        return Customer::create($data);
    }

    public function find($id)
    {
        return Customer::find($id);
    }
}
