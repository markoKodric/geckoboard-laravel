<?php

namespace Mare06xa\Geckoboard\Classes\Widgets\BulletGraph;

use Mare06xa\Geckoboard\Classes\Widgets\BulletGraph\Item\BulletGraphItem;

class Items
{
    protected $items;

    public function getItems()
    {
        return $this->items;
    }

    public function add(BulletGraphItem $item)
    {
        $this->items[] = $item;

        return $this;
    }
}
