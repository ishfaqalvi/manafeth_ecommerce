<?php

namespace App\Http\Controllers\Web\Customer;

use Illuminate\Http\Request;
use App\Contracts\CustomerInterface;
use App\Http\Controllers\Controller;

class ProfileController extends Controller
{
    protected $customer;

    public function __construct(CustomerInterface $customer){
        $this->customer = $customer;
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        $customer = $this->customer->view();
        return view('web.customer.profile.index', compact('customer'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $this->customer->update($request->all(), auth('customer')->user()->id);
        return response()->json(['success' => true]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function logout(Request $request)
    {
        $this->customer->webLogout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('web.showLoginForm');
    }

    /**
     * Validate a resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function checkPassword(Request $request)
    {
        return $this->customer->checkPassword($request->all());
    }
}
