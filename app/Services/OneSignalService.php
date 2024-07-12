<?php

namespace App\Services;

use OneSignal\Config;
use OneSignal\OneSignal;
use OneSignal\Notifications;
use Illuminate\Support\Facades\Log;

class OneSignalService
{
    protected $client;

    public function __construct()
    {
        $config = new Config(
            config('onesignal.app_id'),
            config('onesignal.rest_api_key'),
            config('onesignal.user_auth_key')
        );

        $this->client = new OneSignal($config);
    }

    public function sendNotificationToUser($playerId, $message)
    {
        $notification = new Notifications();
        $notification->setIncludePlayerIds([$playerId]);
        $notification->setContents([
            'en' => $message,
        ]);
        try {
            $response = $this->client->notifications->add($notification);
            Log::info('Notification sent to admin user successfully!', ['response' => $response]);
            return $response;
        } catch (\Throwable $e) {
            Log::error('Error sending notification to admin user', ['error' => $e->getMessage()]);
            return null;
        }
    }

    public function sendNotificationToAll($message)
    {
        $notification = new Notifications();
        $notification->setIncludedSegments(['All']);
        $notification->setContents([
            'en' => $message,
        ]);

        try {
            $response = $this->client->notifications->add($notification);
            Log::info('Notification sent to all admin users successfully!', ['response' => $response]);
            return $response;
        } catch (\Throwable $e) {
            Log::error('Error sending notification to all admin users', ['error' => $e->getMessage()]);
            return null;
        }
    }
}
