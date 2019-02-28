<?php

namespace Mare06xa\Geckoboard\Classes\Widgets\LineChart\Axis;

use Mare06xa\Geckoboard\Enums\Format;

class yAxis
{
    protected $format = Format::DECIMAL;
    protected $unit;
    protected $data;

    public function setFormat($format)
    {
        $this->format = $format;

        return $this;
    }

    /**
     * Variable $unit must be an ISO 4217 currency code.
     * Examples: "GBP", "USD", "EUR",...
     *
     * @param string $unit
     * @return yAxis
     */
    public function setCurrency($unit)
    {
        $this->format = Format::CURRENCY;
        $this->unit = $unit;

        return $this;
    }

    public function getFormat()
    {
        return $this->format;
    }

    public function getLines()
    {
        return $this->data;
    }

    public function getCurrency()
    {
        return $this->unit;
    }

    /**
     * @param array $data
     * @param string $name
     * @param $incompleteFrom
     * @return yAxis
     */
    public function addLine($data, $name, $incompleteFrom = "")
    {
        $this->data[] = [
            "name"            => $name,
            "data"            => $data,
            "incomplete_from" => $incompleteFrom,
        ];

        return $this;
    }

    public function isCurrency()
    {
        return $this->format == Format::CURRENCY;
    }
}
