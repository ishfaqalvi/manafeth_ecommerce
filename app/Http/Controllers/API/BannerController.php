<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\API\BaseController;

use App\Models\Banner;
use Illuminate\Http\Request;

/**
 * Class BannerController
 * @package App\Http\Controllers
 */
class BannerController extends BaseController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $banners = Banner::whereStatus('Active')->get();
            return $this->sendResponse($banners, 'Banner list get successfully.');
        } catch (\Throwable $th) {
            return $this->sendException($th->getMessage());
        }
    }
}
