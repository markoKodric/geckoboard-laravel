<?php

namespace Mare06xa\Geckoboard\src\Classes\Widgets\Map;


use Mare06xa\Geckoboard\src\Classes\Widgets\Map\Item\Point;

class Points
{
    protected $points;
    protected $point;

    public function prepareCity($name, $countryCode, $regionCode = "")
    {
        $cityData = (new City())
            ->name($name)
            ->countryCode($countryCode)
            ->regionCode($regionCode)
            ->get();

        $this->point = [
            'city'  => $cityData
        ];

        return $this;
    }

    public function prepareLatitudeLongitude($latitude, $longitude)
    {
        $this->point = [
            'latitude'  => $latitude,
            'longitude' => $longitude
        ];

        return $this;
    }

    public function prepareHost($hostname)
    {
        $this->point = [
            'host' => $hostname
        ];

        return $this;
    }

    public function prepareIP($ipAddress)
    {
        $this->point = [
            'ip' => $ipAddress
        ];

        return $this;
    }

    public function setSize($value)
    {
        $this->point['size'] = $value;

        return $this;
    }

    public function setColor($value)
    {
        $this->point['color'] = $value;

        return $this;
    }

    public function add()
    {
        $this->points[] = $this->point;

        return $this;
    }

    public function get()
    {
        return $this->points;
    }
}