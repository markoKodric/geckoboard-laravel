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

class GeckoboardWidgetPollingFactory
{
    public function barChart()
    {
        return new BarChart();
    }

    public function pieChart()
    {
        return new PieChart();
    }

    public function numberSecondaryStat()
    {
        return new NumberSecondaryStat();
    }

    public function lineChart()
    {
        return new LineChart();
    }

    public function leaderBoard()
    {
        return new Leaderboard();
    }

    public function bulletGraph()
    {
        return new BulletGraph();
    }

    public function funnel()
    {
        return new Funnel();
    }

    public function geckoMeter()
    {
        return new GeckoMeter();
    }

    public function monitoring()
    {
        return new Monitoring();
    }

    public function text()
    {
        return new Text();
    }

    public function RAG()
    {
        return new RAG();
    }

    public function list()
    {
        return new PaginatedList();
    }

    public function map()
    {
        return new Map();
    }

    public function highchartJS()
    {
        return new Highchart();
    }
}
