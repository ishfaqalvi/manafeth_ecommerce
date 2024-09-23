<?php

namespace App\Http\Controllers\Web;

use Exception;
use App\Mail\OTPMail;
use App\Models\Token;
use App\Models\RentRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\{DB, Mail};
use App\Services\{AdminNotifyService,WhatsAppService,TwilioOTPService};
use App\Contracts\{ProductInterface, RentInterface, FcmInterface, CustomerInterface, TimeSlotInterface};

class ProductController extends Controller
{
    protected $product, $rent, $customer, $slot, $whatsAppService, $fcmNotification, $adminNotify, $twilio;

    public function __construct(
        ProductInterface $product,
        RentInterface $rent,
        CustomerInterface $customer,
        TimeSlotInterface $slot,
        WhatsAppService $whatsAppService,
        FcmInterface $fcmNotification,
        AdminNotifyService $adminNotify,
        TwilioOTPService $twilio
    )
    {
        $this->product         = $product;
        $this->rent            = $rent;
        $this->customer        = $customer;
        $this->slot            = $slot;
        $this->whatsAppService = $whatsAppService;
        $this->fcmNotification = $fcmNotification;
        $this->adminNotify     = $adminNotify;
        $this->twilio          = $twilio;
    }

    /**
     * Display a listing of the resource.
     */
    public function sale(Request $request)
    {
        $products = $this->product->saleProductList($request->all());
        return view('web.product.sale', compact('products'));
    }

    /**
     * Display a listing of the resource.
     */
    public function rent(Request $request)
    {
        $products = $this->product->rentProductList($request->all(), true);
        return view('web.product.sale', compact('products'));
    }

