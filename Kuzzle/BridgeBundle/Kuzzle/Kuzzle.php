<?php

namespace Kuzzle\BridgeBundle\Kuzzle;

use \Kuzzle\Kuzzle as BaseKuzzle;

/**
 * Class Kuzzle
 * @package Kuzzle\BridgeBundle\Kuzzle
 */
class Kuzzle extends BaseKuzzle
{
    /** @var string */
    protected $host;

    /** @var integer */
    protected $port;

    /**
     * Kuzzle constructor.
     * @param string $host
     * @param integer $port
     */
    public function __construct($host, $port)
    {
        $this->host = $host;
        $this->port = $port;

        parent::__construct($host, ['port' => $port]);
    }

    /**
     * Create a document in Kuzzle from object implementing KuzzleDocumentInterface
     *
     * @param KuzzleDocumentInterface $document
     * @param string $index
     * @param string $collection
     * @return \Kuzzle\Document
     */
    public function create(KuzzleDocumentInterface $document, $index, $collection)
    {
        $kuzzleDataCollection = $this->dataCollectionFactory($collection, $index);

        return $kuzzleDataCollection->createDocument($document->toKuzzleDocument());
    }

    /**
     * Create a document in Kuzzle from array
     *
     * @param array $document
     * @param string $index
     * @param string $collection
     * @return \Kuzzle\Document
     */
    public function createDocument($document, $index, $collection)
    {
        $kuzzleDataCollection = $this->dataCollectionFactory($collection, $index);

        return $kuzzleDataCollection->createDocument($document);
    }

    /**
     * Retrieve a document from Kuzzle from his id
     *
     * @param string $documentId
     * @param string $index
     * @param string $collection
     * @return \Kuzzle\Document
     */
    public function getDocument($documentId, $index, $collection)
    {
        $kuzzleDataCollection = $this->dataCollectionFactory($collection, $index);

        return $kuzzleDataCollection->fetchDocument($documentId);
    }

    /**
     * Update a document in kuzzle from array
     *
     * @param string $documentId
     * @param array $document
     * @param string $index
     * @param string $collection
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
     * @param array $filters
     * @param string $index
     * @param string $collection
     * @return integer|integer[]
     */
    public function deleteDocuments($filters, $index, $collection)
    {
        $kuzzleDataCollection = $this->dataCollectionFactory($collection, $index);

        return $kuzzleDataCollection->deleteDocument($filters);
    }

    /**
     * Perform a search in Kuzzle
     *
     * @param array $searchRequest
     * @param string $index
     * @param string $collection
     * @return \Kuzzle\Util\AdvancedSearchResult
     */
    public function search($searchRequest, $index, $collection)
    {
        $kuzzleDataCollection = $this->dataCollectionFactory($collection, $index);
        $searchResult = $kuzzleDataCollection->advancedSearch($searchRequest);

        return $searchResult;
    }
}
