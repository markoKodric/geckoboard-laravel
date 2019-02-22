<?php

namespace Mare06xa\Geckoboard\src\Classes\Widgets\Text;


use Mare06xa\Geckoboard\src\Enums\TextType;

class Items
{
    protected $items;

    public function add($text, $type = TextType::STANDARD)
    {
        $this->items[] = [
            "text" => $text,
            "type" => $type
        ];

        return $this;
    }

    public function get()
    {
        return $this->items;
    }
}