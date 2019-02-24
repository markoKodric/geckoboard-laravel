<?php

namespace Mare06xa\Geckoboard;

use Mare06xa\Geckoboard\Factories\GeckoboardDatasetFactory;
use Mare06xa\Geckoboard\Factories\GeckoboardDatasetSQLFactory;
use Mare06xa\Geckoboard\Factories\GeckoboardWidgetFactory;

class Geckoboard
{
    public static function widgetAPI()
    {
        return new GeckoboardWidgetFactory();
    }

    public static function datasetAPI()
    {
        return new GeckoboardDatasetFactory();
    }
}
