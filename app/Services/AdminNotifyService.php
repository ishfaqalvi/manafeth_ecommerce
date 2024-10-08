<?php

namespace App\Services;

use App\Models\User;
use App\Services\OneSignalService;
use Illuminate\Support\Facades\Log;
use App\Notifications\OrderNotification;
use Illuminate\Support\Facades\Notification;

class AdminNotifyService
{
    protected $oneSingle;

    public function __construct(OneSignalService $oneSingle){
        $this->oneSingle = $oneSingle;
    }

    public function sendNotification($data)
    {
        $ids = [];
        try {
            foreach(User::whereNotNull('player_id')->get() as $user)
            {
                Notification::send($user, new OrderNotification($data));
                $ids[] = $user->player_id;
            }
            if(count($ids) > 0){
                $this->oneSingle->sendNotificationToUser($ids, $data['body']);
            }
            Log::info('Admin Notification response: Admin user notification sent successfully!');
        } catch (\Throwable $e) {
            Log::error('Error with Admin OneSignal service', ['error' => $e->getMessage()]);
        }
    }
}
