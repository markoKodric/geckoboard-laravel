<?php

namespace Mare06xa\Geckoboard\src\Classes\Widgets\Monitoring;


use Mare06xa\Geckoboard\src\Abstracts\Widget;
use Mare06xa\Geckoboard\src\Classes\Validations\WidgetValidator;

class Monitoring extends Widget
{
    protected $item;
    protected $rules = [
        'status'       => 'required|in:Up,Down,Unreported',
        'downTime'     => 'string',
        'responseTime' => 'string'
    ];


    public function __construct()
    {
        $this->item = [];
    }

    /**
     * @return array
     * @throws \Exception
     */
    protected function prepareData(): array
    {
        $this->validateData(new WidgetValidator($this->item, $this->rules));

        return $this->item;
    }

    public function status($value)
    {
        $this->item['status'] = $value;

        return $this;
    }

    public function downTime($value)
    {
        $this->item['downTime'] = $value;

        return $this;
    }

    public function msResponseTime($value)
    {
        $this->item['responseTime'] = strval($value) . " ms";

        return $this;
    }
}