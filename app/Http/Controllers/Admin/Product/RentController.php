<?php

namespace App\Http\Controllers\Admin\Product;

use App\Models\ProductRent;
use Illuminate\Http\Request;
use App\Contracts\RentInterface;
use App\Contracts\ProductInterface;
use App\Http\Controllers\Controller;

class RentController extends Controller
{
    protected $product;
    protected $order;

    public function __construct(ProductInterface $product, RentInterface $order)
    {
        $this->product = $product;
        $this->order = $order;
        $this->middleware('permission:rentProducts-list',  ['only' => ['index']]);
        $this->middleware('permission:rentProducts-view',  ['only' => ['show']]);
        $this->middleware('permission:rentProducts-create',['only' => ['create','store']]);
        $this->middleware('permission:rentProducts-edit',  ['only' => ['edit','update']]);
        $this->middleware('permission:rentProducts-delete',['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $products = $this->product->rentAdminList($request->all());
        $request->method() == 'POST' ? $userRequest = $request : $userRequest = null;

        return view('admin.product.rent.index', compact('products','userRequest'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $product = $this->product->create();

        return view('admin.product.rent.create', compact('product'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $product = $this->product->store($request->all());
        return redirect()->route('products.maintenance.edit', $product->id)
            ->with('success', 'Product created successfully.');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function addToCart(Request $request)
    {
        $responce = $this->order->cartStoreItem($request->all(), 'Admin');
        if($responce){
            return redirect()->back()->with('success', 'Product added to cart successfully.');
        }
        return redirect()->back()->with('warning', 'Product is already exit in cart.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $product = $this->product->show($id);
        return view('admin.product.rent.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $product = $this->product->edit($id);
        return view('admin.product.rent.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $product = $this->product->update($request->all(), $id);
        return redirect()->route('products.rent.index')
            ->with('success', 'Product updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product = $this->product->delete($id);
        return redirect()->route('products.rent.index')
            ->with('success', 'Product deleted successfully.');
    }

    /**
     * Display a listing of the resource.
     */
    public function getRents(Request $request)
    {
        $rents = ProductRent::whereProductId($request->product_id)->get();

        echo json_encode($rents);
    }
}
