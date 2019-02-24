<?php

namespace Mare06xa\Geckoboard\Helpers;


use GuzzleHttp\Client;

class DatasetClient
{
    protected $geckoClient;
    protected $apiToken;

    public function __construct()
    {
        $baseURI = config('geckoboard.dataset_api_domain');

        if (!$baseURI) {
            $baseURI = 'https://api.geckoboard.com/datasets/';
        }

        $this->geckoClient = new Client([
            'base_uri' => $baseURI
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

    public function put($datasetID, $datasetData)
    {
        $apiToken = $this->apiToken !== null ? $this->apiToken : env("GECKO_TOKEN");

        try {
            $response = $this->geckoClient->put($datasetID, [
                "auth" => [$apiToken, ''],
                "json" => $datasetData
            ]);
        } catch (\Exception $exception) {
            $response = $exception;
        }

        return $response;
    }

    public function update($datasetID, $datasetData)
    {
        $apiToken = $this->apiToken !== null ? $this->apiToken : env("GECKO_TOKEN");

        try {
            $response = $this->geckoClient->put($datasetID . '/data', [
                "auth" => [$apiToken, ''],
                "json" => $datasetData
            ]);
        } catch (\Exception $exception) {
            $response = $exception;
        }

        return $response;
    }

    public function post($datasetID, $datasetData)
    {
        $apiToken = $this->apiToken !== null ? $this->apiToken : env("GECKO_TOKEN");

        try {
            $response = $this->geckoClient->post($datasetID . '/data', [
                "auth" => [$apiToken, ''],
                "json" => $datasetData
            ]);
        } catch (\Exception $exception) {
            $response = $exception;
        }

        return $response;
    }

    public function delete($datasetID)
    {
        $apiToken = $this->apiToken !== null ? $this->apiToken : env("GECKO_TOKEN");

        try {
            $response = $this->geckoClient->delete($datasetID, [
                "auth" => [$apiToken, ''],
            ]);
        } catch (\Exception $exception) {
            $response = $exception;
        }

        return $response;
    }
}