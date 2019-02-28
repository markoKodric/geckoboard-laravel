<?php

namespace Mare06xa\Geckoboard\Classes\Datasets;

use Mare06xa\Geckoboard\Classes\Datasets\Fields\Date;
use Mare06xa\Geckoboard\Classes\Datasets\Fields\Money;
use Mare06xa\Geckoboard\Classes\Datasets\Fields\Number;
use Mare06xa\Geckoboard\Classes\Datasets\Fields\Datetime;
use Mare06xa\Geckoboard\Classes\Datasets\Fields\Percentage;
use Mare06xa\Geckoboard\Classes\Datasets\Fields\StringType;

class Schema
{
    protected $fields;

    public function add($fieldObject)
    {
        $this->fields[] = $fieldObject;

        return $fieldObject;
    }

    public function addDate()
    {
        $newField = new Date();

        $this->fields[] = $newField;

        return $newField;
    }

    public function addDatetime()
    {
        $newField = new Datetime();

        $this->fields[] = $newField;

        return $newField;
    }

    public function addMoney()
    {
        $newField = new Money();

        $this->fields[] = $newField;

        return $newField;
    }

    public function addNumber()
    {
        $newField = new Number();

        $this->fields[] = $newField;

        return $newField;
    }

    public function addPercentage()
    {
        $newField = new Percentage();

        $this->fields[] = $newField;

        return $newField;
    }

    public function addString()
    {
        $newField = new StringType();

        $this->fields[] = $newField;

        return $newField;
    }

    public function get()
    {
        return $this->fields;
    }

    public function dataCount()
    {
        $maxVal = 0;

        foreach ($this->fields as $field) {
            if ($maxVal < $field->dataSize()) {
                $maxVal = $field->dataSize();
            }
        }

        return $maxVal;
    }

    public function isEmpty()
    {
        return count($this->fields) == 0;
    }
}
