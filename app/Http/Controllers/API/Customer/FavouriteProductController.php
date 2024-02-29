<?php

namespace App\Http\Controllers\API\Customer;
use App\Http\Controllers\API\BaseController;

use App\Models\FavouriteProduct;
use Illuminate\Http\Request;

/**
 * Class FavouriteProductController
 * @package App\Http\Controllers
 */
class FavouriteProductController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $data = auth()->user()->favouriteProducts()->with(['product.brand', 'product.category', 'product.subCategory'])->paginate();
            return $this->sendResponse($data, 'Favourite Product list get successfully.');
        } catch (\Throwable $th) {
            return $this->sendException($th->getMessage());
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $product = $request->product_id;
            $checkProduct = auth()->user()->favouriteProducts()->whereProductId($product)->first();
            if ($checkProduct) {
                return $this->sendError('Record Exist', 'This product already exist in favourite list.');    
            }
            FavouriteProduct::create(['customer_id' => auth()->user()->id,'product_id' => $product]);
            $data = auth()->user()->favouriteProducts()->with(['product.brand', 'product.category', 'product.subCategory'])->paginate();
            return $this->sendResponse($data, 'Product added in favourite list successfully.');
        } catch (\Throwable $th) {
            return $this->sendException($th->getMessage());
        }
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        try {
            FavouriteProduct::find($id)->delete();
            $data = auth()->user()->favouriteProducts()->with(['product.brand', 'product.category', 'product.subCategory'])->paginate();
            return $this->sendResponse($data, 'Product deleted from favourite list successfully.');
        } catch (\Throwable $th) {
            return $this->sendException($th->getMessage());
        }
    }
}
