<?php

namespace App\Http;

use GuzzleHttp\Client;

class ApiClient
{
    private Client $client;
    private string $token;

    public function __construct()
    {
        $this->token = $_ENV['TOKEN'] ?? '';

        $this->client = new Client([
            'base_uri' => 'https://crm.belmar.pro/api/v1/'
        ]);
    }

    public function addLead(array $data)
    {
        $response = $this->client->post('addlead', [
            'headers' => [
                'token' => $this->token,
                'Content-Type' => 'application/json'
            ],
            'json' => $data
        ]);

        return json_decode($response->getBody(), true);
    }

    public function getStatuses(array $params)
    {
        $response = $this->client->post('getstatuses', [
            'headers' => [
                'token' => $this->token,
                'Content-Type' => 'application/json'
            ],
            'json' => $params
        ]);
        
        return json_decode($response->getBody(), true);
    }
}