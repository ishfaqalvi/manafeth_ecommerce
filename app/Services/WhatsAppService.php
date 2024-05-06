<?php

namespace App\Services;

use GuzzleHttp\Client;
use Illuminate\Support\Facades\Log;
use GuzzleHttp\Exception\RequestException;
use Illuminate\Log\Logger;

class WhatsAppService
{
    protected $client;
    protected $config;
    protected $to;
    protected $logger;

    public function __construct()
    {
        $this->config = config('whatsapp');
        $this->client = new Client([
            'base_uri' => $this->config['api_url'],
            'timeout'  => $this->config['timeout'],
        ]);
        $this->to = settings('whatsapp_notification_number') ?? $this->config['default_number'];
        $this->logger = new Logger();
        $this->logger->setFilePath(public_path('logs/custom.log'));

    }

    public function sendMessage($template, $data)
    {
        $headers = [
            'Authorization' => 'Bearer ' . $this->config['access_token'],
            'Content-Type' => 'application/json'
        ];
        $parameters = [];
        foreach ($data as $item) {
            $parameters[] = [
                'type' => 'text',
                'text' => $item
            ];
        }
        $body = json_encode([
            'messaging_product' => 'whatsapp',
            'to' => $this->to,
            'type' => 'template',
            'template' => [
                'name' => $template,
                'language' => [
                    'code' => 'en_US'
                ],
                'components' => [
                    [
                        'type' => 'body',
                        'parameters' => $parameters
                    ]
                ]
            ]
        ]);
        try {
            $response = $this->client->post('messages', [
                'headers' => $headers,
                'body' => $body,
            ]);
            Log::info('Received WhatsApp response: Message sent successfully!');
        } catch (GuzzleHttp\Exception\RequestException $e) {
            Log::error('Error with WhatsApp service', ['error' => $e->getMessage()]);
        }

    }
}
