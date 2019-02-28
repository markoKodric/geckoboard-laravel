<?php

namespace Mare06xa\Geckoboard\Factories;

use Mare06xa\Geckoboard\Classes\Widgets\Map\Map;
use Mare06xa\Geckoboard\Classes\Widgets\RAG\RAG;
use Mare06xa\Geckoboard\Classes\Widgets\Text\Text;
use Mare06xa\Geckoboard\Classes\Widgets\Funnel\Funnel;
use Mare06xa\Geckoboard\Classes\Widgets\BarChart\BarChart;
use Mare06xa\Geckoboard\Classes\Widgets\PieChart\PieChart;
use Mare06xa\Geckoboard\Classes\Widgets\Highchart\Highchart;
use Mare06xa\Geckoboard\Classes\Widgets\LineChart\LineChart;
use Mare06xa\Geckoboard\Classes\Widgets\GeckoMeter\GeckoMeter;
use Mare06xa\Geckoboard\Classes\Widgets\Monitoring\Monitoring;
use Mare06xa\Geckoboard\Classes\Widgets\BulletGraph\BulletGraph;
use Mare06xa\Geckoboard\Classes\Widgets\Leaderboard\Leaderboard;
use Mare06xa\Geckoboard\Classes\Widgets\PaginatedList\PaginatedList;
use Mare06xa\Geckoboard\Classes\Widgets\NumberSecondaryStat\NumberSecondaryStat;

class GeckoboardWidgetFactory
{
    public function barChart($widgetID)
    {
        $barChart = new BarChart();

        $barChart->setID($widgetID);

        return $barChart;
    }

    public function pieChart($widgetID)
    {
        $pieChart = new PieChart();

        $pieChart->setID($widgetID);

        return $pieChart;
    }

    public function numberSecondaryStat($widgetID)
    {
        $numberSecondaryStat = new NumberSecondaryStat();

        $numberSecondaryStat->setID($widgetID);

        return $numberSecondaryStat;
    }

    public function lineChart($widgetID)
    {
        $lineChart = new LineChart();

        $lineChart->setID($widgetID);

        return $lineChart;
    }

    public function leaderBoard($widgetID)
    {
        $leaderBoard = new Leaderboard();

        $leaderBoard->setID($widgetID);

        return $leaderBoard;
    }

    public function bulletGraph($widgetID)
    {
        $bulletGraph = new BulletGraph();

        $bulletGraph->setID($widgetID);

        return $bulletGraph;
    }

    public function funnel($widgetID)
    {
        $funnel = new Funnel();

        $funnel->setID($widgetID);

        return $funnel;
    }

    public function geckoMeter($widgetID)
    {
        $geckoMeter = new GeckoMeter();

        $geckoMeter->setID($widgetID);

        return $geckoMeter;
    }

    public function monitoring($widgetID)
    {
        $monitoring = new Monitoring();

        $monitoring->setID($widgetID);

        return $monitoring;
    }

    public function text($widgetID)
    {
        $text = new Text();

        $text->setID($widgetID);

        return $text;
    }

    public function RAG($widgetID)
    {
        $RAG = new RAG();

        $RAG->setID($widgetID);

        return $RAG;
    }

    public function list($widgetID)
    {
        $list = new PaginatedList();

        $list->setID($widgetID);

        return $list;
    }

    public function map($widgetID)
    {
        $map = new Map();

        $map->setID($widgetID);

        return $map;
    }

    public function highchartJS($widgetID)
    {
        $highchart = new Highchart();

        $highchart->setID($widgetID);

        return $highchart;
    }
}
