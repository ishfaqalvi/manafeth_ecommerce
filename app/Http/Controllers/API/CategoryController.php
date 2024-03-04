<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\API\BaseController;
use App\Models\{Category,SubCategory};
use Illuminate\Http\Request;

class CategoryController extends BaseController
{
    /**
     * Display a listing of the resource.
     */
    public function main()
    {
        try {
            $categories = Category::with('subCategories')->get();
            return $this->sendResponse($categories, 'Main category list get successfully.');
        } catch (\Throwable $th) {
            return $this->sendException($th->getMessage());
        }
    }

    /**
     * Display a listing of the resource.
     */
    public function sub()
    {
        try {
            $subCategories = SubCategory::with('category')->get();
            return $this->sendResponse($subCategories, 'Sub category list get successfully.');
        } catch (\Throwable $th) {
            return $this->sendException($th->getMessage());
        }
    }
}
