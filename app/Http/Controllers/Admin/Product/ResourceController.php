<?php

namespace App\Http\Controllers\Admin\Product;

use App\Http\Controllers\Controller;
use App\Contracts\ProductInterface;
use Illuminate\Http\Request;

/**
 * Class ProductResourceController
 * @package App\Http\Controllers
 */
class ResourceController extends Controller
{
    protected $product;
    
    public function __construct(ProductInterface $product)
    {
        $this->product = $product;

        $this->middleware('permission:productResource-create',['only' => ['store']]);
        $this->middleware('permission:productResource-edit',  ['only' => ['update']]);
        $this->middleware('permission:productResource-delete',['only' => ['destroy']]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->product->resourceStore($request->all());
        return redirect()->back()->with('success', 'Product Resource created successfully.');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  ProductResource $productResource
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $this->product->resourceUpdate($request->all());

        return redirect()->back()->with('success', 'Product Resource updated successfully.');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $this->product->resourceDelete($id);

        return redirect()->back()->with('success', 'Product Resource deleted successfully.');
    }
}
