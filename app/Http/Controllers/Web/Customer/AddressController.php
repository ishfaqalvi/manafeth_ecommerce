<?php

namespace App\Http\Controllers\Web\Customer;


use Illuminate\Http\Request;
use App\Contracts\CustomerInterface;
use App\Http\Controllers\Controller;

/**
 * Class AddressController
 * @package App\Http\Controllers
 */
class AddressController extends Controller
{
    protected $customer;

    public function __construct(CustomerInterface $customer){
        $this->customer = $customer;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $addresses = $this->customer->addressList(auth('customer')->user()->id);

        return view('web.customer.address.index', compact('addresses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $address = $this->customer->addressNew();
        return view('web.customer.address.create', compact('address'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $address = $this->customer->addressStore($request->all());
        return response()->json(['success' => true]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $address = $this->customer->addressFind($id);

        return view('web.customer.address.edit', compact('address'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Address $address
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $this->customer->addressUpdate($request->all(), $request->id);
        return response()->json(['success' => true]);
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy(Request $request)
    {
        $this->customer->addressDelete($request->id);
        return response()->json(['success' => true]);
    }
}
