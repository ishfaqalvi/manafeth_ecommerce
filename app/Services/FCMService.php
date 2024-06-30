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
        $this->appCredetials = settings('google_application_credentials') ? public_path(settings('google_application_credentials')) : '';
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

        } catch (RequestException $e) {
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

        } catch (RequestException $e) {
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
                    'body'  => $body,
                    'image' => $imageUrl
                ],
                'data' => [
                    'image' => $imageUrl
                ]
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
            Log::info('Received FCM response: Topic wise notification sent successfully!', ['file' => public_path('logs/fcm.log')]);

        } catch (RequestException $e) {
            Log::error('Error with FCM service', ['error' => $e->getMessage(), 'file' => public_path('logs/fcm.log')]);
        }
    }

    public function browserNotification($title, $body, $firebaseTokens)
    {
        $SERVER_API_KEY = "AIzaSyC-Te1QdXMPBYG9cqY5wiUmW5IfBhl7NEQ";

        $data = is_array($firebaseTokens) ? ["registration_ids" => $firebaseTokens] : ["to" => $firebaseTokens];
        $data['notification'] = [
            "title" => $title,
            "body" => $body,
        ];
        $dataString = json_encode($data);

        $headers = [
            'Authorization: key=' . $SERVER_API_KEY,
            'Content-Type: application/json',
        ];
        try {
            $ch = curl_init();

            curl_setopt($ch, CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send');
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $dataString);

            $response = curl_exec($ch);

            if (curl_errno($ch)) {
                Log::error('Curl error: ' . curl_error($ch));
            }

            $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
            Log::info('HTTP Code: ' . $httpCode);

            if ($httpCode == 200) {
                $responseDecoded = json_decode($response, true);
                if (isset($responseDecoded['success']) && $responseDecoded['success'] > 0) {
                    Log::info('Received FCM response: Admin user web notification sent successfully!');
                } else {
                    Log::warning('Received FCM response but no success: ' . $response);
                }
            } else {
                Log::error('Error in FCM response: ' . $response);
            }

            curl_close($ch);

        } catch (RequestException $e) {
            Log::error('Error with FCM web service', ['error' => $e->getMessage()]);
        }
    }
}
