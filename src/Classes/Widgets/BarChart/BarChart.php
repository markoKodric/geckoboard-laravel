<?php

namespace Mare06xa\Geckoboard\Classes\Widgets\BarChart;

use Mare06xa\Geckoboard\Abstracts\Widget;
use Mare06xa\Geckoboard\Classes\Validations\WidgetValidator;
use Mare06xa\Geckoboard\Classes\Widgets\BarChart\Axis\xAxis;
use Mare06xa\Geckoboard\Classes\Widgets\BarChart\Axis\yAxis;

class BarChart extends Widget
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
        'series.*.data.*' => 'numeric',
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
                'labels' => $this->xAxis->getLabels(),
                'type'   => $this->xAxis->getFormat(),
            ],
            'y_axis' => [
                'format' => $this->yAxis->getFormat(),
            ],
            'series' => $this->yAxis->getData(),
        ];

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
