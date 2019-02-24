<?php

namespace Mare06xa\Geckoboard\Factories;


use Mare06xa\Geckoboard\Classes\Datasets\Dataset;
use Mare06xa\Geckoboard\Classes\DatasetsSQL\DatasetSQL;

class GeckoboardDatasetFactory
{
    protected $withSqlSupport = false;

    public function createDataset($datasetID)
    {
        if ($this->withSqlSupport) {
            $dataset = new DatasetSQL();
        } else {
            $dataset = new Dataset();
        }

        $dataset->setID($datasetID);

        return $dataset;
    }

    public function withDB()
    {
        $this->withSqlSupport = true;

        return $this;
    }
}