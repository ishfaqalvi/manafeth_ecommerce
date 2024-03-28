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
            return redirect()->route('customer.profile');
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
        return $this->customer->register($request->all());
    }

    /**
     * Show the application's login form.
     *
     * @return \Illuminate\View\View
     */
    public function showLoginForm()
    {
        if (Auth::guard('customer')->check()) {
            return redirect()->route('customer.profile');
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
        $credentials = $request->only('email', 'password');

        if (Auth::guard('customer')->attempt($credentials)) {
            redirect()->route('customer.profile');
        }
        return back()->withErrors(['email' => 'The provided credentials do not match our records.']);
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
}