<?php

namespace Mare06xa\Geckoboard\Classes\DatasetsSQL\Fields;

use Mare06xa\Geckoboard\Abstracts\DatasetFieldSQL;

class Datetime extends DatasetFieldSQL
{
    public function __construct()
    {
        $this->type = self::DATETIME;

        $this->rules = [
            $this->name => 'date',
        ];
    }
}
