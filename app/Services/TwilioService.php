<?php

namespace App\Services;

use Twilio\Rest\Client;

class TwilioService
{
    protected $twilio;

    public function __construct()
    {
        $sid = settings('twilio_sid') ?? config('twilio.sid');
        $token = settings('twilio_token') ?? config('twilio.token');
        $this->twilio = new Client($sid, $token);
    }

    public function sendSms($to, $otp)
    {
        $from = settings('twilio_phone_number') ?? config('twilio.from');

        $websiteName = settings('website_name') ?? config('app.name', 'Our Website');

        $message = "Your OTP is: {$otp}\n\n"
            . "Thank you for using {$websiteName}.\n"
            . "Visit us at: " . url('/');

        return $this->twilio->messages->create(
            $to,
            [
                'from' => $from,
                'body' => $message,
            ]
        );
    }
}
