<?php

namespace Mare06xa\Geckoboard\Classes\DatasetsSQL\Fields;


use Mare06xa\Geckoboard\Abstracts\DatasetFieldSQL;

class Date extends DatasetFieldSQL
{
    public function __construct()
    {
        $this->type  = self::DATE;

        $this->rules = [
            $this->type => 'date_format:Y-m-d'
        ];
    }
}