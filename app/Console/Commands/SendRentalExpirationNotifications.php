<?php

namespace App\Console\Commands;

use Carbon\Carbon;
use App\Contracts\FcmInterface;
use Illuminate\Console\Command;
use App\Models\RentRequestDetail;
use App\Services\WhatsAppService;
use Illuminate\Support\Facades\Log;

class SendRentalExpirationNotifications extends Command
{
    protected $whatsAppService;
    protected $fcmNotification;

    public function __construct(WhatsAppService $whatsAppService, FcmInterface $fcmNotification)
    {
        parent::__construct();
        $this->whatsAppService = $whatsAppService;
        $this->fcmNotification = $fcmNotification;
    }
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'rental:send-expiration-notifications';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send notifications for rental requests that are expiring soon';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $tomorrow = Carbon::tomorrow()->startOfDay()->timestamp;
        $today = Carbon::today()->startOfDay()->timestamp;

        $rentalRequestDetails = RentRequestDetail::whereIn('to', [$today, $tomorrow])->get();

        foreach ($rentalRequestDetails as $detail) {
            $customer = $detail->rentRequest->customer;
            if ($detail->to == $tomorrow)
            {
                if(settings('rent_expire_date_admin_alert') == 'Yes'){
                    $data = [
                        $customer->name,
                        $customer->mobile_number,
                        $detail->rentRequest->id,
                        $detail->product->name,
                        date('d M Y', $detail->from),
                        date('d M Y', $detail->to)
                    ];
                    $this->whatsAppService->sendMessage('to_admin_on_rental_expiring_one_day_before', $data);
                }
                if(settings('rent_expire_date_watsapp_customer_alert') == 'Yes'){
                    $data = [
                        $detail->rentRequest->id,
                        $detail->product->name,
                        date('d M Y', $detail->from),
                        date('d M Y', $detail->to)
                    ];
                    $this->whatsAppService->sendMessage('to_cutomer_on_rental_expiring_on_day_before', $data, $detail->rentRequest->phone_number);
                }
            }

            if ($detail->to == $today) {
                if(settings('rent_expire_date_admin_notification') == 'Yes'){
                    $data = [
                        $customer->name,
                        $customer->mobile_number,
                        $detail->rentRequest->id,
                        $detail->product->name,
                        date('d M Y', $detail->from),
                        date('d M Y', $detail->to)
                    ];
                    $this->whatsAppService->sendMessage('to_admin_on_rental_collection_day', $data);
                }
                if(settings('rent_expire_date_watsapp_customer_notification') == 'Yes'){
                    $data = [
                        $detail->rentRequest->id,
                        $detail->product->name,
                        date('d M Y', $detail->from),
                        date('d M Y', $detail->to)
                    ];
                    $this->whatsAppService->sendMessage('to_customer_on_rental_collection_day', $data, $detail->rentRequest->phone_number);
                }
            }
        }
        $this->info('Expiration notifications sent successfully.');
        Log::info('Expiration notifications sent successfully.');
    }
}
