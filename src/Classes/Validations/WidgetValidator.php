<?php

namespace Mare06xa\Geckoboard\src\Classes\Validations;


use Illuminate\Support\Facades\Validator;

class WidgetValidator
{
    protected $validation;

    /**
     * @param $data
     * @param $rules
     */
    public function __construct($data, $rules)
    {
        $this->validation = Validator::make($data, $rules);
    }

    /**
     * @throws \Exception
     */
    public function validate()
    {
        if ($this->validation->fails()) {
            throw new \Exception(json_encode($this->validation->errors(), true));
        }
    }
}