<?php

namespace App\Console\Commands;
use Illuminate\Console\Command;
use App\Models\RentRequest;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;
use App\Services\WhatsAppService;

class SendRentalOrderDeliveryNotifications extends Command
{
    protected $whatsAppService;

    public function __construct(WhatsAppService $whatsAppService)
    {
        parent::__construct();
        $this->whatsAppService = $whatsAppService;
    }
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'rental:notify-delivery';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send WhatsApp notifications for upcoming rental order deliveries';

    /**
     * Execute the console command.
     */
    public function handle()
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

            // Send the message via WhatsApp (WhatsApp integration assumed to be set up)
            $this->sendWhatsAppNotification($message, $order);

            // Log the notification for debugging
            Log::info("WhatsApp notification sent for Rental Order ID: {$order->id}");
        }
        Log::info("{$today} Rental order delivery notifications sent successfully");
        $this->info('Rental order delivery notifications sent successfully.');
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
