<?php

namespace Mare06xa\Geckoboard\Classes\DatasetsSQL;

use Illuminate\Support\Facades\DB;
use Mare06xa\Geckoboard\Classes\Datasets\Dataset;

class DatasetSQL extends Dataset
{
    protected $dbDriver = 'mysql';
    protected $queryBuilder;
    protected $dbData;

    public function __construct()
    {
        parent::__construct();

        $this->queryBuilder = DB::connection($this->dbDriver);
    }

    protected function prepareData(): array
    {
        $fieldsData = [
            'data' => []
        ];


        foreach ($this->dbData->toArray() as $dataRow) {
            $singleData = [];
            $i = 0;

            foreach ($this->schema()->get() as $field) {
                if (count(array_values((array) $dataRow)) > $i) {
                    $singleData[$field->getKey()] = array_values((array) $dataRow)[$i];
                }
                $i++;
            }

            $fieldsData['data'][] = $singleData;
        }

        return $fieldsData;
    }

    public function dbQuery()
    {
        return $this->queryBuilder;
    }

    /**
     * @param $dbDriver
     * @throws \Exception
     */
    function setDB($dbDriver)
    {
        $dbDriverEmpty = empty(trim($dbDriver));

        if ($dbDriverEmpty) {
            throw new \Exception('DB driver must not be empty.');
        }

        $this->dbDriver = trim($dbDriver);
    }

    public function setQuery($dbQuery)
    {
        $this->queryBuilder = $dbQuery;

        return $this;
    }

    public function setData($dbData)
    {
        $this->dbData = $dbData;

        return $this;
    }
}