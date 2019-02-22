<?php

namespace Mare06xa\Geckoboard\src\Classes\Widgets\PieChart;


use Mare06xa\Geckoboard\src\Abstracts\Widget;
use Mare06xa\Geckoboard\src\Classes\Validations\WidgetValidator;

class PieChart extends Widget
{
    protected $items;
    protected $rules = [
        'item'         => 'required|array',
        'item.*.value' => 'required|numeric',
        'item.*.label' => 'required|string',
        'item.*.color' => 'string',
    ];

    public function __construct()
    {
        $this->items = new Items();
    }

    /**
     * @return array
     * @throws \Exception
     */
    protected function prepareData(): array
    {
        $widgetData = [
            'item' => $this->items->get()
        ];

        $this->validateData(new WidgetValidator($widgetData, $this->rules));

        return $widgetData;
    }

    public function items()
    {
        return $this->items;
    }
}