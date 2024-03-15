<?php

namespace App\Http\Controllers\Admin\Product;

use App\Http\Controllers\Controller;
use App\Contracts\ProductInterface;
use Illuminate\Http\Request;

class MaintenanceController extends Controller
{
    protected $product;
    
    public function __construct(ProductInterface $product)
    {
        $this->product = $product;

        $this->middleware('permission:maintenanceProducts-list',  ['only' => ['index']]);
        $this->middleware('permission:maintenanceProducts-view',  ['only' => ['show']]);
        $this->middleware('permission:maintenanceProducts-create',['only' => ['create','store']]);
        $this->middleware('permission:maintenanceProducts-edit',  ['only' => ['edit','update']]);
        $this->middleware('permission:maintenanceProducts-delete',['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $products = $this->product->maintenanceProductList($request->all());
        $request->method() == 'POST' ? $userRequest = $request : $userRequest = null;

        return view('admin.product.maintenance.index', compact('products','userRequest'));   
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $product = $this->product->create();
        return view('admin.product.maintenance.create', compact('product'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $product = $this->product->store($request->all());
        return redirect()->route('products.maintenance.index')
            ->with('success', 'Product created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $product = $this->product->show($id);
        return view('admin.product.maintenance.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $product = $this->product->edit($id);
        return view('admin.product.maintenance.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $product = $this->product->update($request->all(), $id);
        return redirect()->route('products.maintenance.index')
            ->with('success', 'Product updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product = $this->product->delete($id);
        return redirect()->route('products.maintenance.index')
            ->with('success', 'Product deleted successfully.');
    }
}
