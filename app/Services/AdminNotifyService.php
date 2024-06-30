<?php

namespace App\Services;

use App\Models\User;
use App\Services\FCMService;
use Illuminate\Support\Facades\Log;
use App\Notifications\OrderNotification;
use Illuminate\Support\Facades\Notification;

class AdminNotifyService
{
    protected $fcm;

    public function __construct(FCMService $fcm){
        $this->fcm = $fcm;
    }

    public function sendNotification($data)
    {
        $tokens = [];
        try {
            foreach(User::whereNotNull('fcm_token')->get() as $user)
            {
                Notification::send($user, new OrderNotification($data));
                $tokens[] = $user->fcm_token;
                // $this->fcm->sendNotification($data['title'], $data['body'], $user->fcm_token);
            }
            if(count($tokens) > 0 ){
                $this->fcm->browserNotification($data['title'], $data['body'], $tokens);
            }
            Log::info('Admin FCM response: Admin user notification sent successfully!');

        } catch (\Throwable $e) {
            Log::error('Error with Admin FCM service', ['error' => $e->getMessage()]);
        }
    }
}
