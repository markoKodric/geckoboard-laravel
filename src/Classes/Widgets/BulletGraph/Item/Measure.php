<?php

namespace Mare06xa\Geckoboard\Classes\Widgets\BulletGraph\Item;


class Measure
{
    protected $current;
    protected $projected;

    public function current($start, $end)
    {
        $this->current = [
            'start' => $start,
            'end'   => $end
        ];

        return $this;
    }

    public function projected($start, $end)
    {
        $this->projected = [
            'start' => $start,
            'end'   => $end
        ];

        return $this;
    }

    public function toArray()
    {
        return [
            'current'   => $this->current,
            'projected' => $this->projected
        ];
    }
}