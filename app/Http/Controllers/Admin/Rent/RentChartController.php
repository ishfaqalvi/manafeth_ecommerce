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
class RentChartController extends Controller
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
        $this->middleware('permission:rentChart-list',  ['only' => ['index']]);
        $this->middleware('permission:rentChart-view',  ['only' => ['show']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rentRequests = $this->rentRequest->orderList(null, true);

        return view('admin.rent.chart.index', compact('rentRequests'));
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
}
