<?php

namespace Mare06xa\Geckoboard\Classes\DatasetsSQL\Fields;


use Mare06xa\Geckoboard\Abstracts\DatasetFieldSQL;

class Percentage extends DatasetFieldSQL
{
    public function __construct()
    {
        $this->type  = self::PERCENTAGE;

        $this->rules = [
            $this->name => 'number',
            'optional'  => 'boolean'
        ];
    }

    public function isOptional()
    {
        $this->isOptional = true;

        return $this;
    }

    public function toArray()
    {
        $baseArray = parent::toArray();

        $baseArray['optional'] = $this->isOptional;

        return $baseArray;
    }
}