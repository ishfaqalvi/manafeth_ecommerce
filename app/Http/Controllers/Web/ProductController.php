<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Contracts\{ProductInterface, RentInterface};

class ProductController extends Controller
{
    protected $product, $rent;

    public function __construct(ProductInterface $product, RentInterface $rent)
    {
        $this->product = $product;
        $this->rent = $rent;
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
        $products = $this->product->rentProductList($request->all(), true);
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

    /**
     * Display the specified resource.
     */
    public function link(string $token)
    {
        $link = $this->rent->linkSearch(['token' => $token]);
        if ($link) {
            return view('web.product.link', compact('link'));
        }
        return view('web.product.invalid_link');
    }

    /**
     * Display the specified resource.
     */
    public function order()
    {
        return view('web.product.success');
    }
}
