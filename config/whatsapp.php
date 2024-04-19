<?php

return [
    'api_url' => env('WHATSAPP_API_URL', 'https://graph.facebook.com/v18.0/123632717497085/'),
    'access_token' => env('WHATSAPP_ACCESS_TOKEN', 'your-access-token-here'),
    'default_number' => env('WHATSAPP_DEFAULT_NUMBER', '+923075528385'),
    'timeout' => 30,
];
