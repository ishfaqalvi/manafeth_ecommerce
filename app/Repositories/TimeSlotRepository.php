<?php

namespace App\Repositories;
use Carbon\Carbon;
use Illuminate\Support\Arr;
use App\Contracts\TimeSlotInterface;
use App\Models\{Order,TimeSlot,RentRequest};

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
            $orderSlotIds = Order::whereCollectionType($type)->whereCollectionDate($check_date)->pluck('time_slot_id')->all();
            $rentSlotIds = RentRequest::whereCollectionType($type)->whereCollectionDate($check_date)->pluck('time_slot_id')->all();
            $bookedSlots = array_unique(array_merge($orderSlotIds, $rentSlotIds));
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
