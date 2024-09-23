<?php

namespace App\Http\Controllers\Web;

use Twilio\Rest\Client;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Services\WhatsAppService;
use App\Http\Controllers\Controller;
use App\Contracts\{BlogInterface,BannerInterface,ProductInterface};
use App\Services\{TwilioOTPService};

class HomeController extends Controller
{
    protected $banner;
    protected $product;
    protected $blog;
    protected $whatsAppService;
    protected $twilio;

    public function __construct(
        BannerInterface $banner,
        ProductInterface $product,
        BlogInterface $blog,
        WhatsAppService $whatsAppService,
        TwilioOTPService $twilio
    ){
        $this->banner = $banner;
        $this->product = $product;
        $this->blog = $blog;
        $this->whatsAppService = $whatsAppService;
        $this->twilio          = $twilio;
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

    public function sendOTP(Request $request)
    {
        // Retrieve phone number from the request
        // $phone = "+971566441716";
        $phone = "+923075528385";
        // $otp = rand(100000, 999999);
        try {
            $response = $this->twilio->sendOtp($phone);

            return response()->json($response);

        } catch (\Exception $e) {
            return response()->json(['message' => 'Failed to send OTP via SMS: ' . $e->getMessage()], 500);
        }
    }

    public function verifyOtp($otp)
    {
        // $phone = "+971566441716";
        $phone = "+923075528385";
        try {

            $response = $this->twilio->verifyOtp($phone, $otp);
    
            return response()->json($response);

        } catch (\Exception $e) {
            return response()->json(['message' => 'Failed to send OTP via SMS: ' . $e->getMessage()], 500);
        }
    }
}
