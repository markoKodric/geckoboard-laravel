<?php

namespace Mare06xa\Geckoboard\Classes\Widgets\NumberSecondaryStat;

use Mare06xa\Geckoboard\Abstracts\Widget;
use Mare06xa\Geckoboard\Classes\Validations\WidgetValidator;

class NumberSecondaryStat extends Widget
{
    protected $items;

    protected $rules = [
        'item'          => 'required|array',
        'item.*.value'  => 'required|numeric',
        'item.*.text'   => 'string',
        'item.*.prefix' => 'string',
        'item.*.type'   => 'string|in:time_duration,text',
        'type'          => 'string|in:reverse',
        'absolute'      => 'boolean',
        'responseTime'  => 'string',
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

        if ($this->items->isReverse()) {
            $widgetData['type'] = "reverse";
        }

        if ($this->items->isAbsolute()) {
            $widgetData['absolute'] = true;
        }

        if ($this->items->hasTrendline()) {
            array_push($widgetData['item'], $this->items->getTrendline());
        }

        $this->validateData(new WidgetValidator($widgetData, $this->rules));

        return $widgetData;
    }

    public function items()
    {
        return $this->items;
    }
}
