<?php

namespace Mare06xa\Geckoboard\Abstracts;

use Mare06xa\Geckoboard\Classes\Validations\DatasetFieldValidator;

abstract class DatasetField extends DatasetFieldSQL
{
    /**
     * @param mixed $data
     * @return $this
     */
    public function addData($data)
    {
        if (is_array($data)) {
            foreach ($data as $value) {
                $this->data[] = $value;
                $this->dataCount++;
            }

            return $this;
        }

        $this->data[] = $data;
        $this->dataCount++;

        return $this;
    }

    public function getData()
    {
        return $this->data;
    }

    public function dataSize()
    {
        return $this->dataCount;
    }

    /**
     * @throws \Exception
     */
    function validateData()
    {
        (new DatasetFieldValidator($this->data, $this->rules))->validate();
    }
}
