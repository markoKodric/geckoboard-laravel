<?php

namespace Mare06xa\Geckoboard;


use Illuminate\Support\Facades\Facade;

class GeckoboardFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'geckoboard';
    }
}