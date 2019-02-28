<?php

namespace Mare06xa\Geckoboard\Classes\Widgets\PaginatedList;

class Items
{
    protected $items;

    public function add($text, $description = "", $labelBefore = "", $labelColor = "#FF0000")
    {
        $item = [
            'title' => [
                'text' => $text,
            ]
        ];

        if ($description !== "") {
            $item['description'] = $description;
        }

        if ($labelBefore !== "") {
            $item['label'] = [
                'name'  => $labelBefore,
                'color' => $labelColor,
            ];
        }

        $this->items[] = $item;

        return $this;
    }

    public function get()
    {
        return $this->items;
    }
}
