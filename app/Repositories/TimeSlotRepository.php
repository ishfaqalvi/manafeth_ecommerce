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
        if($type == 'Home Delivery'){
            $check_date = strtotime($date);
            $ids = Order::whereCollectionType($type)->whereCollectionDate($check_date)->pluck('time_slot_id');
            $query->whereNotIn('id',$ids);
        }
        return $query->whereType($type)->get()->mapWithKeys(function ($slot) {
            $sTime = Carbon::parse($slot->start_time)->format('g:i A');
            $eTime = Carbon::parse($slot->end_time)->format('g:i A');
            return [$slot->id => "{$sTime} - {$eTime}"];
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