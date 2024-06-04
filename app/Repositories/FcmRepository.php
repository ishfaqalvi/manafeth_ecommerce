<?php

namespace App\Repositories;
use App\Services\FCMService;
use App\Contracts\FcmInterface;
use App\Models\FcmNotification;
use Illuminate\Support\Facades\Auth;

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
            $user = Auth::guard($guard)->user();

            if ($guard == 'employee') {
                $query->where('user_type', 'App\Models\Employee')->where('user_id', $user->id);
            } else {
                $query->where(function ($query) use ($user) {
                    $query->where('user_type', 'App\Models\Customer')
                        ->where('user_id', $user->id)
                        ->orWhere(function ($query) use ($user) {
                            $query->where('user_type', 'App\Models\User')->where('created_at', '>=', $user->created_at);
                        });
                });
            }
        }
        $query->orderBy('created_at', 'desc');
        return $pagination ? $query->paginate() : $query->get();
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
            $this->fcm->sendMessageToTopic($record->topic, $record->title, $record->body, $record->image);
        }
        if(isset($record->user->fcm_token) && ($record->user_type == 'App\Models\Customer' || $record->user_type == 'App\Models\Employee'))
        {
            $this->fcm->sendNotification($record->title, $record->body, $record->user->fcm_token);
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
