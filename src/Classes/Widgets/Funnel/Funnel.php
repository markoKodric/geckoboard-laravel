<?php

namespace Mare06xa\Geckoboard\Classes\Widgets\Funnel;

use Mare06xa\Geckoboard\Abstracts\Widget;
use Mare06xa\Geckoboard\Classes\Validations\FunnelValidator;
use Mare06xa\Geckoboard\Classes\Validations\WidgetValidator;

class Funnel extends Widget
{
    protected $items;

    protected $rules = [
        'item'              => 'required|array',
        'item.*.value'      => 'required',
        'item.*.label'      => 'string',
        'item.*.percentage' => 'string|in:hide',

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
            'item' => $this->items->getItems(),
        ];

        $this->validateData(new WidgetValidator($widgetData, $this->rules));

        return $widgetData;
    }

    public function items()
    {
        return $this->items;
    }
}
