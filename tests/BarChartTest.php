<?php

namespace Mare06xa\Geckoboard\Tests;

use Mare06xa\Geckoboard\src\Geckoboard;
use Mare06xa\Geckoboard\src\Enums\Format;
use Mare06xa\Geckoboard\src\Classes\Widgets\BarChart\Axis\xAxis;
use Mare06xa\Geckoboard\src\Classes\Widgets\BarChart\Axis\yAxis;

class BarChartTest extends \TestCase
{
    public function testConstructor()
    {
        $barChart = Geckoboard::barChart('123');

        $this->assertTrue($barChart->xAxis() == new xAxis());
        $this->assertTrue($barChart->yAxis() == new yAxis());
    }

    public function testXAxis()
    {
        $barChart = Geckoboard::barChart('123');

        $barChart->xAxis()->setFormat("TestFormat");
        $this->assertTrue($barChart->xAxis()->getFormat() == "TestFormat");

        $barChart->xAxis()->addLabel("TestLabel");
        $this->assertTrue($barChart->xAxis()->getLabels() == ["TestLabel"]);

        $barChart->xAxis()->setLabels(["TestLabel1", "TestLabel2"]);
        $this->assertTrue($barChart->xAxis()->getLabels() == ["TestLabel1", "TestLabel2"]);
    }

    public function testYAxis()
    {
        $barChart = Geckoboard::barChart('123');

        $this->assertTrue($barChart->yAxis()->getFormat() == Format::DECIMAL);

        $barChart->yAxis()->setFormat("TestFormat");

        $this->assertTrue($barChart->yAxis()->getFormat() == "TestFormat");
        $this->assertTrue($barChart->yAxis()->isCurrency() == false);

        $barChart->yAxis()->setCurrency("TestCurrency");

        $this->assertTrue($barChart->yAxis()->getCurrency() == "TestCurrency");
        $this->assertTrue($barChart->yAxis()->isCurrency() == true);

        $barChart->yAxis()->setFormat("TestFormat");

        $this->assertTrue($barChart->yAxis()->getFormat() == "TestFormat");
        $this->assertTrue($barChart->yAxis()->isCurrency() == false);

        $barChart->yAxis()->addData([1, 2, 3], "Test name");

        $this->assertTrue($barChart->yAxis()->getData() == [
            [
                'name' => "Test name",
                'data' => [1, 2, 3],
            ]
        ]);

        $barChart->yAxis()->addData([2, 4, 8]);

        $this->assertTrue($barChart->yAxis()->getData() == [
            [
                'name' => "Test name",
                'data' => [1, 2, 3],
            ],
            [
                'name' => "",
                'data' => [2, 4, 8],
            ],
        ]);
    }

    public function testEmptyWidgetID()
    {
        $this->expectException(\Exception::class);

        $barChart = Geckoboard::barChart('');
    }

    public function testWrongFormatWidgetID()
    {
        $this->expectException(\Exception::class);

        $barChart = Geckoboard::barChart('17795-6df868$40-197d-0137-facc-025da9c92824');
    }

    public function testPushEmptyData()
    {
        $barChart = Geckoboard::barChart('123');

        $this->expectException(\Exception::class);

        $barChart->push();
    }

    public function testPush()
    {
        $barChart = Geckoboard::barChart('17795-6df86840-197d-0137-facc-025da9c92824');

        $barChart->xAxis()->setLabels(["TestLabel1", "TestLabel2"]);
        $barChart->yAxis()->addData([1, 2, 3], "Test name");

        $apiResponse = $barChart->push();

        $this->assertTrue($apiResponse->getStatusCode() == 200);
    }

    public function testPushWithCurrency()
    {
        $barChart = Geckoboard::barChart('17795-6df86840-197d-0137-facc-025da9c92824');

        $barChart->xAxis()->setLabels(["TestLabel1", "TestLabel2"]);

        $barChart->yAxis()
            ->addData([1, 2, 3], "Test name")
            ->setCurrency("EUR");

        $apiResponse = $barChart->push();

        $this->assertTrue($apiResponse->getStatusCode() == 200);
    }

    public function testPushWithCurrency2()
    {
        $barChart = Geckoboard::barChart('17795-6df86840-197d-0137-facc-025da9c92824');

        $barChart->xAxis()->setLabels(["TestLabel1", "TestLabel2"]);

        $barChart->yAxis()
            ->addData([1, 2, 3], "Test name")
            ->setFormat(Format::CURRENCY)
            ->setCurrency("GBP");

        $apiResponse = $barChart->push();

        $this->assertTrue($apiResponse->getStatusCode() == 200);
    }

    public function testWrongData()
    {
        $barChart = Geckoboard::barChart('17795-6df86840-197d-0137-facc-025da9c92824');

        $barChart->xAxis()
            ->setLabels(["TestLabel1", "TestLabel2"])
            ->setFormat("WrongFormat");

        $barChart->yAxis()
            ->addData([1, 2, 3], "Test name")
            ->setFormat(Format::CURRENCY)
            ->setCurrency("GBP");

        $this->expectException(\Exception::class);

        $barChart->push();
    }

    public function testSetAPITokenEmpty()
    {
        $barChart = Geckoboard::barChart('17795-6df86840-197d-0137-facc-025da9c92824');

        $this->expectException(\Exception::class);

        $barChart->setApiToken('');
    }

    public function testSetAPIToken()
    {
        $barChart = Geckoboard::barChart('17795-6df86840-197d-0137-facc-025da9c92824');

        $barChart->setApiToken('123');

        $this->assertTrue(true);
    }
}
