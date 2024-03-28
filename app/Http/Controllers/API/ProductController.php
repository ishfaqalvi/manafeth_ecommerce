<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\API\BaseController;
use App\Contracts\ProductInterface;
use Illuminate\Http\Request;

class ProductController extends BaseController
{
    protected $product;
    
    public function __construct(ProductInterface $product){
        $this->product = $product;
    }

    /**
     * Display a listing of the resource.
     */
    public function saleList(Request $request)
    {
        try {
            $products = $this->product->saleProductList($request->all());
            return $this->sendResponse($products, 'All sale product list get successfully.');
        } catch (\Throwable $th) {
            return $this->sendException($th->getMessage());
        }
    }

    /**
     * Display a listing of the resource.
     */
    public function saleSpecial(Request $request)
    {
        try {
            $products = $this->product->saleSpecial($request->all());
            return $this->sendResponse($products, 'Sale special product list get successfully.');
        } catch (\Throwable $th) {
            return $this->sendException($th->getMessage());
        }
    }

    /**
     * Display a listing of the resource.
     */
    public function saleCategoryWise($id)
    {
        try {
            $products = $this->product->saleCategoryWise($id);
            return $this->sendResponse($products, 'Sale category wise product list get successfully.');
        } catch (\Throwable $th) {
            return $this->sendException($th->getMessage());
        }
    }

    /**
     * Display a listing of the resource.
     */
    public function rentList(Request $request)
    {
        try {
            $products = $this->product->rentProductList($request->all());
            return $this->sendResponse($products, 'All rent product list get successfully.');
        } catch (\Throwable $th) {
            return $this->sendException($th->getMessage());
        }
    }

    /**
     * Display a listing of the resource.
     */
    public function rentSpecial(Request $request)
    {
        try {
            $products = $this->product->rentSpecial($request->all());
            return $this->sendResponse($products, 'Rent special product list get successfully.');
        } catch (\Throwable $th) {
            return $this->sendException($th->getMessage());
        }
    }

    /**
     * Display a listing of the resource.
     */
    public function rentCategoryWise($id)
    {
        try {
            $products = $this->product->rentCategoryWise($id);
            return $this->sendResponse($products, 'Rent category wise product list get successfully.');
        } catch (\Throwable $th) {
            return $this->sendException($th->getMessage());
        }
    }

    /**
     * Display a listing of the resource.
     */
    public function maintenanceList(Request $request)
    {
        try {
            $products = $this->product->maintenanceProductList($request->all());
            return $this->sendResponse($products, 'All maintenance product list get successfully.');
        } catch (\Throwable $th) {
            return $this->sendException($th->getMessage());
        }
    }

    /**
     * Display a listing of the resource.
     */
    public function maintenanceSpecial(Request $request)
    {
        try {
            $products = $this->product->maintenanceSpecial($request->all());
            return $this->sendResponse($products, 'Maintenance special product list get successfully.');
        } catch (\Throwable $th) {
            return $this->sendException($th->getMessage());
        }
    }

    /**
     * Display a listing of the resource.
     */
    public function maintenanceCategoryWise($id)
    {
        try {
            $products = $this->product->maintenanceCategoryWise($id);
            return $this->sendResponse($products, 'Maintenance category wise product list get successfully.');
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
            $product = $this->product->viewDetail($id);
            return $this->sendResponse($product, 'Product detail get successfully.');
        } catch (\Throwable $th) {
            return $this->sendException($th->getMessage());
        }
    }

    /**
     * Display a listing of the resource.
     */
    public function filters(Request $request)
    {
        try {
            $filters = $this->product->filters($request->all());
            return $this->sendResponse($filters, 'Product filters get successfully.');
        } catch (\Throwable $th) {
            return $this->sendException($th->getMessage());
        }
    }
}
