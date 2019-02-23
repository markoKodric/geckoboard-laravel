<?php

namespace Mare06xa\Geckoboard\src\Classes\Widgets\BarChart\Axis;


class xAxis
{
    protected $labels;
    protected $type = "";

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