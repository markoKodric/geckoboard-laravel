<?php

namespace Mare06xa\Geckoboard\src\Classes\Widgets\PieChart;


class Items
{
    protected $items;

    public function add($value, $label, $color = "#198ACD")
    {
        $this->items[] = [
            'value' => $value,
            'label' => $label,
            'color' => str_replace("#", "", $color)
        ];

        return $this;
    }

    public function get()
    {
        return $this->items;
    }
}