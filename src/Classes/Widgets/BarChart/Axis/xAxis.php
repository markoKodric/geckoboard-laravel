<?php

namespace Mare06xa\Geckoboard\src\Classes\Widgets\BarChart\Axis;


class xAxis
{
    protected $labels;
    protected $type = "";

    public function setFormat($format)
    {
        $this->type = $format;

        return $this;
    }

    public function setLabels($labels)
    {
        $this->labels = $labels;

        return $this;
    }

    public function getLabels()
    {
        return $this->labels;
    }

    public function addLabel($label)
    {
        $this->labels[] = $label;

        return $this;
    }
}