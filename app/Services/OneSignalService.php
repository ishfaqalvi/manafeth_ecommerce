<?php

namespace App\Services;

use Minishlink\WebPush\WebPush;
use Minishlink\WebPush\Subscription;
use Illuminate\Support\Facades\Log;

class OneSignalService
{
    protected $webPush;

    // public function __construct()
    // {
    //     $this->webPush = new WebPush([
    //         'VAPID' => [
    //             'subject' => 'mailto:ishfaq.alvi.33@gmail.com',
    //             'publicKey' => config('onesignal.vapid_public_key'),
    //             'privateKey' => config('onesignal.vapid_private_key'),
    //         ],
    //     ]);
    // }

    // public function sendNotificationToUser($subscription, $message)
    // {
    //     $subscription = Subscription::create(json_decode($subscription, true));

    //     $notification = [
    //         'title' => 'New Notification',
    //         'body' => $message,
    //     ];

    //     try {
    //         $this->webPush->sendNotification($subscription, json_encode($notification));
    //         foreach ($this->webPush->flush() as $report) {
    //             if ($report->isSuccess()) {
    //                 Log::info('Notification sent successfully!', ['report' => $report]);
    //             } else {
    //                 Log::error('Notification failed to send', ['report' => $report]);
    //             }
    //         }
    //     } catch (\Throwable $e) {
    //         Log::error('Error sending notification', ['error' => $e->getMessage()]);
    //     }
    // }

    // public function sendNotificationToAll($subscriptions, $message)
    // {
    //     $notification = [
    //         'title' => 'New Notification',
    //         'body' => $message,
    //     ];

    //     try {
    //         foreach ($subscriptions as $subscription) {
    //             $subscription = Subscription::create(json_decode($subscription, true));
    //             $this->webPush->sendNotification($subscription, json_encode($notification));
    //         }
    //         foreach ($this->webPush->flush() as $report) {
    //             if ($report->isSuccess()) {
    //                 Log::info('Notification sent successfully!', ['report' => $report]);
    //             } else {
    //                 Log::error('Notification failed to send', ['report' => $report]);
    //             }
    //         }
    //     } catch (\Throwable $e) {
    //         Log::error('Error sending notification', ['error' => $e->getMessage()]);
    //     }
    // }
    // protected $client;

    // public function __construct()
    // {
    //     $this->client = new OneSignalClient(
    //         config('onesignal.app_id'),
    //         config('onesignal.rest_api_key'),
    //         config('onesignal.user_auth_key')
    //     );
    // }

    // public function sendNotificationToUser($playerId, $message)
    // {
    //     $notification = [
    //         'include_player_ids' => [$playerId],
    //         'contents' => [
    //             'en' => $message,
    //         ],
    //     ];
    //     try {
    //         $response = $this->client->notifications->add($notification);
    //         Log::info('Notification sent to admin user successfully!', ['response' => $response]);
    //         return $response;
    //     } catch (\Throwable $e) {
    //         Log::error('Error sending notification to admin user', ['error' => $e->getMessage()]);
    //         return null;
    //     }
    // }

    // public function sendNotificationToAll($message)
    // {
    //     $notification = [
    //         'included_segments' => ['All'],
    //         'contents' => [
    //             'en' => $message,
    //         ],
    //     ];

    //     try {
    //         $response = $this->client->notifications->add($notification);
    //         Log::info('Notification sent to all admin users successfully!', ['response' => $response]);
    //         return $response;
    //     } catch (\Throwable $e) {
    //         Log::error('Error sending notification to all admin users', ['error' => $e->getMessage()]);
    //         return null;
    //     }
    // }
}
