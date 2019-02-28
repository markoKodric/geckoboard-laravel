<?php

namespace Mare06xa\Geckoboard\Classes\Datasets\Fields;

use Mare06xa\Geckoboard\Abstracts\DatasetField;

class StringType extends DatasetField
{
    public function __construct()
    {
        $this->type = self::STRING;

        $this->rules = [
            $this->name => 'string|max:100',
        ];
    }
}
