<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Contracts\{BannerInterface,ProductInterface};
use Illuminate\Http\Request;

class HomeController extends Controller
{
    protected $banner;
    protected $product;
    
    public function __construct(
        BannerInterface $banner,
        ProductInterface $product
    ){
        $this->banner = $banner;
        $this->product = $product;
    }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $data['banners'] = $this->banner->list();
        $data['sale'] = $this->product->saleSpecial($request->all());
        $data['rent'] = $this->product->rentSpecial($request->all());
        $data['maintenance'] = $this->product->maintenanceSpecial($request->all());
        return view('web.home.index', compact('data'));
    }
}