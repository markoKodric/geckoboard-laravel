<?php

namespace Mare06xa\Geckoboard\Tests;

use TestCase;
use Mare06xa\Geckoboard\src\Geckoboard;
use Mare06xa\Geckoboard\src\Classes\Widgets\BulletGraph\Items;

class BulletGraphTest extends TestCase
{
    public function testConstructor()
    {
        $bulletGraph = Geckoboard::bulletGraph('123');

        $this->assertTrue($bulletGraph->items() == new Items());
    }

    public function testOrientation()
    {
        $bulletGraph = Geckoboard::bulletGraph('123');

        $bulletGraph->setOrientation("TestOrientation");

        $this->assertTrue($bulletGraph->getOrientation() == "TestOrientation");
    }
}
