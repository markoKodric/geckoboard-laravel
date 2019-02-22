<?php

namespace Mare06xa\Geckoboard\src\Helpers;


use Carbon\Carbon;

class Data
{
    public static function getMonths()
    {
        $months = [];

        for ($i = 1; $i <= 12; $i++) {
            $months[] =  Carbon::parse('2018-' . $i . '-1')->format("M");
        }

        return $months;
    }
}