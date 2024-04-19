<?php

namespace App\Services;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;

class WhatsAppService
{
    protected $client;
    protected $config;

    public function __construct()
    {
        $this->config = config('whatsapp');
        $this->client = new Client([
            'base_uri' => $this->config['api_url'],
            'timeout'  => $this->config['timeout'],
        ]);
    }

    public function sendMessage($message, $to = null)
    {
        if (!$to) {
            $to = $this->config['default_number'];
        }

        $headers = [
            'Authorization' => 'Bearer ' . $this->config['access_token'],
            'Content-Type' => 'application/json'
        ];

        // $body = json_encode([
        //     'messaging_product' => 'whatsapp',
        //     'to' => $to,
        //     'type' => 'text',
        //     'text' => [
        //         'body' => $message
        //     ]
        // ]);
        // $body = json_encode([
        //     'messaging_product' => 'whatsapp',
        //     'to' => $to,
        //     'type' => 'template',
        //     'template' => [
        //         'name' => 'hello_world',
        //         'language' => [
        //             'code' => 'en_US'
        //         ],
        //         'components' => [
        //             [
        //                 'type' => 'header',
        //                 'parameters' => [
        //                     ['type' => 'image', 'image' => ['link' => 'https://www.sakoon.pk/assets/web/image/logo/sakoon125tran.png']]
        //                 ]
        //             ],
        //             [
        //                 'type' => 'body',
        //                 'parameters' => [
        //                     ['type' => 'text', 'text' => 'John Doe'],
        //                     ['type' => 'text', 'text' => 'Your order #1234 has been shipped']
        //                 ]
        //             ],
        //             [
        //                 'type' => 'button',
        //                 'sub_type' => 'quick_reply',
        //                 'index' => 0,
        //                 'parameters' => [
        //                     ['type' => 'payload', 'payload' => 'Yes']
        //                 ]
        //             ]
        //         ]
        //     ]
        // ]);

        $body = json_encode([
            'messaging_product' => 'whatsapp',
            'to' => $to,
            'type' => 'image',
            'image' => [
                'link' => 'https://www.sakoon.pk/assets/web/image/logo/sakoon125tran.png',
                'caption' => 'This is an image caption'
            ]
        ]);

        try {
            $response = $this->client->post('messages', [
                'headers' => $headers,
                'body' => $body,
            ]);

            return "Message sent successfully!";
        } catch (GuzzleHttp\Exception\RequestException $e) {
            return "Request failed: " . $e->getMessage();
        }
    }
}
