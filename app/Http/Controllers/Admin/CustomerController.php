<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Contracts\CustomerInterface;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\CustomerOrdersExport;
use App\Exports\CustomerRentOrdersExport;
use App\Exports\CustomerMaintenenceRequestExport;

/**
 * Class CustomerController
 * @package App\Http\Controllers
 */
class CustomerController extends Controller
{
    protected $customer;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct(CustomerInterface $customer)
    {
        $this->customer = $customer;
        $this->middleware('permission:customers-list',  ['only' => ['index']]);
        $this->middleware('permission:customers-view',  ['only' => ['show']]);
        $this->middleware('permission:customers-create',['only' => ['create','store']]);
        $this->middleware('permission:customers-edit',  ['only' => ['edit','update']]);
        $this->middleware('permission:customers-delete',['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $customers = $this->customer->list($request->all()); 

        return view('admin.customer.index', compact('customers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $customer = $this->customer->new();
        return view('admin.customer.create', compact('customer'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->customer->store($request->all());
        return redirect()->route('customers.index')
            ->with('success', 'Customer created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $customer = $this->customer->find($id);

        return view('admin.customer.show', compact('customer'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $customer = $this->customer->find($id);

        return view('admin.customer.edit', compact('customer'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Customer $customer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $customer)
    {
        $this->customer->update($request->all(), $customer);

        return redirect()->route('customers.index')
            ->with('success', 'Customer updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $responce = $this->customer->delete($id);
        if($responce){
            return redirect()->route('customers.index')
            ->with('success', 'Customer deleted successfully');
        }
        return redirect()->route('customers.index')
            ->with('warning', 'Opps! this customer data exist.');
    }

    /**
     * Validate a resource.
     */
    public function checkEmail(Request $request)
    {
        $responce = $this->customer->checkEmail($request->all());
        echo $responce;
    }

    /**
     * Export a resource.
     */
    public function exportSaleOrder($id)
    {
        return Excel::download(new CustomerOrdersExport($id), 'customer_sale_orders_' . $id . '.xlsx');
    }

    /**
     * Export a resource.
     */
    public function exportRentOrder($id)
    {
        return Excel::download(new CustomerRentOrdersExport($id), 'customer_rent_orders_' . $id . '.xlsx');
    }

    /**
     * Export a resource.
     */
    public function exportMaintenenceOrder($id)
    {
        return Excel::download(new CustomerMaintenenceRequestExport($id), 'customer_maintenence_orders_' . $id . '.xlsx');
    }
}
