<?php

namespace App\Http\Controllers\Admin;
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

        return view('admin.rent-request.index', compact('rentRequests'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $rentRequest = $this->rentRequest->orderNew();
        return view('admin.rent-request.create', compact('rentRequest'));
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

        return view('admin.rent-request.show', compact('rentRequest'));
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

        return view('admin.rent-request.edit', compact('rentRequest'));
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
        if($request->status == 'Add Payment'){
            $this->rentRequest->updatePayment($request->all(), $request->id);
        }else{
            if($request->status == 'Confirmed'){
                foreach($request->ids as $key => $id){
                    RentRequestDetail::find($id)->update([
                        'product_rent_id' => $request->product_rent_id[$key],
                        'from'            => strtotime($request->from[$key]),
                        'to'              => strtotime($request->to[$key]),
                        'delivery_charges'=> $request->delivery_charges[$key],
                        'discount'        => $request->discounts[$key]
                    ]);
                }
            }
            $this->rentRequest->orderUpdate($request->all(), $request->id, 'Admin');
        }

        return redirect()->route('rent.index')
            ->with('success', 'Rent Request updated successfully');
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
        $this->rentRequest->dateExtend($request->to, $request->id);

        return redirect()->back()->with('success', 'Rent Request date updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        if ($this->order->orderFind($id)->status == 'Cancelled') {
            $this->order->orderDelete($id);
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
}
