<?php

namespace Mare06xa\Geckoboard\src\Classes\Widgets\RAG;


use Mare06xa\Geckoboard\src\Abstracts\Widget;
use Mare06xa\Geckoboard\src\Classes\Validations\WidgetValidator;

class RAG extends Widget
{
    protected $items;
    protected $rules = [
        'item'         => 'required|array|between:2,5',
        'item.*.value' => 'numeric',
        'item.*.text'  => 'string',
        'item.prefix'  => 'string',
        'item.type'    => 'string|in:reverse',
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