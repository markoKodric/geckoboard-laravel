<?php

namespace Mare06xa\Geckoboard\Classes\Datasets\Fields;


use Mare06xa\Geckoboard\Abstracts\DatasetField;

class Datetime extends DatasetField
{
    public function __construct()
    {
        $this->type  = self::DATETIME;

        $this->rules = [
            $this->name => 'date'
        ];
    }
}