<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Twilio Account SID
    |--------------------------------------------------------------------------
    |
    | This is your Twilio Account SID from the Twilio dashboard.
    | Use the environment variable as the primary source.
    |
    */
    'sid' => env('TWILIO_SID'),

    /*
    |--------------------------------------------------------------------------
    | Twilio Auth Token
    |--------------------------------------------------------------------------
    |
    | This is your Twilio Auth Token.
    | Use the environment variable as the primary source.
    |
    */
    'token' => env('TWILIO_AUTH_TOKEN'),

    /*
    |--------------------------------------------------------------------------
    | Twilio Phone Number
    |--------------------------------------------------------------------------
    |
    | This is your Twilio phone number that will be used to send SMS messages.
    | Use the environment variable as the primary source.
    |
    */
    'from' => env('TWILIO_PHONE_NUMBER'),

    /*
    |--------------------------------------------------------------------------
    | Twilio Service ID
    |--------------------------------------------------------------------------
    |
    | This is your Twilio service id that will be used to send SMS messages.
    | Use the environment variable as the primary source.
    |
    */
    'serviceid' => env('TWILIO_VERIFY_SERVICE_SID'),
];
