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
     * @param string $id document identifier
     * @param array $options Optional parameters
     * @return \Kuzzle\Document
     */
    public function create(KuzzleDocumentInterface $document, $index, $collection, $id = '', array $options = [])
    {
        $kuzzleDataCollection = $this->dataCollectionFactory($collection, $index);

        return $kuzzleDataCollection->createDocument($document->toKuzzleDocument(), $id, $options);
    }

    /**
     * Create a document in Kuzzle from array
     *
     * @param array $document
     * @param string $index
     * @param string $collection
     * @param string $id document identifier
     * @param array $options Optional parameters
     * @return \Kuzzle\Document
     */
    public function createDocument($document, $index, $collection, $id = '', array $options = [])
    {
        $kuzzleDataCollection = $this->dataCollectionFactory($collection, $index);

        return $kuzzleDataCollection->createDocument($document, $id, $options);
    }

    /**
     * Retrieve a document from Kuzzle from his id
     *
     * @param string $documentId
     * @param string $index
     * @param string $collection
     * @param array $options Optional parameters
     * @return \Kuzzle\Document
     */
    public function getDocument($documentId, $index, $collection, array $options = [])
    {
        $kuzzleDataCollection = $this->dataCollectionFactory($collection, $index);

        return $kuzzleDataCollection->fetchDocument($documentId, $options);
    }

    /**
     * Update a document in kuzzle from array
     *
     * @param string $documentId
     * @param array $document
     * @param string $index
     * @param string $collection
     * @param array $options Optional parameters
     * @return \Kuzzle\Document
     */
    public function updateDocument($documentId, $document, $index, $collection, array $options = [])
    {
        $kuzzleDataCollection = $this->dataCollectionFactory($collection, $index);

        return $kuzzleDataCollection->updateDocument($documentId, $document, $options);
    }

    /**
     * Delete all documents in Kuzzle matching filters
     *
     * @param array $filters
     * @param string $index
     * @param string $collection
     * @param array $options Optional parameters
     * @return integer|integer[]
     */
    public function deleteDocuments($filters, $index, $collection, array $options = [])
    {
        $kuzzleDataCollection = $this->dataCollectionFactory($collection, $index);

        return $kuzzleDataCollection->deleteDocument($filters, $options);
    }

    /**
     * Perform a search in Kuzzle
     *
     * @param array $searchRequest
     * @param string $index
     * @param string $collection
     * @param array $options Optional parameters
     * @return \Kuzzle\Util\AdvancedSearchResult
     */
    public function search($searchRequest, $index, $collection, array $options = [])
    {
        $kuzzleDataCollection = $this->dataCollectionFactory($collection, $index);
        $searchResult = $kuzzleDataCollection->advancedSearch($searchRequest, $options);

        return $searchResult;
    }
}
