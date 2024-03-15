<?php

namespace App\Http\Controllers\Admin\Product;

use App\Http\Controllers\Controller;
use App\Contracts\ProductInterface;
use Illuminate\Http\Request;

/**
 * Class ProductFeatureController
 * @package App\Http\Controllers
 */
class FeatureController extends Controller
{
    protected $product;
    
    public function __construct(ProductInterface $product)
    {
        $this->product = $product;

        $this->middleware('permission:productFeatures-create',['only' => ['store']]);
        $this->middleware('permission:productFeatures-edit',  ['only' => ['update']]);
        $this->middleware('permission:productFeatures-delete',['only' => ['destroy']]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->product->featureStore($request->all());
        return redirect()->back()->with('success', 'Product Feature created successfully.');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  ProductFeature $productFeature
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $this->product->featureUpdate($request->all());

        return redirect()->back()->with('success', 'Product Feature updated successfully.');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $this->product->featureDelete($id);

        return redirect()->back()->with('success', 'Product Feature deleted successfully.');
    }
}
