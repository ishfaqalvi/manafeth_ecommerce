<?php

namespace App\Services;

use OneSignal;
use Illuminate\Support\Facades\Log;

class OneSignalService
{
    public function sendNotificationToUser($playerIds, $message)
    {
        try {
            OneSignal::sendNotificationToUser($message, $playerIds, $url = null, $data = null, $buttons = null, $schedule = null, $headings = null, $subtitle = null);
            Log::info('Notification sent to admin user successfully!');
        } catch (\Throwable $e) {
            Log::error('Error sending notification to admin user', ['error' => $e->getMessage()]);
            return null;
        }
    }

    public function sendNotificationToAll($message)
    {
        try {
            OneSignal::sendNotificationToAll($message, $url = null, $data = null, $buttons = null, $schedule = null);
            Log::info('Notification sent to all admin users successfully!');
        } catch (\Throwable $e) {
            Log::error('Error sending notification to all admin users', ['error' => $e->getMessage()]);
            return null;
        }
    }
}
