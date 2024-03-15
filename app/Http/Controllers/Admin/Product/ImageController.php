<?php

namespace App\Http\Controllers\Admin\Product;

use App\Http\Controllers\Controller;
use App\Contracts\ProductInterface;
use Illuminate\Http\Request;

/**
 * Class ImageController
 * @package App\Http\Controllers
 */
class ImageController extends Controller
{
    protected $product;
    
    public function __construct(ProductInterface $product)
    {
        $this->product = $product;

        $this->middleware('permission:productImage-create',['only' => ['store']]);
        $this->middleware('permission:productImage-delete',['only' => ['destroy']]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->product->imageStore($request->all());
        return redirect()->back()->with('success', 'Product Image created successfully.');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $this->product->imageDelete($id);

        return redirect()->back()->with('success', 'Product Image deleted successfully.');
    }
}
