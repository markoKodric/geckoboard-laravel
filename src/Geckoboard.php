<?php

namespace Mare06xa\Geckoboard;

use Mare06xa\Geckoboard\Factories\GeckoboardWidgetFactory;
use Mare06xa\Geckoboard\Factories\GeckoboardDatasetFactory;
use Mare06xa\Geckoboard\Factories\GeckoboardDatasetSQLFactory;
use Mare06xa\Geckoboard\Factories\GeckoboardWidgetPollingFactory;

class Geckoboard
{
    public static function pushAPI()
    {
        return new GeckoboardWidgetFactory();
    }

    public static function pollingAPI()
    {
        return new GeckoboardWidgetPollingFactory();
    }

    public static function datasetAPI()
    {
        return new GeckoboardDatasetFactory();
    }
}
