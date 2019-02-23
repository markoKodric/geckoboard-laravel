<?php

namespace Mare06xa\Geckoboard\Classes\Widgets\LineChart\Axis;


use Mare06xa\Geckoboard\Enums\Format;

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

    public function getFormat()
    {
        return $this->type;
    }

    public function addLabel($label)
    {
        $this->labels[] = $label;

        return $this;
    }

    public function isDatetime()
    {
        return $this->type == Format::DATETIME_ISO_8601;
    }
}