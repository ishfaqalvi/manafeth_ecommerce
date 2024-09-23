<?php

namespace App\Http\Controllers\Web;

use Twilio\Rest\Client;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Services\WhatsAppService;
use App\Http\Controllers\Controller;
use App\Contracts\{BlogInterface,BannerInterface,ProductInterface};
use App\Services\{TwilioService};

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
        TwilioService $twilio
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

    public function lookupPhoneNumber(Request $request)
    {
        // Retrieve phone number from the request
        $phone = "971566441716";
        // $phone = "+923027679079";
        $otp = rand(100000, 999999);
        try {
            $this->twilio->sendSms($phone, $otp);

            return response()->json(['message' => 'OTP sent successfully via SMS.'], 200);

        } catch (\Exception $e) {
            return response()->json(['message' => 'Failed to send OTP via SMS: ' . $e->getMessage()], 500);
        }

        // Initialize the Twilio client
        $sid = env('TWILIO_SID');
        $token = env('TWILIO_AUTH_TOKEN');
        $twilio = new Client($sid, $token);

        try {
            // Perform the lookup
            $lookup = $twilio->lookups->v1->phoneNumbers($phoneNumber)->fetch([
                "type" => "carrier"  // Fetch carrier information, optional
            ]);

            // Return the lookup data as JSON
            return response()->json([
                'status' => 'success',
                'phone_number' => $lookup->phoneNumber,
                'country_code' => $lookup->countryCode,
                'carrier' => $lookup->carrier['name'] ?? 'N/A',
                'phone_type' => $lookup->carrier['type'] ?? 'N/A'
            ]);
        } catch (\Exception $e) {
            // Return error if something goes wrong
            return response()->json([
                'status' => 'error',
                'message' => $e->getMessage(),
            ], 400);
        }
    }
}
