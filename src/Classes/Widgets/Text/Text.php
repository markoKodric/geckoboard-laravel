<?php

namespace Mare06xa\Geckoboard\Classes\Widgets\Text;


use Mare06xa\Geckoboard\Abstracts\Widget;
use Mare06xa\Geckoboard\Classes\Validations\TextValidator;
use Mare06xa\Geckoboard\Classes\Validations\WidgetValidator;

class Text extends Widget
{
    protected $items;
    protected $rules = [
        'item'        => 'required|array',
        'item.*.text' => 'required|string',
        'item.*.type' => 'integer|between:0,2'
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
        $preparedData = [
            'item' => $this->items()->get()
        ];

        $this->validateData(new WidgetValidator($preparedData, $this->rules));

        return $preparedData;
    }

    public function items()
    {
        return $this->items;
    }
}