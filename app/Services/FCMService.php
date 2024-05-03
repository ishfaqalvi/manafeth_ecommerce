<?php

namespace App\Services;

use Google\Client as GoogleClient;
use GuzzleHttp\Client as HttpClient;
use Illuminate\Support\Facades\Log;
use GuzzleHttp\Exception\RequestException;

class FCMService
{
    private $projectID;
    private $httpClient;
    private $appCredetials;

    public function __construct()
    {
        $this->httpClient    = new HttpClient();
        $this->projectID     = settings('firebase_project_id') ?? env('FIREBASE_PROJECT_ID');
        $googleAppCredentialsSetting = settings('google_application_credentials');
        $this->appCredetials = settings('google_application_credentials') ? public_path(settings('google_application_credentials')) : env('GOOGLE_APPLICATION_CREDENTIALS');
    }

    public function authenticate() {
        $client = new GoogleClient();
        $client->setAuthConfig($this->appCredetials);

        $client->addScope('https://www.googleapis.com/auth/cloud-platform');
        $client->refreshTokenWithAssertion();

        return $client->getAccessToken();
    }

    public function sendNotification($title, $body, $token)
    {
        $accessToken = $this->authenticate();
        $message = [
            'message' => [
                'token' => $token,
                'notification' => [
                    'title' => $title,
                    'body' => $body,
                ],
            ],
        ];
        $headers = [
            'Authorization' => 'Bearer ' . $accessToken['access_token'],
            'Content-Type' => 'application/json',
        ];
        try {
            $response = $this->httpClient->post("https://fcm.googleapis.com/v1/projects/{$this->projectID}/messages:send", [
                'headers' => $headers,
                'json' => $message
            ]);
            Log::info('Received FCM response: Single user notification sent successfully!');

        } catch (GuzzleHttp\Exception\RequestException $e) {
            Log::error('Error with FCM service', ['error' => $e->getMessage()]);
        }
    }

    public function notifyAllUsers($title, $body, $tokens)
    {
        $accessToken = $this->authenticate();
        $message = [
            'message' => [
                'registration_ids' => $tokens,
                'notification' => [
                    'title' => $title,
                    'body' => $body,
                ],
            ],
        ];
        $headers = [
            'Authorization' => 'Bearer ' . $accessToken['access_token'],
            'Content-Type' => 'application/json',
        ];
        try {
            $response = $this->httpClient->post("https://fcm.googleapis.com/v1/projects/{$this->projectID}/messages:send", [
                'headers' => $headers,
                'json' => $message
            ]);
            Log::info('Received FCM response: Multiple user notification sent successfully!');

        } catch (GuzzleHttp\Exception\RequestException $e) {
            Log::error('Error with FCM service', ['error' => $e->getMessage()]);
        }
    }

    public function sendMessageToTopic($topic, $title, $body, $imageUrl) 
    {
        $accessToken = $this->authenticate();
        $message = [
            'message' => [
                'topic' => $topic,
                'notification' => [
                    'title' => $title,
                    'body' => $body,
                    'image' => $imageUrl,
                ],
            ],
        ];
        $headers = [
            'Authorization' => 'Bearer ' . $accessToken['access_token'],
            'Content-Type' => 'application/json',
        ];
        try {
            $response = $this->httpClient->post("https://fcm.googleapis.com/v1/projects/{$this->projectID}/messages:send", [
                'headers' => $headers,
                'json' => $message
            ]);
            Log::info('Received FCM response: Topic wise notification sent successfully!');

        } catch (GuzzleHttp\Exception\RequestException $e) {
            Log::error('Error with FCM service', ['error' => $e->getMessage()]);
        }
    }
}
