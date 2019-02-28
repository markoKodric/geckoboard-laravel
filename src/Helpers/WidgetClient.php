<?php

namespace Mare06xa\Geckoboard\Helpers;

use GuzzleHttp\Client;

class WidgetClient
{
    protected $geckoClient;
    protected $apiToken;

    public function __construct()
    {
        $baseURI = config('geckoboard.widget_api_domain');

        if (!$baseURI) {
            $baseURI = 'https://push.geckoboard.com/v1/send/';
        }

        $this->geckoClient = new Client([
            'base_uri' => $baseURI,
        ]);
    }

    /**
     * @param $apiToken
     * @throws \Exception
     */
    function setApiToken($apiToken)
    {
        $apiTokenEmpty = empty(trim($apiToken));

        if ($apiTokenEmpty) {
            throw new \Exception('API token must not be empty.');
        }

        $this->apiToken = trim($apiToken);
    }

    public function push($widgetID, $widgetData)
    {
        $postData['api_key'] = $this->apiToken !== null ? $this->apiToken : env("GECKO_TOKEN");
        $postData['data'] = $widgetData;

        try {
            $response = $this->geckoClient->post($widgetID, [
                "json" => $postData,
            ]);
        } catch (\Exception $exception) {
            $response = $exception;
        }

        return $response;
    }
}
