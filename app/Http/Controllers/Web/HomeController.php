<?php

namespace App\Http\Controllers\Web;

use GuzzleHttp\Client;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use GuzzleHttp\Exception\RequestException;
use App\Contracts\{BlogInterface,BannerInterface,ProductInterface};
use App\Services\WhatsAppService;
use OneSignal;
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
        WhatsAppService $whatsAppService
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
    public function sendWatsap()
    {
        return $this->whatsAppService->sendMessage('sale_product_added_to_cart', "*Heading*\nThis is a description under the heading. Here is some _italic_ text, and here is some ~strikethrough~ text. You can also use ```monospace``` for things like code.");
    }

    public function notification()
    {
        OneSignal::sendNotificationToAll(
            "Some Message",
            $url = null,
            $data = null,
            $buttons = null,
            $schedule = null
        );
        // OneSignal::sendNotificationToSegment(
        //     "Test message with custom heading and subtitle",
        //     "Testers",
        //     null, null, null, null,
        //     "Custom Heading",
        //     "Custom subtitle"
        // );
        return "Yes ho gya";
    }
}
