<?php

namespace App\Http\Controllers\API\Customer;
use Illuminate\Http\Request;

use App\Contracts\ProductInterface;
use App\Http\Controllers\API\BaseController;

/**
 * Class FavouriteProductController
 * @package App\Http\Controllers
 */
class FavouriteProductController extends BaseController
{
    protected $product;

    public function __construct(ProductInterface $product){
        $this->product = $product;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            return $this->sendResponse($this->product->favouriteList('customerapi'), 'Favourite Product list get successfully.');
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
            $responce = $this->product->favouriteStore($request->all(), 'customerapi');
            if ($responce = false) {
                return $this->sendError('Record Exist', 'This product already exist in favourite list.');
            }
            return $this->sendResponse($this->product->favouriteList('customerapi'), 'Product added in favourite list successfully.');
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
            $this->product->favouriteRemove($id);
            return $this->sendResponse($this->product->favouriteList('customerapi'), 'Product deleted from favourite list successfully.');
        } catch (\Throwable $th) {
            return $this->sendException($th->getMessage());
        }
    }
}
