<?php

namespace App\Http\Controllers\Admin\Rent;
use App\Models\ProductRent;

use App\Models\RentRequest;
use Illuminate\Http\Request;
use App\Contracts\RentInterface;
use App\Models\RentRequestDetail;
use App\Contracts\TimeSlotInterface;
use App\Http\Controllers\Controller;

/**
 * Class RentRequestController
 * @package App\Http\Controllers
 */
class RentRequestController extends Controller
{
    protected $slot;
    protected $rentRequest;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct(TimeSlotInterface $slot, RentInterface $rentRequest)
    {
        $this->slot = $slot;
        $this->rentRequest = $rentRequest;
        $this->middleware('permission:rentRequests-list',  ['only' => ['index']]);
        $this->middleware('permission:rentRequests-view',  ['only' => ['show']]);
        $this->middleware('permission:rentRequests-create',['only' => ['create','store']]);
        $this->middleware('permission:rentRequests-edit',  ['only' => ['edit','update']]);
        $this->middleware('permission:rentRequests-delete',['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rentRequests = $this->rentRequest->orderList(null, true);

        return view('admin.rent.order.index', compact('rentRequests'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $rentRequest = $this->rentRequest->orderNew();
        return view('admin.rent.order.create', compact('rentRequest'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($this->rentRequest->orderStore($request->all(), 'Admin')){
            return redirect()->route('rent.index')
            ->with('success', 'RentRequest created successfully.');
        }
        return redirect()->route('rent.index')
            ->with('warning', 'Rent cart is empty of this customer.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $rentRequest = $this->rentRequest->orderFind($id);

        return view('admin.rent.order.show', compact('rentRequest'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $rentRequest = $this->rentRequest->orderFind($id);

        return view('admin.rent.order.edit', compact('rentRequest'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Order $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $this->rentRequest->orderUpdate($request->all(), $request->id, 'Admin');

        return redirect()->route('rent.index')->with('success', 'Rent Request updated successfully');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Order $order
     * @return \Illuminate\Http\Response
     */
    public function updateDetail(Request $request)
    {
        RentRequestDetail::find($request->id)->update([
            'product_rent_id' => $request->product_rent_id,
            'from'            => strtotime($request->from),
            'to'              => strtotime($request->to),
            'quantity'        => $request->quantity,
            'delivery_charges'=> $request->delivery_charges,
            'discount'        => $request->discounts
        ]);
        return redirect()->back()->with('success', 'Rent updated successfully');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  MaintenenceRequest $maintenenceRequest
     * @return \Illuminate\Http\Response
     */
    public function addPayment(Request $request)
    {
        $this->rentRequest->addPayment($request->all());

        return redirect()->back()->with('success', 'Rent Request payment added successfully');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Order $order
     * @return \Illuminate\Http\Response
     */
    public function dateExtend(Request $request)
    {
        $this->rentRequest->dateExtend($request->all());

        return redirect()->back()->with('success', 'Rent Request date updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        if ($this->rentRequest->orderFind($id)->status == 'Cancelled') {
            $this->rentRequest->orderDelete($id);
            return redirect()->route('rent.index')
            ->with('success', 'Rent Request deleted successfully');
        }
        return redirect()->route('rent.index')
            ->with('warning', 'You can delete only cancelled rent request.');
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

    /**
     * Display a listing of the resource.
     */
    public function getRents(Request $request)
    {
        $rents = ProductRent::whereProductId($request->product_id)->get();

        echo json_encode($rents);
    }
}
