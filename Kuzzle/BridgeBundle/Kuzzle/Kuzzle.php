<?php

namespace Kuzzle\BridgeBundle\Kuzzle;

use \Kuzzle\Kuzzle as BaseKuzzle;

class Kuzzle extends BaseKuzzle
{
    protected $host;

    protected $port;

    public function __construct($host, $port)
    {
        $this->host = $host;
        $this->port = $port;

        parent::__construct($host.':'.$port);
    }

    /**
     * Create a document in Kuzzle from object implementing KuzzleDocumentInterface
     *
     * @param KuzzleDocumentInterface $document
     * @param $index
     * @param $collection
     */
    public function create(KuzzleDocumentInterface $document, $index, $collection)
    {
        $kuzzleDataCollection = $this->dataCollectionFactory($collection, $index);

        $kuzzleDataCollection->createDocument($document->toKuzzleDocument());
    }

    /**
     * * Create a document in Kuzzle from array
     *
     * @param $document array
     * @param $index
     * @param $collection
     */
    public function createDocument($document, $index, $collection)
    {
        $kuzzleDataCollection = $this->dataCollectionFactory($collection, $index);

        $kuzzleDataCollection->createDocument($document);
    }

    /**
     * Retrieve a document from Kuzzle from his id
     *
     * @param $documentId
     * @param $index
     * @param $collection
     * @return \Kuzzle\Document
     */
    public function getDocument($documentId, $index,  $collection)
    {
        $kuzzleDataCollection = $this->dataCollectionFactory($collection, $index);

        return $kuzzleDataCollection->fetchDocument($documentId);
    }

    /**
     * Update a document in kuzzle from array
     *
     *
     * @param $documentId
     * @param $document
     * @param $index
     * @param $collection
     * @return \Kuzzle\Document
     */
    public function updateDocument($documentId, $document, $index, $collection)
    {
        $kuzzleDataCollection = $this->dataCollectionFactory($collection, $index);

        return $kuzzleDataCollection->updateDocument($documentId, $document);
    }

    /**
     * Delete all documents in Kuzzle matching filters
     *
     * @param $filters
     * @param $index
     * @param $collection
     */
    public function deleteDocuments($filters, $index,  $collection)
    {
        $kuzzleDataCollection = $this->dataCollectionFactory($collection, $index);

        $kuzzleDataCollection->deleteDocument($filters);
    }

    /**
     * Perform a search in Kuzzle
     *
     * @param $searchRequest
     * @param $index
     * @param $collection
     * @return \Kuzzle\Util\AdvancedSearchResult
     */
    public function search($searchRequest, $index, $collection)
    {
        $kuzzleDataCollection = $this->dataCollectionFactory($collection, $index);
        $searchResult = $kuzzleDataCollection->advancedSearch($searchRequest);

        return $searchResult;
    }
}
