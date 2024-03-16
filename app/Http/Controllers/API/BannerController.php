<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\API\BaseController;
use App\Contracts\BannerInterface;
use Illuminate\Http\Request;

/**
 * Class BannerController
 * @package App\Http\Controllers
 */
class BannerController extends BaseController
{
    protected $banner;
    
    public function __construct(BannerInterface $banner){
        $this->banner = $banner;
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        try {
            $banners = $this->banner->list($request->all());
            return $this->sendResponse($banners, 'Banner list get successfully.');
        } catch (\Throwable $th) {
            return $this->sendException($th->getMessage());
        }
    }
}
