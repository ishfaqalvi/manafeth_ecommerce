<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Services\RentalNotificationService;

class ManageRentalNotifications extends Command
{
    protected $rentalNotification;
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:manage-rental-notifications';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Manage notifications for rental orders, including expiration and delivery reminders';

    public function __construct(RentalNotificationService $rentalNotification)
    {
        parent::__construct();
        $this->rentalNotification = $rentalNotification;
    }

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->rentalNotification->sendExpirationNotifications();

        $this->rentalNotification->sendDeliveryNotifications();

        $this->info('Rental notifications processed with daily job successfully.');
    }
}
