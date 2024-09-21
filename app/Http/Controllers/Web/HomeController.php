<?php

namespace App\Http\Controllers\Web;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Services\WhatsAppService;
use App\Http\Controllers\Controller;
use App\Contracts\{BlogInterface,BannerInterface,ProductInterface};

class HomeController extends Controller
{
    protected $banner;
    protected $product;
    protected $blog;
    protected $whatsAppService;

    public function __construct(
        BannerInterface $banner,
        ProductInterface $product,
        BlogInterface $blog,
        WhatsAppService $whatsAppService,
    ){
        $this->banner = $banner;
        $this->product = $product;
        $this->blog = $blog;
        $this->whatsAppService = $whatsAppService;
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
