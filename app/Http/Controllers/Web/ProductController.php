<?php

namespace App\Http\Controllers\Web;

use App\Models\TimeSlot;
use App\Models\RentRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Contracts\{ProductInterface, RentInterface, CustomerInterface, TimeSlotInterface};

class ProductController extends Controller
{
    protected $product, $rent, $customer, $slot;

    public function __construct(ProductInterface $product, RentInterface $rent, CustomerInterface $customer, TimeSlotInterface $slot)
    {
        $this->product = $product;
        $this->rent = $rent;
        $this->customer = $customer;
        $this->slot = $slot;
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
     * Store specified resource.
     */
    public function checkout(Request $request)
    {
        $input = $request->all();
        DB::transaction(function () use($input) {
            /**
             * Create New Customer.
             */
            $customerData['type']           = 'Guest';
            $customerData['name']           = $input['name'];
            $customerData['mobile_number']  = $input['mobile_number'];
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
            $orderData['discount']          = $link->discount;
            $orderData['status']            = 'Pending';
            $rentOrder = RentRequest::create($orderData);
            /**
             * Create Order Detail.
             */
            $rentOrder->details()->create([
                'product_id'        => $input['product_id'],
                'product_rent_id'   => $input['product_rent_id'],
                'quantity'          => $input['quantity'],
                'from'              => strtotime($input['from']),
                'to'                => strtotime($input['to']),
            ]);
        });
        return response()->json(['message' => 'Your order has been placed successfully.']);
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
