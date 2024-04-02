<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Contracts\{BlogInterface,BannerInterface,ProductInterface};
use App\Models\Category;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    protected $banner;
    protected $product;
    protected $blog;

    public function __construct(
        BannerInterface $banner,
        ProductInterface $product,
        BlogInterface $blog
    ){
        $this->banner = $banner;
        $this->product = $product;
        $this->blog = $blog;
    }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $products['sale']        = $this->product->saleSpecial($request->all());
        $products['rent']        = $this->product->rentSpecial($request->all());
        $products['maintenance'] = $this->product->maintenanceSpecial($request->all());

        $data = [
            'banners'    => $this->banner->list(),
            'products'   => $products,
            'blogs'      => $this->blog->specialList(),
            'categories' => Category::all()
        ];
        return view('web.home.index', compact('data'));
    }
}
