<?php

namespace Mare06xa\Geckoboard\Abstracts;

abstract class DatasetFieldSQL
{
    protected $key;
    protected $name;
    protected $type;
    protected $data;
    protected $rules;
    protected $dataCount = 0;

    public $isOptional = false;
    public $isUnique = false;

    const DATE       = 'date';
    const DATETIME   = 'datetime';
    const MONEY      = 'money';
    const NUMBER     = 'number';
    const PERCENTAGE = 'percentage';
    const STRING     = 'string';

    abstract function __construct();

    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    public function setKey($key)
    {
        $this->key = $key;

        return $this;
    }

    public function getKey()
    {
        return $this->key;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getType()
    {
        return $this->type;
    }

    public function isUnique()
    {
        $this->isUnique = true;

        return $this;
    }

    public function isOptional()
    {
        $this->isOptional = true;

        return $this;
    }

    function toArray()
    {
        return [
            'type' => $this->getType(),
            'name' => $this->getName(),
        ];
    }
}
