<?php

namespace Mare06xa\Geckoboard\src;

use Mare06xa\Geckoboard\src\Abstracts\Widget;
use Mare06xa\Geckoboard\src\Classes\Widgets\BarChart\BarChart;
use Mare06xa\Geckoboard\src\Classes\Widgets\BulletGraph\BulletGraph;
use Mare06xa\Geckoboard\src\Classes\Widgets\Funnel\Funnel;
use Mare06xa\Geckoboard\src\Classes\Widgets\GeckoMeter\GeckoMeter;
use Mare06xa\Geckoboard\src\Classes\Widgets\Highchart\Highchart;
use Mare06xa\Geckoboard\src\Classes\Widgets\Leaderboard\Leaderboard;
use Mare06xa\Geckoboard\src\Classes\Widgets\LineChart\LineChart;
use Mare06xa\Geckoboard\src\Classes\Widgets\Map\Map;
use Mare06xa\Geckoboard\src\Classes\Widgets\Monitoring\Monitoring;
use Mare06xa\Geckoboard\src\Classes\Widgets\NumberSecondaryStat\NumberSecondaryStat;
use Mare06xa\Geckoboard\src\Classes\Widgets\PaginatedList\PaginatedList;
use Mare06xa\Geckoboard\src\Classes\Widgets\PieChart\PieChart;
use Mare06xa\Geckoboard\src\Classes\Widgets\RAG\RAG;
use Mare06xa\Geckoboard\src\Classes\Widgets\Text\Text;

class Geckoboard
{
    public static function create(Widget $widget, $widgetID)
    {
        $newWidget = new $widget;
        $newWidget->setID($widgetID);

        return $newWidget;
    }

    public static function barChart($widgetID)
    {
        $barChart = new BarChart();
        $barChart->setID($widgetID);

        return $barChart;
    }

    public static function pieChart($widgetID)
    {
        $pieChart = new PieChart();
        $pieChart->setID($widgetID);

        return $pieChart;
    }

    public static function numberSecondaryStat($widgetID)
    {
        $numberSecondaryStat = new NumberSecondaryStat();
        $numberSecondaryStat->setID($widgetID);

        return $numberSecondaryStat;
    }

    public static function lineChart($widgetID)
    {
        $lineChart = new LineChart();
        $lineChart->setID($widgetID);

        return $lineChart;
    }

    public static function leaderBoard($widgetID)
    {
        $leaderBoard = new Leaderboard();
        $leaderBoard->setID($widgetID);

        return $leaderBoard;
    }

    public static function bulletGraph($widgetID)
    {
        $bulletGraph = new BulletGraph();
        $bulletGraph->setID($widgetID);

        return $bulletGraph;
    }

    public static function funnel($widgetID)
    {
        $funnel = new Funnel();
        $funnel->setID($widgetID);

        return $funnel;
    }

    public static function geckoMeter($widgetID)
    {
        $geckoMeter = new GeckoMeter();
        $geckoMeter->setID($widgetID);

        return $geckoMeter;
    }

    public static function monitoring($widgetID)
    {
        $monitoring = new Monitoring();
        $monitoring->setID($widgetID);

        return $monitoring;
    }

    public static function text($widgetID)
    {
        $text = new Text();
        $text->setID($widgetID);

        return $text;
    }

    public static function RAG($widgetID)
    {
        $RAG = new RAG();
        $RAG->setID($widgetID);

        return $RAG;
    }

    public static function list($widgetID)
    {
        $list = new PaginatedList();
        $list->setID($widgetID);

        return $list;
    }

    public static function map($widgetID)
    {
        $map = new Map();
        $map->setID($widgetID);

        return $map;
    }

    public static function highchartJS($widgetID)
    {
        $highchart = new Highchart();
        $highchart->setID($widgetID);

        return $highchart;
    }
}
