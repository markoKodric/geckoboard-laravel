<?php

namespace Mare06xa\Geckoboard\Abstracts;

use Mare06xa\Geckoboard\Classes\Validations\WidgetValidator;
use Mare06xa\Geckoboard\Helpers\WidgetClient;

abstract class Widget
{
    protected $widgetID;
    protected $apiToken;

    abstract public function __construct();

    abstract protected function prepareData(): array;

    /**
     * @param $widgetID
     * @throws \Exception
     */
    function setID($widgetID)
    {
        $widgetIdEmpty = empty(trim($widgetID));

        if ($widgetIdEmpty) {
            throw new \Exception('Widget ID must not be empty.');
        }

        $widgetIdWrongFormat = !preg_match("/^([a-z0-9]+-)*[a-z0-9]+$/i", trim($widgetID));

        if ($widgetIdWrongFormat) {
            throw new \Exception('Widget ID is in wrong format.');
        }

        $this->widgetID = trim($widgetID);
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

    /**
     * @param WidgetValidator $validator
     * @throws \Exception
     */
    function validateData(WidgetValidator $validator)
    {
        $validator->validate();
    }

    /**
     * @return \Exception|\Psr\Http\Message\ResponseInterface
     * @throws \Exception
     */
    function push()
    {
        $pusher = new WidgetClient();

        if ($this->apiToken !== null) {
            $pusher->setApiToken($this->apiToken);
        }

        $pushData = $this->prepareData();

        return $pusher->push($this->widgetID, $pushData);
    }
}
