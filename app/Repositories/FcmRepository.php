<?php

namespace App\Repositories;
use App\Services\FCMService;
use App\Contracts\FcmInterface;
use App\Models\FcmNotification;

class FcmRepository implements FcmInterface
{
    protected $fcm;

    public function __construct(FCMService $fcm){
        $this->fcm = $fcm;
    }

    public function list($guard = null, $pagination = false)
	{
        $query = FcmNotification::query();
        if (!is_null($guard)) {
            $customer = Auth::guard($guard)->user();
            $query->where('customer_id', $customer->id)->orWhere(function ($query) use ($customer) {
                $query->whereNull('customer_id')->where('created_at', '>=', $customer->created_at);
            });
        }
        return $pagination ? $query->orderBy('created_at', 'desc')->paginate() : $query->orderBy('created_at', 'desc')->get();
	}

	public function new()
	{
		return new FcmNotification();
	}

	public function store($data)
	{
		$record = FcmNotification::create($data);
        if(!is_null($record->topic))
        {
            $this->fcm->sendMessageToTopic($record->topic, $$record->title, $record->body, $record->image);
        }
        if(!is_null($record->customer_id))
        {
            $this->fcm->sendNotification($$record->title, $record->body, $record->customer->fcm_token);
        }
	}

	public function find($id)
	{
		return FcmNotification::find($id);
	}

	public function update($data, $id)
	{
		return FcmNotification::find($id)->update($data);
	}

	public function delete($id)
	{
		return FcmNotification::find($id)->delete();
	}
}
