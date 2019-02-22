<?php

namespace Mare06xa\Geckoboard\src\Abstracts;


use Mare06xa\Geckoboard\src\Classes\Validations\WidgetValidator;
use Mare06xa\Geckoboard\src\Helpers\Pusher;

abstract class Widget
{
    protected $widgetID;
    protected $apiToken;


    abstract public    function __construct();
    abstract protected function prepareData(): array;

    function setID($widgetID)
    {
        $this->widgetID = $widgetID;
    }

    function setApiToken($apiToken)
    {
        $this->apiToken = $apiToken;
    }

    /**
     * @param WidgetValidator $validator
     * @throws \Exception
     */
    function validateData(WidgetValidator $validator)
    {
        $validator->validate();
    }

    function push()
    {
        $pusher   = new Pusher();
        $pushData = $this->prepareData();

        return $pusher->push($this->widgetID, $pushData);
    }
}