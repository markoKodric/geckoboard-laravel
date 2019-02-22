<?php

namespace Mare06xa\Geckoboard\src\Classes\Widgets\Map;


class City
{
    protected $name;
    protected $countryCode;
    protected $regionCode;

    public function name($value)
    {
        $this->name = $value;

        return $this;
    }

    public function countryCode($value)
    {
        $this->countryCode = $value;

        return $this;
    }

    public function regionCode($value)
    {
        $this->regionCode = $value;

        return $this;
    }

    public function get()
    {
        return $this->toArray();
    }

    protected function toArray()
    {
        $city = [
            'city_name' => $this->name,
            'country_code' => $this->countryCode,
        ];

        if ($this->regionCode !== null)
        {
            $city['region_code'] = $this->regionCode;
        }

        return $city;
    }
}