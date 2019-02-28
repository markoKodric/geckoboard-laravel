<?php

namespace Mare06xa\Geckoboard\Classes\Widgets\BulletGraph\Item;

class BulletGraphItem
{
    protected $label;
    protected $sublabel;
    protected $axis;
    protected $range;
    protected $measure;
    protected $comparative;

    public function __construct()
    {
        $this->range   = new Range();
        $this->measure = new Measure();
    }

    public function setLabel($value)
    {
        $this->label = $value;

        return $this;
    }

    public function setSublabel($value)
    {
        $this->sublabel = $value;

        return $this;
    }

    public function setAxisData($data)
    {
        $this->axis = $data;

        return $this;
    }

    public function setComparative($value)
    {
        $this->comparative = $value;

        return $this;
    }

    public function getLabel()
    {
        return $this->label;
    }

    public function getSublabel()
    {
        return $this->sublabel;
    }

    public function getAxisData()
    {
        return $this->axis;
    }

    public function getComparative()
    {
        return $this->comparative;
    }

    public function range()
    {
        return $this->range;
    }

    public function measure()
    {
        return $this->measure;
    }
}
