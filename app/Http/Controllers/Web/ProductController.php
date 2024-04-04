<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Contracts\ProductInterface;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    protected $product;

    public function __construct(ProductInterface $product)
    {
        $this->product = $product;
    }

    /**
     * Display a listing of the resource.
     */
    public function sale(Request $request)
    {
        $products = $this->product->saleProductList($request->all());
        return view('web.product.sale', compact('products'));
    }

    /**
     * Display a listing of the resource.
     */
    public function rent(Request $request)
    {
        $products = $this->product->rentProductList($request->all());
        return view('web.product.sale', compact('products'));
    }

    /**
     * Display a listing of the resource.
     */
    public function maintenance(Request $request)
    {
        $products = $this->product->maintenanceProductList($request->all());
        return view('web.product.sale', compact('products'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $product = $this->product->show($id);
        return view('web.product.show', compact('product'));
    }
}
