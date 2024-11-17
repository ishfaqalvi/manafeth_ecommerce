<?php

namespace App\Services;

use App\Models\RentRequest;
use App\Models\RentRequestDetail;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;
use App\Services\{WhatsAppService, FCMService, AdminNotifyService};

class RentalNotificationService
{
    protected $whatsAppService;
    protected $fcmNotification;
    protected $adminNotify;

    public function __construct(WhatsAppService $whatsAppService, FCMService $fcmNotification, AdminNotifyService $adminNotify)
    {
        $this->whatsAppService = $whatsAppService;
        $this->fcmNotification = $fcmNotification;
        $this->adminNotify = $adminNotify;
    }

    public function sendExpirationNotifications()
    {
        $tomorrow = Carbon::tomorrow()->startOfDay()->timestamp;
        $today = Carbon::today()->startOfDay()->timestamp;

        $rentalRequestDetails = RentRequestDetail::whereIn('to', [$today, $tomorrow])->get();

        foreach ($rentalRequestDetails as $detail) {
            $customer = $detail->rentRequest->customer;

            if ($detail->to == $tomorrow) {
                $this->handleExpirationNotifications($detail, $customer, 'tomorrow');
            }

            if ($detail->to == $today) {
                $this->handleExpirationNotifications($detail, $customer, 'today');
            }
        }

        Log::info('Rental expiration notifications sent successfully.');
    }

    protected function handleExpirationNotifications($detail, $customer, $time)
    {
        $template = ($time == 'tomorrow') ? 'one_day_before' : 'on_collection_day';

        if (settings("rent_expire_date_admin_alert") == 'Yes') {
            $data = [
                $customer->name,
                $customer->mobile_number,
                $detail->rentRequest->id,
                $detail->product->name,
                date('d M Y', $detail->from),
                date('d M Y', $detail->to)
            ];
            $this->whatsAppService->sendMessage("to_admin_on_rental_expiring_$template", $data);
        }

        if (settings("rent_expire_date_watsapp_customer_alert") == 'Yes') {
            $data = [
                $detail->rentRequest->id,
                $detail->product->name,
                date('d M Y', $detail->from),
                date('d M Y', $detail->to)
            ];
            $this->whatsAppService->sendMessage("to_customer_on_rental_expiring_$template", $data, $detail->rentRequest->phone_number);
        }
    }

    public function sendDeliveryNotifications()
    {
        $today = Carbon::today();
        $rentalOrders = RentRequest::whereBetween('collection_date', [
            $today->timestamp,
            $today->copy()->addDays(3)->timestamp
        ])->get();

        foreach ($rentalOrders as $order) {
            $collectionDate = Carbon::createFromTimestamp($order->collection_date);

            $daysLeft = $today->diffInDays($collectionDate, false);
            $message = null;

            if ($daysLeft == 3) {
                $message = "Reminder: Rental Order #{$order->id} is scheduled for delivery in 3 days.";
            } elseif ($daysLeft == 2) {
                $message = "Reminder: Rental Order #{$order->id} is scheduled for delivery in 2 days.";
            } elseif ($daysLeft == 1) {
                $message = "Reminder: Rental Order #{$order->id} is scheduled for delivery tomorrow.";
            } elseif ($daysLeft == 0) {
                $message = "Reminder: Rental Order #{$order->id} is scheduled for delivery today.";
            }

            $this->sendWhatsAppNotification($message, $order);
        }

        Log::info('Rental delivery notifications sent successfully.');
    }

    protected function sendWhatsAppNotification($message, $order)
    {
        $data = [
            "Rental Request",
            $message,
            $order->id,
            $order->name,
            date('d M Y', $order->collection_date),
            $order->collection_type,
            $order->product->name
        ];
        $this->whatsAppService->sendMessage('to_admin_delivery_due_reminder', $data);
    }
}
