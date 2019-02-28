<?php

namespace Mare06xa\Geckoboard\Classes\Datasets\Fields;

use Mare06xa\Geckoboard\Abstracts\DatasetField;

class Date extends DatasetField
{
    public function __construct()
    {
        $this->type = self::DATE;

        $this->rules = [
            $this->type => 'date_format:Y-m-d',
        ];
    }
}
