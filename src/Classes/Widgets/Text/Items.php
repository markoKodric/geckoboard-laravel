<?php

namespace Mare06xa\Geckoboard\Classes\Widgets\Text;

use Mare06xa\Geckoboard\Enums\TextType;

class Items
{
    protected $items;

    public function add($text, $type = TextType::STANDARD)
    {
        $this->items[] = [
            "text" => $text,
            "type" => $type,
        ];

        return $this;
    }

    public function get()
    {
        return $this->items;
    }
}
