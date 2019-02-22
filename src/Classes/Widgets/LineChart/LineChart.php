<?php

namespace Mare06xa\Geckoboard\src\Classes\Widgets\LineChart;


use Mare06xa\Geckoboard\src\Abstracts\Widget;
use Mare06xa\Geckoboard\src\Classes\Validations\WidgetValidator;
use Mare06xa\Geckoboard\src\Classes\Widgets\LineChart\Axis\xAxis;
use Mare06xa\Geckoboard\src\Classes\Widgets\LineChart\Axis\yAxis;

class LineChart extends Widget
{
    protected $xAxis;
    protected $yAxis;
    protected $rules = [
        'x_axis'          => 'required|array',
        'x_axis.type'     => 'string|in:standard,datetime',
        'x_axis.labels'   => 'required|array',
        'x_axis.labels.*' => 'string',
        'y_axis'          => 'required|array',
        'y_axis.format'   => 'required|string|in:decimal,percent,currency',
        'y_axis.unit'     => 'string|size:3',
        'series'          => 'required|array',
        'series.*.data'   => 'required|array',
        'series.*.name'   => 'string',
        'series.*.incomplete_from' => 'string'
    ];


    public function __construct()
    {
        $this->xAxis = new xAxis();
        $this->yAxis = new yAxis();
    }

    /**
     * @return array
     * @throws \Exception
     */
    protected function prepareData(): array
    {
        $widgetData = [
            'x_axis' => [
                'labels' => $this->xAxis->getLabels()
            ],
            'y_axis' => [
                'format' => $this->yAxis->getFormat()
            ],
            'series' => $this->yAxis->getLines()
        ];

        if ($this->xAxis->isDatetime()) {
            $widgetData['x_axis']['type'] = $this->xAxis->getFormat();
            unset($widgetData['x_axis']['labels']);
        }

        if ($this->yAxis->isCurrency()) {
            $widgetData['y_axis']['unit'] = $this->yAxis->getCurrency();
        }

        $this->validateData(new WidgetValidator($widgetData, $this->rules));

        return $widgetData;
    }

    public function xAxis()
    {
        return $this->xAxis;
    }

    public function yAxis()
    {
        return $this->yAxis;
    }
}