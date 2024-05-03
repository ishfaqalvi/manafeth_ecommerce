<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;

use App\Contracts\TimeSlotInterface;
use App\Http\Controllers\Controller;

/**
 * Class TimeSlotController
 * @package App\Http\Controllers
 */
class TimeSlotController extends Controller
{
    protected $timeSlot;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct(TimeSlotInterface $timeSlot)
    {
        $this->timeSlot = $timeSlot;
        $this->middleware('permission:timeSlots-list',  ['only' => ['index']]);
        $this->middleware('permission:timeSlots-view',  ['only' => ['show']]);
        $this->middleware('permission:timeSlots-create',['only' => ['create','store']]);
        $this->middleware('permission:timeSlots-edit',  ['only' => ['edit','update']]);
        $this->middleware('permission:timeSlots-delete',['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $timeSlots = $this->timeSlot->list('pagination');

        return view('admin.time-slot.index', compact('timeSlots'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $timeSlot = $this->timeSlot->new();
        return view('admin.time-slot.create', compact('timeSlot'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $timeSlot = $this->timeSlot->store($request->all());
        return redirect()->route('time-slots.index')
            ->with('success', 'TimeSlot created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $timeSlot = $this->timeSlot->find($id);

        return view('admin.time-slot.show', compact('timeSlot'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $timeSlot = $this->timeSlot->find($id);

        return view('admin.time-slot.edit', compact('timeSlot'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  TimeSlot $timeSlot
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->timeSlot->update($request->all(), $id);

        return redirect()->route('time-slots.index')
            ->with('success', 'TimeSlot updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $timeSlot = $this->timeSlot->delete($id);

        return redirect()->route('time-slots.index')
            ->with('success', 'TimeSlot deleted successfully');
    }
}
