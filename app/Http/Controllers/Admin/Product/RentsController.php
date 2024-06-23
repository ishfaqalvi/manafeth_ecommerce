<?php

namespace App\Http\Controllers\Admin\Product;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\ProductRent;

/**
 * Class ProductRentController
 * @package App\Http\Controllers
 */
class RentsController extends Controller
{
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        ProductRent::create($request->all());

        return redirect()->back()->with('success', 'Rent created successfully.');
    }



    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $productRent = ProductRent::find($request->id);
        $productRent->update($request->all());

        return redirect()->back()->with('success', 'Product Rent updated successfully');
    }

    public function destroy($id)
    {
        ProductRent::find($id)->delete();

        return redirect()->back()->with('success', 'Product Rent deleted successfully');
    }
}
