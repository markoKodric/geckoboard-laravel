<?php

namespace Mare06xa\Geckoboard\Classes\Widgets\BarChart\Axis;


use Mare06xa\Geckoboard\Enums\Format;

class xAxis
{
    protected $labels;
    protected $type = Format::STANDARD;

    public function setFormat(string $format)
    {
        $this->type = $format;

        return $this;
    }

    public function setLabels(array $labels)
    {
        $this->labels = $labels;

        return $this;
    }

    public function getLabels()
    {
        return $this->labels;
    }

    public function addLabel(string $label)
    {
        $this->labels[] = $label;

        return $this;
    }

    public function getFormat()
    {
        return $this->type;
    }
}