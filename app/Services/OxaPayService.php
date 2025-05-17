<?php

namespace App\Services;

use GuzzleHttp\Client;

class OxaPayService
{
    protected $client;
    protected $apiUrl;
    protected $apiKey;

    public function __construct()
    {
        $this->client = new Client();
        $this->apiUrl = 'https://api.oxapay.com/api/send';
        $this->apiKey = env('OXAPAY_API_KEY');
    }

    public function createPayment($amount, $currency, $callbackUrl)
    {
        $response = $this->client->post("{$this->apiUrl}/payments", [
            'headers' => [
                'key' => "$this->apiKey",
                'Content-Type' => 'application/json',
            ],
            'json' => [
                'amount' => $amount,
                'currency' => $currency,
                'callback_url' => $callbackUrl,
            ],
        ]);

        return json_decode($response->getBody(), true);
    }
}
