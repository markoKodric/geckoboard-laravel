<?php

namespace Mare06xa\Geckoboard\Classes\Widgets\NumberSecondaryStat;

class Items
{
    protected $items;
    protected $type;
    protected $comparisonValue;
    protected $trendline;

    protected $isReverse    = false;
    protected $isAbsolute   = false;
    protected $isComparison = false;

    public function setItems($items = [])
    {
        $this->items = $items;

        return $this;
    }

    public function add($value, $text = "", $prefix = "")
    {
        $this->items[] = [
            'text'   => $text,
            'value'  => $value,
            'prefix' => $prefix,
        ];

        return $this;
    }

    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    public function setComparison($value)
    {
        $this->comparisonValue = $value;
        $this->isComparison = true;

        return $this;
    }

    public function setAbsolute()
    {
        $this->isAbsolute = true;

        return $this;
    }

    /*
     * If trendline is used, only 1 item is allowed
     */
    public function setTrendline($data = [])
    {
        $this->trendline = $data;

        return $this;
    }

    public function getTrendline()
    {
        return $this->trendline;
    }

    public function getItems()
    {
        return $this->items;
    }

    public function getType()
    {
        return $this->type;
    }

    public function isReverse()
    {
        return $this->isReverse;
    }

    public function isAbsolute()
    {
        return $this->isReverse;
    }

    public function isComparison()
    {
        return $this->isComparison;
    }

    public function hasTrendline()
    {
        return $this->trendline !== null;
    }
}
