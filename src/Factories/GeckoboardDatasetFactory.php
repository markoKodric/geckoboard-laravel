<?php

namespace Mare06xa\Geckoboard\Factories;


use Mare06xa\Geckoboard\Classes\Datasets\Dataset;
use Mare06xa\Geckoboard\Classes\DatasetsSQL\DatasetSQL;
use Symfony\Component\Yaml\Yaml;

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

    public function loadDatasetFromFile($path, $datasetID)
    {
        $datasetConfig = Yaml::parse(file_get_contents($path))[$datasetID];

        if ($datasetConfig['type'] == 'sql') {
            $dataset = new DatasetSQL();
        } else {
            $dataset = new Dataset();
        }

        $dataset->setID($datasetID);
        $this->prepareSchema($dataset, $datasetConfig);

        return $dataset;
    }

    protected function prepareSchema(&$dataset, $config)
    {
        foreach ($config['schema'] as $key => $value) {
            $field = $this->getFieldObject($dataset, $value['type']);

            $newField = $dataset->schema()
                ->add($field)
                ->setKey($key)
                ->setName($value['name']);

            if (array_key_exists('unique', $value) && $value['unique']) {
                $newField->isUnique();
            }

            if (array_key_exists('optional', $value) && $value['optional']) {
                $newField->isOptional();
            }
        }
    }

    protected function getFieldObject($dataset, $type)
    {
        $fieldsNamespace = $dataset instanceof Dataset ?
            "Mare06xa\Geckoboard\Classes\Datasets\Fields\\"   :
            "Mare06xa\Geckoboard\Classes\DatasetsSQL\Fields\\";

        switch ($type) {
            case 'date':       $class = $fieldsNamespace . "Date"; return new $class; break;
            case 'datetime':   $class = $fieldsNamespace . "Datetime"; return new $class; break;
            case 'money':      $class = $fieldsNamespace . "Money"; return new $class; break;
            case 'number':     $class = $fieldsNamespace . "Number"; return new $class; break;
            case 'percentage': $class = $fieldsNamespace . "Percentage"; return new $class; break;
            case 'string':     $class = $fieldsNamespace . "StringType"; return new $class; break;
            default:           $class = $fieldsNamespace . "Date"; return new $class; break;
        }
    }

    public function withDB()
    {
        $this->withSqlSupport = true;

        return $this;
    }
}