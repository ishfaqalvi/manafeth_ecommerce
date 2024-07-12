<?php

namespace App\Services;

use OneSignal\Client as OneSignalClient;
use Illuminate\Support\Facades\Log;

class OneSignalService
{
    protected $client;

    public function __construct()
    {
        $this->client = new OneSignalClient(
            config('onesignal.app_id'),
            config('onesignal.rest_api_key'),
            config('onesignal.user_auth_key')
        );
    }

    public function sendNotificationToUser($playerId, $message)
    {
        $notification = [
            'include_player_ids' => [$playerId],
            'contents' => [
                'en' => $message,
            ],
        ];
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
        $notification = [
            'included_segments' => ['All'],
            'contents' => [
                'en' => $message,
            ],
        ];

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
