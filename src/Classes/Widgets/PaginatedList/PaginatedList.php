<?php

namespace Mare06xa\Geckoboard\Classes\Widgets\PaginatedList;

use Mare06xa\Geckoboard\Abstracts\Widget;
use Mare06xa\Geckoboard\Classes\Validations\WidgetValidator;

class PaginatedList extends Widget
{
    protected $items;

    protected $rules = [
        '*.title'       => 'required|array',
        '*.title.text'  => 'required|string',
        '*.label'       => 'array',
        '*.label.name'  => 'string',
        '*.label.color' => 'string',
        '*.description' => 'string',
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
        $this->validateData(new WidgetValidator($this->items()->get(), $this->rules));

        return $this->items()->get();
    }

    public function items()
    {
        return $this->items;
    }
}
