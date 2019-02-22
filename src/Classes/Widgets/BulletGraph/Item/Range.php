<?php

namespace Mare06xa\Geckoboard\src\Classes\Widgets\BulletGraph\Item;


class Range
{
    protected $red;
    protected $amber;
    protected $green;

    public function red($start, $end)
    {
        $this->red = [
            'start' => $start,
            'end'   => $end
        ];

        return $this;
    }

    public function amber($start, $end)
    {
        $this->amber = [
            'start' => $start,
            'end'   => $end
        ];

        return $this;
    }

    public function green($start, $end)
    {
        $this->green = [
            'start' => $start,
            'end'   => $end
        ];

        return $this;
    }

    public function toArray()
    {
        return [
            'red'   => $this->red,
            'amber' => $this->amber,
            'green' => $this->green
        ];
    }
}