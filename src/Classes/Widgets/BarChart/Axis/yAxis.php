<?php

namespace Mare06xa\Geckoboard\src\Classes\Widgets\BarChart\Axis;


use Mare06xa\Geckoboard\src\Enums\Format;

class yAxis
{
    protected $format;
    protected $unit;
    protected $data;

    public function __construct()
    {
        $this->format = Format::DECIMAL;
    }

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
        $this->unit   = $unit;

        return $this;
    }

    public function getFormat()
    {
        return $this->format;
    }

    public function getData()
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
     * @return yAxis
     */
    public function addData($data, $name = "")
    {
        $this->data[] = [
            "name" => $name,
            "data" => $data
        ];

        return $this;
    }

    public function isCurrency()
    {
        return $this->format == Format::CURRENCY;
    }
}