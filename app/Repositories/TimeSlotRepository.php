<?php

namespace App\Repositories;
use Carbon\Carbon;
use App\Models\Order;
use App\Models\TimeSlot;
use App\Contracts\TimeSlotInterface;

class TimeSlotRepository implements TimeSlotInterface
{
    public function list($pagination = false)
    {
        $query = TimeSlot::query();
        return $pagination ? $query->paginate() : $query->get();
    }

    public function available($type, $date)
    {
        $query = TimeSlot::query();
        $bookedSlots = [];
        if($type == 'Home Delivery'){
            $check_date = strtotime($date);
            $bookedSlots = Order::whereCollectionType($type)->whereCollectionDate($check_date)->pluck('time_slot_id')->all();
        }
        return $query->whereType($type)->get()->map(function ($slot) use ($bookedSlots) {
            $slot->status = in_array($slot->id, $bookedSlots) ? 'Not Available' : 'Available';
            $slot->start_time = Carbon::parse($slot->start_time)->format('g:i A');
            $slot->end_time = Carbon::parse($slot->end_time)->format('g:i A');
            return $slot;
        })->toArray();
    }

	public function new()
    {
        return new TimeSlot();
    }

	public function store($data)
    {
        return TimeSlot::create($data);
    }

	public function find($id)
    {
        return TimeSlot::find($id);
    }

	public function update($data, $id)
    {
        return TimeSlot::find($id)->update($data);
    }

	public function delete($id)
    {
        return TimeSlot::find($id)->delete();
    }
}
