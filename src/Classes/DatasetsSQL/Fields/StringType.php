<?php

namespace Mare06xa\Geckoboard\Classes\DatasetsSQL\Fields;

use Mare06xa\Geckoboard\Abstracts\DatasetFieldSQL;

class StringType extends DatasetFieldSQL
{
    public function __construct()
    {
        $this->type = self::STRING;

        $this->rules = [
            $this->name => 'string|max:100',
        ];
    }
}
