<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Contracts\CustomerInterface;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Customer;

class AuthController extends Controller
{
    protected $customer;

    public function __construct(CustomerInterface $customer){
        $this->customer = $customer;
    }

    /**
     * Show the application's register form.
     *
     * @return \Illuminate\View\View
     */
    public function showRegisterForm()
    {
        if (Auth::guard('customer')->check()) {
            return redirect()->route('profile.show');
        }
        return view('web.auth.register');
    }

    /**
     * Validate the request and register the user.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\JsonResponse
     */
    public function register(Request $request)
    {
        $customer = $this->customer->register($request->all());
        return response()->json(['success' => true,'data' => $customer]);
    }

    /**
     * Validate the request and register the user.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\JsonResponse
     */
    public function verifyOTP(Request $request)
    {
        return $this->customer->verifyOTP($request->all());
    }

    /**
     * Validate the request and register the user.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\JsonResponse
     */
    public function verifyAccount(Request $request)
    {
        $this->customer->verifyAccount($request->all());
        return response()->json(['success' => true]);
    }

    /**
     * Show the application's login form.
     *
     * @return \Illuminate\View\View
     */
    public function showLoginForm()
    {
        if (Auth::guard('customer')->check()) {
            return redirect()->route('profile.show');
        }
        return view('web.auth.login');
    }

    /**
     * Validate the request and Log in the user.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\JsonResponse
     */
    public function login(Request $request)
    {
        $response = $this->customer->webLogin($request->only('email', 'password'), $request->email);

        return response()->json(['success' => $response]);
    }

    /**
     * Show the application's login form.
     *
     * @return \Illuminate\View\View
     */
    public function showForgotPassForm ()
    {
        if (Auth::guard('customer')->check()) {
            return redirect()->route('profile.show');
        }
        return view('web.auth.forgot_password');
    }

    /**
     * Validate the request and Log in the user.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\JsonResponse
     */
    public function forgotPassword(Request $request)
    {
        $this->customer->forgotPassword($request->only('email', 'password'), $request->email);

        return response()->json(['success' => true]);
    }

    /**
     * Show the application's login form.
     *
     * @return \Illuminate\View\View
     */
    public function showResetPassword(Request $request)
    {
        if (Auth::guard('customer')->check()) {
            return redirect()->route('profile.show');
        }
        $email = $request->email;
        $otp = $request->otp;
        return view('web.auth.reset_password', compact('email','otp'));
    }

    /**
     * Validate the request and Log in the user.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\JsonResponse
     */
    public function resetPassword(Request $request)
    {
        $responce = $this->customer->resetPassword($request->all());

        return response()->json(['success' => $responce]);
    }

    /**
     * Validate a resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function checkEmail(Request $request)
    {
        return $this->customer->checkEmail($request->all());
    }

    /**
     * Validate a resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function verifyEmail(Request $request)
    {
        return $this->customer->verifyEmail($request->all());
    }
}
