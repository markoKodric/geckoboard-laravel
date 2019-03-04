<?php

namespace Mare06xa\Geckoboard\Classes\Widgets\PieChart;

use Mare06xa\Geckoboard\Abstracts\Widget;
use Mare06xa\Geckoboard\Classes\Validations\WidgetValidator;

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
            'item' => $this->items->get(),
        ];

        $this->validateData(new WidgetValidator($widgetData, $this->rules));

        return $widgetData;
    }

    public function items()
    {
        return $this->items;
    }
}
