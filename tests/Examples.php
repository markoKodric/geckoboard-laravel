<?php

namespace Mare06xa\Geckoboard\src\Examples;

use Carbon\Carbon;
use Mare06xa\Geckoboard\Geckoboard;
use Mare06xa\Geckoboard\Enums\Format;
use Mare06xa\Geckoboard\Helpers\Data;
use Mare06xa\Geckoboard\Enums\TextType;
use Mare06xa\Geckoboard\Enums\Orientation;
use Mare06xa\Geckoboard\Enums\MonitoringStatus;
use Mare06xa\Geckoboard\Classes\Widgets\BulletGraph\Item\BulletGraphItem;

class Examples
{
    public function barChartExample()
    {
        $barChart = Geckoboard::barChart("17795-0141ba80-1035-0137-49e3-0ef5e78138a6");

        $barChart->xAxis()->setLabels(Data::getMonths());

        $randomGoals = [];
        $randomData = [];

        for ($i = 0; $i < 12; $i++) {
            $randomGoals[] = rand(70000, 99000);
            $randomData[]  = rand(30000, 99000);
        }

        $barChart->yAxis()
            ->addData($randomGoals, "Plan [€]")
            ->addData($randomData, "Realizacija [€]")
            ->setFormat(Format::CURRENCY)
            ->setCurrency("EUR");

        $barChart->push();
    }

    public function lineChartExample()
    {
        $lineChart = Geckoboard::lineChart('17795-6743b590-11ad-0137-3659-0230f42b8e84');

        $lineChart->xAxis()
            ->setFormat(Format::DATETIME_ISO_8601);

        $lineChart->yAxis()
            ->setFormat(Format::CURRENCY)
            ->setCurrency("EUR")
            ->addLine([1, 2, 3, 4, 5], 'Dobiček [€]', Carbon::now()->addDay()->format('Y-m-d'))
            ->addLine([2, 3, 4, 5, 6], 'Stroški [€]', Carbon::now()->addDay()->format('Y-m-d'));

        $lineChart->push();
    }

    public function geckoMeterExample()
    {
        $geckoMeter = Geckoboard::geckoMeter("");

        $geckoMeter->value(23)
            ->min(0)
            ->max(100);

        $geckoMeter->push();
    }

    public function numberSecondaryStatExample()
    {
        $numberStat = Geckoboard::numberSecondaryStat("17795-293c6db0-1030-0137-49dd-0ef5e78138a6");

        $numberStat->items()->add(700000, "", "€");

        $numberStat->push();
    }

    public function bulletGraphExample()
    {
        $bulletGraph = Geckoboard::bulletGraph('');

        $bulletGraph->setOrientation(Orientation::HORIZONTAL);

        $itemNo1 = new BulletGraphItem();

        $itemNo1->setLabel("Revenue 2014 YTD")
            ->setAxisData([0, 200, 400, 600, 800, 1000]);

        $itemNo1->range()
            ->red(0, 400)
            ->amber(401, 700)
            ->green(701, 1000);

        $itemNo1->measure()
            ->current(0, 400)
            ->projected(100, 900);

        $itemNo1->setComparative(600);

        $itemNo2 = new BulletGraphItem();

        $itemNo2->setLabel("Revenue 2015 YTD")
            ->setAxisData([0, 200, 400, 600, 800, 1000]);

        $itemNo2->range()
            ->red(0, 400)
            ->amber(401, 700)
            ->green(701, 1000);

        $itemNo2->measure()
            ->current(0, 400)
            ->projected(100, 900);

        $itemNo2->setComparative(600);

        $bulletGraph->items()
            ->add($itemNo1)
            ->add($itemNo2);

        $bulletGraph->push();
    }

    public function funnelExample()
    {
        $funnel = Geckoboard::funnel('');

        $funnel->items()
            ->add(87809, "Step 1")
            ->add(70022, "Step 2")
            ->add(63232, "Step 3")
            ->add(53232, "Step 4")
            ->add(32123, "Step 5")
            ->add(23232, "Step 6")
            ->add(12232, "Step 7")
            ->add(2323, "Step 8");

        $funnel->push();
    }

    public function monitoringExample()
    {
        $monitoring = Geckoboard::monitoring('');

        $monitoring->status(MonitoringStatus::UP)
            ->downTime("9 days ago")
            ->msResponseTime(593);

        $monitoring->push();
    }

    public function textExample()
    {
        $text = Geckoboard::text("");

        $text->items()
            ->add("Unfortunately, as you probably already know, people")
            ->add("As you might know, I am a full time Internet", TextType::ALERT);

        $text->push();
    }

    public function RAGExample()
    {
        $RAG = Geckoboard::RAG("");

        $RAG->items()
            ->first(16, "Long past due")
            ->second(64, "Overdue")
            ->third(32, "Due")
            ->reverse()
            ->setPrefix("€");

        $RAG->push();
    }

    public function listExample()
    {
        $list = Geckoboard::list("");

        $list->items()
            ->add("Chrome", "40327 visits", "New!")
            ->add("Safari", "11577 visits", "New!", "#00FF00")
            ->add("Firefox", "10295 visits")
            ->add("Internet Explorer", "3578 visits")
            ->add("Opera", "499 visits");

        $list->push();
    }

    public function pieChartExample()
    {
        $pieChart = Geckoboard::pieChart("");

        $pieChart->items()
            ->add(100, "May", "#13699C")
            ->add(160, "June", "#198ACD")
            ->add(300, "July", "#60B8EC")
            ->add(140, "August", "#A4D7F4");

        $pieChart->push();
    }

    public function mapExample()
    {
        $map = Geckoboard::map("");

        $map->points()
            ->prepareCity("London", "GB")
            ->setSize(10)
            ->add();

        $map->points()
            ->prepareCity("San Francisco", "US")
            ->add();

        $map->points()
            ->prepareLatitudeLongitude("22.2670", "114.1880")
            ->setColor("#D8F709")
            ->add();

        $map->points()
            ->prepareLatitudeLongitude("-33.94336", "18.896484")
            ->setSize(5)
            ->add();

        $map->points()
            ->prepareHost("geckoboard.com")
            ->setColor("#77DD77")
            ->setSize(6)
            ->add();

        $map->points()
            ->prepareIP("178.125.193.227")
            ->add();

        $map->push();
    }
}
