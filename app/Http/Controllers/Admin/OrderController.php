<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Contracts\SaleInterface;
use App\Contracts\TimeSlotInterface;
use App\Http\Controllers\Controller;

/**
 * Class OrderController
 * @package App\Http\Controllers
 */
class OrderController extends Controller
{
    protected $order;
    protected $slot;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct(SaleInterface $order, TimeSlotInterface $slot)
    {
        $this->order = $order;
        $this->slot = $slot;
        $this->middleware('permission:orders-list',  ['only' => ['index']]);
        $this->middleware('permission:orders-view',  ['only' => ['show']]);
        $this->middleware('permission:orders-create',['only' => ['create','store']]);
        $this->middleware('permission:orders-edit',  ['only' => ['edit','update']]);
        $this->middleware('permission:orders-delete',['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = $this->order->orderList(null, null, true);

        return view('admin.order.index', compact('orders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $order = $this->order->orderNew();
        return view('admin.order.create', compact('order'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $responce = $this->order->orderStore($request->all(), 'Admin');
        if($responce){
            return redirect()->route('orders.index')->with('success', 'Order created successfully.');
        }else{
            return redirect()->route('orders.index')->with('warning', 'No item found in cart of this customer.');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $order = $this->order->orderFind($id);

        return view('admin.order.show', compact('order'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $order = $this->order->orderFind($id);

        return view('admin.order.edit', compact('order'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Order $order
     * @return \Illuminate\Http\Response
     */
    public function confirm(Request $request)
    {
        $this->order->orderConfirm($request->all(), $request->id);

        return redirect()->route('orders.index')
            ->with('success', 'Order confirmed successfully');
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
        $this->order->orderUpdate($request->all(), $request->id, 'Admin');

        return redirect()->route('orders.index')
            ->with('success', 'Order updated successfully');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Order $order
     * @return \Illuminate\Http\Response
     */
    public function services(Request $request)
    {
        $this->order->updateServices($request->id);

        return redirect()->back()->with('success', 'Product Service updated successfully');
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
        $this->order->addPayment($request->all());

        return redirect()->back()->with('success', 'Order payment added successfully');
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
            return redirect()->route('orders.index')
            ->with('success', 'Order deleted successfully');
        }
        return redirect()->route('orders.index')
            ->with('warning', 'You can delete only cancelled order.');
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
