<?php

namespace Mare06xa\Geckoboard\src\Classes\Widgets\Funnel;


class Items
{
    protected $items;

    public function setItems($items = [])
    {
        $this->items = $items;

        return $this;
    }

    public function add($value, $label = "", $percentageHidden = false)
    {
        $item = [
            'value'  => $value,
            'label'  => $label
        ];

        if ($percentageHidden) {
            $item['percentage'] = 'hide';
        }

        $this->items[] = $item;

        return $this;
    }

    public function getItems()
    {
        return $this->items;
    }
}