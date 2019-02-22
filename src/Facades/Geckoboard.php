<?php

namespace Mare06xa\Geckoboard\src\Facades;


use Illuminate\Support\Facades\Facade;

class Geckoboard extends Facade
{

    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'geckoboard';
    }
}