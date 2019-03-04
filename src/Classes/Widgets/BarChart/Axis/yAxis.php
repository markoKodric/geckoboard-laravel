<?php

namespace Mare06xa\Geckoboard\Classes\Widgets\BarChart\Axis;

use Mare06xa\Geckoboard\Enums\Format;

class yAxis
{
    protected $format;
    protected $unit;
    protected $data;

    public function __construct()
    {
        $this->format = Format::DECIMAL;
    }

    public function setFormat(string $format)
    {
        $this->format = $format;

        if ($format !== Format::CURRENCY) {
            $this->unit = null;
        }

        return $this;
    }

    /**
     * Variable $unit must be an ISO 4217 currency code.
     * Examples: "GBP", "USD", "EUR",...
     *
     * @param string $unit
     * @return yAxis
     */
    public function setCurrency(string $unit)
    {
        $this->format = Format::CURRENCY;
        $this->unit = $unit;

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

    public function addData(array $data, string $name = "")
    {
        $this->data[] = [
            "name" => $name,
            "data" => $data,
        ];

        return $this;
    }

    public function isCurrency()
    {
        return $this->format == Format::CURRENCY;
    }
}
