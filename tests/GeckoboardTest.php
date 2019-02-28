<?php

namespace Mare06xa\Geckoboard\Tests;

use TestCase;
use Mare06xa\Geckoboard\src\Geckoboard;
use Mare06xa\Geckoboard\src\Classes\Widgets\Map\Map;
use Mare06xa\Geckoboard\src\Classes\Widgets\RAG\RAG;
use Mare06xa\Geckoboard\src\Classes\Widgets\Text\Text;
use Mare06xa\Geckoboard\src\Classes\Widgets\Funnel\Funnel;
use Mare06xa\Geckoboard\src\Classes\Widgets\BarChart\BarChart;
use Mare06xa\Geckoboard\src\Classes\Widgets\PieChart\PieChart;
use Mare06xa\Geckoboard\src\Classes\Widgets\Highchart\Highchart;
use Mare06xa\Geckoboard\src\Classes\Widgets\LineChart\LineChart;
use Mare06xa\Geckoboard\src\Classes\Widgets\GeckoMeter\GeckoMeter;
use Mare06xa\Geckoboard\src\Classes\Widgets\Monitoring\Monitoring;
use Mare06xa\Geckoboard\src\Classes\Widgets\BulletGraph\BulletGraph;
use Mare06xa\Geckoboard\src\Classes\Widgets\Leaderboard\Leaderboard;
use Mare06xa\Geckoboard\src\Classes\Widgets\PaginatedList\PaginatedList;
use Mare06xa\Geckoboard\src\Classes\Widgets\NumberSecondaryStat\NumberSecondaryStat;

class GeckoboardTest extends TestCase
{
    public function testDynamicCreate()
    {
        $widget = Geckoboard::create(new BarChart(), '123');

        $widget2 = new BarChart();
        $widget2->setID('123');

        $this->assertTrue($widget == $widget2);
    }

    public function testBarChart()
    {
        $widget = Geckoboard::barChart('123');

        $widget2 = new BarChart();
        $widget2->setID('123');

        $this->assertTrue($widget == $widget2);
    }

    public function testLineChart()
    {
        $widget = Geckoboard::lineChart('123');

        $widget2 = new LineChart();
        $widget2->setID('123');

        $this->assertTrue($widget == $widget2);
    }

    public function testPieChart()
    {
        $widget = Geckoboard::pieChart('123');

        $widget2 = new PieChart();
        $widget2->setID('123');

        $this->assertTrue($widget == $widget2);
    }

    public function testNumberSecondaryStat()
    {
        $widget = Geckoboard::numberSecondaryStat('123');

        $widget2 = new NumberSecondaryStat();
        $widget2->setID('123');

        $this->assertTrue($widget == $widget2);
    }

    public function testLeaderboard()
    {
        $widget = Geckoboard::leaderBoard('123');

        $widget2 = new Leaderboard();
        $widget2->setID('123');

        $this->assertTrue($widget == $widget2);
    }

    public function testBulletGraph()
    {
        $widget = Geckoboard::bulletGraph('123');

        $widget2 = new BulletGraph();
        $widget2->setID('123');

        $this->assertTrue($widget == $widget2);
    }

    public function testFunnel()
    {
        $widget = Geckoboard::funnel('123');

        $widget2 = new Funnel();
        $widget2->setID('123');

        $this->assertTrue($widget == $widget2);
    }

    public function testGeckoMeter()
    {
        $widget = Geckoboard::geckoMeter('123');

        $widget2 = new GeckoMeter();
        $widget2->setID('123');

        $this->assertTrue($widget == $widget2);
    }

    public function testMonitoring()
    {
        $widget = Geckoboard::monitoring('123');

        $widget2 = new Monitoring();
        $widget2->setID('123');

        $this->assertTrue($widget == $widget2);
    }

    public function testText()
    {
        $widget = Geckoboard::text('123');

        $widget2 = new Text();
        $widget2->setID('123');

        $this->assertTrue($widget == $widget2);
    }

    public function testRAG()
    {
        $widget = Geckoboard::RAG('123');

        $widget2 = new RAG();
        $widget2->setID('123');

        $this->assertTrue($widget == $widget2);
    }

    public function testList()
    {
        $widget = Geckoboard::list('123');

        $widget2 = new PaginatedList();
        $widget2->setID('123');

        $this->assertTrue($widget == $widget2);
    }

    public function testMap()
    {
        $widget = Geckoboard::map('123');

        $widget2 = new Map();
        $widget2->setID('123');

        $this->assertTrue($widget == $widget2);
    }

    public function testHighcharts()
    {
        $widget = Geckoboard::highchartJS('123');
        $widget2 = new Highchart();
        $widget2->setID('123');

        $this->assertTrue($widget == $widget2);
    }
}
