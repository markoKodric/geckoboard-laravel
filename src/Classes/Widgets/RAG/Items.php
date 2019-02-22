<?php

namespace Mare06xa\Geckoboard\src\Classes\Widgets\RAG;


class Items
{
    protected $items;
    protected $prefix;
    protected $isReversed;

    public function first($value, $text)
    {
        $this->items[] = [
            'value' => $value,
            'text'  => $text
        ];

        return $this;
    }

    public function second($value, $text)
    {
        $this->items[] = [
            'value' => $value,
            'text'  => $text
        ];

        return $this;
    }

    public function third($value, $text)
    {
        $this->items[] = [
            'value' => $value,
            'text'  => $text
        ];

        return $this;
    }

    public function setPrefix($prefix)
    {
        $this->items['prefix'] = $prefix;

        return $this;
    }

    public function reverse()
    {
        $this->items['type'] = 'reverse';

        return $this;
    }

    public function get()
    {
        return $this->items;
    }
}