    /**
     * Display a listing of the resource.
     */
    public function maintenance(Request $request)
    {
        $products = $this->product->maintenanceProductList($request->all());
        return view('web.product.sale', compact('products'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $product = $this->product->show($id);
        return view('web.product.show', compact('product'));
    }

    /**
     * Display the specified resource.
     */
    public function link(string $token)
    {
        $link = $this->rent->linkSearch(['token' => $token]);
        if ($link) {
            return view('web.product.link', compact('link'));
        }
        return view('web.product.invalid_link');
    }

    /**
     * Send OTP.
     */
    public function sendOTP(Request $request)
    {
        try {
            return DB::transaction(function () use ($request) {
                $otp = rand(100000, 999999);

                if ($request->otpEmail == true && $request->email) {

                    Token::updateOrCreate(['email' => $request->email], [
                        'email'       => $request->email,
                        'otp'         => $otp,
                        'expiry_time' => now()->addMinutes(5),
                        'used'        => false
                    ]);

                    Mail::to($request->email)->send(new OTPMail($otp, 'Account Verification'));

                    return response()->json(['message' => 'OTP sent successfully via email.'], 200);

                } else {
                    try {
                        $phone = $request->phone;
                        $this->twilio->sendOtp($phone);

                        Token::updateOrCreate(['mobile_number' => $phone], [
                            'mobile_number' => $phone,
                            'otp'           => $otp,
                            'expiry_time'   => now()->addMinutes(5),
                            'used'          => false
                        ]);

                        return response()->json(['message' => 'OTP sent successfully via SMS.'], 200);

                    } catch (Exception $e) {
                        return response()->json(['message' => 'Failed to send OTP via SMS: ' . $e->getMessage()], 500);
                    }
                }
            });
        } catch (Exception $e) {
            return response()->json(['message' => 'An error occurred: ' . $e->getMessage()], 500);
        }
    }

    /**
     * Varify OTP.
     */
    public function varifyOTP(Request $request)
    {
        $isValid = false;
        if ($request->otpEmail) {
            $isValid = !Token::isValidOtp($request->email, null, $request->otp);
        } else {
            $isValid = !Token::isValidOtp(null, $request->phone, $request->otp);
        }
        if ($isValid){ echo "false"; } else { echo "true"; }

    }

    /**
     * Store specified resource.
     */
    public function checkout(Request $request)
    {
        $isValid = false;
        if ($request->otpEmail == true  && $request->email) {
            $isValid = Token::isValidOtp($request->email, null, $request->otp);
        } else {
            $phone = $request->mobile_number;
            $otp = $request->otp;
            $response = $this->twilio->verifyOtp($phone, $otp);
            if($response['status'] == 'success'){
                $isValid = true;
            }
        }
        if ($isValid){ 
            $input = $request->all();
            DB::transaction(function () use($input) {
                /**
                 * Create New Customer.
                 */
                $customerData['type']           = 'Guest';
                $customerData['name']           = $input['name'];
                $customerData['email']          = $input['email'];
                $customerData['mobile_number']  = $input['mobile_number'];
                $customerData['otpEmail']       = $input['otpEmail'];
                $customerRespnce = $this->customer->register($customerData);

                /**
                 * Create New Order.
                 */
                $link = $this->rent->linkSearch(['token' => $input['link_token']]);
                $orderData['customer_id']       = $customerRespnce['customer']->id;
                $orderData['payment_method']    = 'Cash On Delivery';
                $orderData['collection_type']   = $link->collection_type;
                $orderData['collection_date']   = $link->collection_date;
                $orderData['time_slot_id']      = $link->time_slot_id;
                $orderData['name']              = 'Guest Customer';
                $orderData['email']             = 'No email';
                $orderData['phone_number']      = $input['mobile_number'];
                $orderData['address']           = $link->address;
                $orderData['lat']               = $link->lat;
                $orderData['long']              = $link->long;
                $orderData['status']            = 'Pending';
                $rentOrder = RentRequest::create($orderData);
                /**
                 * Create Order Detail.
                 */
                $rentOrder->details()->create([
                    'product_id'        => $link->product_id,
                    'product_rent_id'   => $link->product_rent_id,
                    'quantity'          => $link->quantity,
                    'from'              => $link->from,
                    'to'                => $link->to,
                    'discount'          => $link->price_change_type == 'decrement' ? $link->price_change_value : null,
                    'increment'         => $link->price_change_type == 'increment' ? $link->price_change_value : null
                ]);
                /**
                 * Create Order Operations.
                 */
                $rentOrder->operations()->create([
                    'actor_id'   => $customerRespnce['customer']->id,
                    'actor_type' => 'App\Models\Customer',
                    'action'     => 'Rental Request Placed'
                ]);
                /**
                 * Send Order Notifications.
                 */
                $products = $link->product->name.' ('. $link->quantity.' Qty) (From: '. date('d M Y', $link->from).') (To: '.date('d M Y', $link->to).')';
                if(settings('rent_order_whatsapp_notification') == 'Yes'){
                    $data = [$input['name'], $input['mobile_number'], $products];
                    $this->whatsAppService->sendMessage('renta_order_placed', $data);
                }
                if(settings('rent_order_fcm_notification_to_customer') == 'Yes'){
                    $data = [
                        'title'     => 'Rent Request',
                        'body'      => 'Your rental request has been submitted successfully.',
                        'user_type' => 'App\Models\Customer',
                        'user_id'   => $customerRespnce['customer']->id
                    ];
                    $this->fcmNotification->store($data);
                }
                if(settings('rent_order_fcm_notification_to_admin') == 'Yes'){
                    $data = [
                        'title'  => 'New Rent Request',
                        'body'   => 'New rent request received from '. $customerRespnce['customer']->name,
                        'type'   => 'Rent Request',
                        'id'     => $rentOrder->id,
                        'name'   => $customerRespnce['customer']->name,
                        'image'  => $customerRespnce['customer']->image,
                        'message'=> 'New rent request submit click on link to see detail',
                    ];
                    $this->adminNotify->sendNotification($data);
                }
            });
            $response = ['status' => true, 'message' => 'Your order has been placed successfully.'];
        } else { 
            $response = ['status' => false, 'message' => 'Invalid OTP. Pleas try again.'];
        }
        return response()->json($response);
    }

    /**
     * Display the specified resource.
     */
    public function order()
    {
        return view('web.product.success');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function timeSlots(Request $request)
    {
        $slots = $this->slot->available($request->type, $request->date);

        echo json_encode($slots);
    }
}
