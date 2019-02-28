<?php

namespace Mare06xa\Geckoboard\Classes\Widgets\GeckoMeter;

use Mare06xa\Geckoboard\Abstracts\Widget;
use Mare06xa\Geckoboard\Classes\Validations\FunnelValidator;
use Mare06xa\Geckoboard\Classes\Validations\WidgetValidator;

class GeckoMeter extends Widget
{
    protected $item;

    protected $rules = [
        'item'      => 'required|numeric',
        'min'       => 'required|array',
        'min.value' => 'required|numeric',
        'max'       => 'required|array',
        'max.value' => 'required|numeric',
        'format'    => 'string|in:percent,currency',
        'unit'      => 'string|size:3',
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

    public function value($value)
    {
        $this->item['item'] = $value;

        return $this;
    }

    public function min($value)
    {
        $this->item['min']['value'] = $value;

        return $this;
    }

    public function max($value)
    {
        $this->item['max']['value'] = $value;

        return $this;
    }
}
