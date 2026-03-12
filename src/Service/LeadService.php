<?php

namespace App\Service;

use App\Http\ApiClient;

class LeadService
{
    private ApiClient $api;

    public function __construct(ApiClient $api)
    {
        $this->api = $api;
    }

    public function sendLead(array $form)
    {
        $data = [
            'firstName' => $form['firstName'],
            'lastName' => $form['lastName'],
            'phone' => $form['phone'],
            'email' => $form['email'],

            'box_id' => 28,
            'offer_id' => 5,
            'countryCode' => 'GB',
            'language' => 'en',
            'password' => 'qwerty12',

            'ip' => $_SERVER['REMOTE_ADDR'],
            'landingUrl' => $_SERVER['HTTP_HOST']
        ];

        return $this->api->addLead($data);
    }

    public function getStatuses(string $dateFrom, string $dateTo)
    {
        $params = [
            "date_from" => $dateFrom,
            "date_to" => $dateTo,
            "page" => 0,
            "limit" => 100
        ];

        $response = $this->api->getStatuses($params);

       
        if (!isset($response['status']) || !$response['status']) {
            return [];
        }

        $data = $response['data'] ?? [];

        if (is_string($data)) {
            return json_decode($data, true);
        }

        return is_array($data) ? $data : [];
    }
}