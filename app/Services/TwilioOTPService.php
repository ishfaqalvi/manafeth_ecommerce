<?php

namespace App\Services;

use Twilio\Rest\Client;
use Exception;

class TwilioOTPService
{
    protected $twilio;

    public function __construct()
    {
        $sid = settings('twilio_sid') ?? config('twilio.sid');
        $token = settings('twilio_token') ?? config('twilio.token');
        $this->twilio = new Client($sid, $token);
    }

    /**
     * Send OTP to a phone number using Twilio Verify API
     *
     * @param string $phoneNumber The phone number to send OTP to
     * @return array
     */
    public function sendOtp($phoneNumber)
    {
        try {
            $serviceid = settings('twilio_service_id') ?? config('twilio.serviceid');

            $verification = $this->twilio->verify->v2->services($serviceid)
                ->verifications
                ->create($phoneNumber, 'sms');

            return [
                'status' => 'success',
                'message' => 'OTP sent successfully',
                'sid' => $verification->sid,
            ];
        } catch (Exception $e) {
            return [
                'status' => 'error',
                'message' => $e->getMessage(),
            ];
        }
    }

    /**
     * Verify OTP sent to the phone number
     *
     * @param string $phoneNumber The phone number
     * @param string $otp The OTP entered by the user
     * @return array
     */
    public function verifyOtp($phoneNumber, $otp)
    {
        try {
            $serviceid = settings('twilio_service_id') ?? config('twilio.serviceid');
            $verificationCheck = $this->twilio->verify->v2->services($serviceid)
                ->verificationChecks
                ->create([
                    'to' => $phoneNumber,
                    'code' => $otp,
                ]);

            if ($verificationCheck->status === 'approved') {
                return [
                    'status' => 'success',
                    'message' => 'OTP verified successfully',
                ];
            } else {
                return [
                    'status' => 'error',
                    'message' => 'Invalid OTP. Please try again.',
                ];
            }
        } catch (Exception $e) {
            return [
                'status' => 'error',
                'message' => $e->getMessage(),
            ];
        }
    }
}
