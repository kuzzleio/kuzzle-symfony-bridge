<?php

namespace Kuzzle\BridgeBundle\Kuzzle;

interface KuzzleDocumentInterface
{
    /**
     * @return array
     */
    public function toKuzzleDocument();

    /**
     * @param array $document
     * @return KuzzleDocumentInterface
     */
    public static function fromKuzzleDocument($document);

}