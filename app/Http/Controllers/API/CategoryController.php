<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Contracts\CategoryInterface;
use App\Http\Controllers\API\BaseController;

class CategoryController extends BaseController
{
    protected $category;

    public function __construct(CategoryInterface $category){
        $this->category = $category;
    }
    /**
     * Display a listing of the resource.
     */
    public function main(Request $request)
    {
        try {
            $categories = $this->category->mainList($request->type);
            return $this->sendResponse($categories, 'Main category list get successfully.');
        } catch (\Throwable $th) {
            return $this->sendException($th->getMessage());
        }
    }

    /**
     * Display a listing of the resource.
     */
    public function sub(Request $request)
    {
        try {
            $subCategories = $this->category->subList($request->type);
            return $this->sendResponse($subCategories, 'Sub category list get successfully.');
        } catch (\Throwable $th) {
            return $this->sendException($th->getMessage());
        }
    }
}
