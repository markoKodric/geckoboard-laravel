<?php

namespace Mare06xa\Geckoboard\Helpers;


use GuzzleHttp\Client;

class Pusher
{
    protected $geckoClient;
    protected $apiToken;

    public function __construct()
    {
        $this->geckoClient = new Client([
            'base_uri' => env('GECKO_DOMAIN')
        ]);
    }

    public function push($widgetID, $widgetData)
    {
        $postData['api_key'] = $this->apiToken !== null ? $this->apiToken : env("GECKO_TOKEN");
        $postData['data']    = $widgetData;

        $response = $this->geckoClient->post($widgetID, [
            "json" => $postData
        ]);

        return $response;
    }
}