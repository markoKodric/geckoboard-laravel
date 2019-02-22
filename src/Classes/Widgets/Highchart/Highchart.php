<?php

namespace Mare06xa\Geckoboard\src\Classes\Widgets\Highchart;


use Mare06xa\Geckoboard\src\Abstracts\Widget;

class Highchart extends Widget
{
    protected $highchartData;

    public function __construct()
    {
        $this->highchartData = [];
    }

    protected function prepareData(): array
    {
        return [
            "highchart" => $this->highchartData
        ];
    }

    public function setData($data)
    {
        $this->highchartData = $data;
    }
}