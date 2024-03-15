<?php

namespace App\Http\Controllers\Admin\Product;

use App\Http\Controllers\Controller;
use App\Contracts\ProductInterface;
use Illuminate\Http\Request;

/**
 * Class ProductSpecificationController
 * @package App\Http\Controllers
 */
class SpecificationController extends Controller
{
    protected $product;
    
    public function __construct(ProductInterface $product)
    {
        $this->product = $product;

        $this->middleware('permission:productSpecification-create',['only' => ['store']]);
        $this->middleware('permission:productSpecification-edit',  ['only' => ['update']]);
        $this->middleware('permission:productSpecification-delete',['only' => ['destroy']]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->product->specificationStore($request->all());
        return redirect()->back()->with('success', 'Product Specification created successfully.');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  ProductSpecification $productSpecification
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $this->product->specificationUpdate($request->all());

        return redirect()->back()->with('success', 'Product Specification updated successfully.');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $this->product->specificationDelete($id);

        return redirect()->back()->with('success', 'Product Specification deleted successfully.');
    }
}