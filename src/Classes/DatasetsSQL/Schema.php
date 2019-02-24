<?php

namespace Mare06xa\Geckoboard\Classes\DatasetsSQL;


use Mare06xa\Geckoboard\Classes\DatasetsSQL\Fields\Date;
use Mare06xa\Geckoboard\Classes\DatasetsSQL\Fields\Datetime;
use Mare06xa\Geckoboard\Classes\DatasetsSQL\Fields\Money;
use Mare06xa\Geckoboard\Classes\DatasetsSQL\Fields\Number;
use Mare06xa\Geckoboard\Classes\DatasetsSQL\Fields\Percentage;
use Mare06xa\Geckoboard\Classes\DatasetsSQL\Fields\StringType;

class Schema
{
    protected $fields;

    protected function add($field)
    {
        $this->fields[] = $field;

        return $field;
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