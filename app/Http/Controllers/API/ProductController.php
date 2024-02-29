<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\API\BaseController;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends BaseController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $products = Product::with(['brand','category','subCategory'])->paginate();
            return $this->sendResponse($products, 'Products list get successfully.');
        } catch (\Throwable $th) {
            return $this->sendException($th->getMessage());
        }
    }

    /**
     * Display a listing of the resource.
     */
    public function show($id)
    {
        try {
            $product = Product::with(
                ['brand','category','subCategory','features','specifications','resources','images']
            )->find($id);
            return $this->sendResponse($product, 'Product detail get successfully.');
        } catch (\Throwable $th) {
            return $this->sendException($th->getMessage());
        }
    }
}
