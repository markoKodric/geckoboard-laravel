<?php

namespace Mare06xa\Geckoboard\Classes\Datasets;


use Mare06xa\Geckoboard\Classes\Validations\DatasetFieldValidator;
use Mare06xa\Geckoboard\Helpers\DatasetClient;

class Dataset
{
    protected $schema;
    protected $datasetID;
    protected $apiToken;
    protected $uniqueColumns;

    public function __construct()
    {
        $this->schema = new Schema();
    }

    protected function prepareData(): array
    {
        $fieldsData = [
            'data' => []
        ];

        for ($i = 0; $i < $this->schema()->dataCount(); $i++) {
            $singleData = [];
            foreach ($this->schema()->get() as $field) {
                if ($field->dataSize() > $i) {
                    $singleData[$field->getKey()] = $field->getData()[$i];
                }
            }

            $fieldsData['data'][] = $singleData;
        }

        return $fieldsData;
    }

    protected function prepareSchema(): array
    {
        $schemaData = [
            'fields'    => [],
            'unique_by' => []
        ];

        if (!$this->schema()->isEmpty()) {
            foreach ($this->schema()->get() as $field) {
                $schemaData['fields'][$field->getKey()] = $field->toArray();

                if ($field->isUnique) {
                    $schemaData['unique_by'][] = $field->getKey();
                }
            }
        }

        return $schemaData;
    }

    public function schema()
    {
        return $this->schema;
    }

    /**
     * @param $datasetID
     * @throws \Exception
     */
    function setID($datasetID)
    {
        $datasetIdEmpty = empty(trim($datasetID));

        if ($datasetIdEmpty) {
            throw new \Exception('DatasetSQL ID must not be empty.');
        }

        $datasetIdWrongFormat = !preg_match("/([a-zA-Z0-9.]+)/", trim($datasetID));

        if ($datasetIdWrongFormat) {
            throw new \Exception('DatasetSQL ID is in wrong format.');
        }

        $this->datasetID = trim($datasetID);
    }

    /**
     * @param $apiToken
     * @throws \Exception
     */
    function setApiToken($apiToken)
    {
        $apiTokenEmpty = empty(trim($apiToken));

        if ($apiTokenEmpty) {
            throw new \Exception('API token must not be empty.');
        }

        $this->apiToken = trim($apiToken);
    }

    /**
     * @param DatasetFieldValidator $validator
     * @throws \Exception
     */
    function validateData(DatasetFieldValidator $validator)
    {
        $validator->validate();
    }

    /**
     * @return \Exception|\Psr\Http\Message\ResponseInterface
     * @throws \Exception
     */
    function applySchema()
    {
        $client = new DatasetClient();

        if ($this->apiToken !== null) {
            $client->setApiToken($this->apiToken);
        }

        $putData = $this->prepareSchema();

        return $client->put($this->datasetID, $putData);
    }

    /**
     * @return \Exception|\Psr\Http\Message\ResponseInterface
     * @throws \Exception
     */
    function appendData()
    {
        $client = new DatasetClient();

        if ($this->apiToken !== null) {
            $client->setApiToken($this->apiToken);
        }

        $postData = $this->prepareData();

        return $client->post($this->datasetID, $postData);
    }

    /**
     * @return \Exception|\Psr\Http\Message\ResponseInterface
     * @throws \Exception
     */
    function replaceData()
    {
        $client = new DatasetClient();

        if ($this->apiToken !== null) {
            $client->setApiToken($this->apiToken);
        }

        $putData = $this->prepareData();

        return $client->update($this->datasetID, $putData);
    }

    /**
     * @return \Exception|\Psr\Http\Message\ResponseInterface
     * @throws \Exception
     */
    function clearData()
    {
        $client = new DatasetClient();

        if ($this->apiToken !== null) {
            $client->setApiToken($this->apiToken);
        }

        $putData = [
            'data' => []
        ];

        return $client->put($this->datasetID, $putData);
    }

    /**
     * @return \Exception|\Psr\Http\Message\ResponseInterface
     * @throws \Exception
     */
    function deleteDataset()
    {
        $client = new DatasetClient();

        if ($this->apiToken !== null) {
            $client->setApiToken($this->apiToken);
        }

        return $client->delete($this->datasetID);
    }

    function uniqueColumns(array $columnTypes)
    {
        $this->uniqueColumns = $columnTypes;

        return $this;
    }
}