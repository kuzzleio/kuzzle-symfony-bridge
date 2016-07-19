<?php

namespace Kuzzle\BridgeBundle\Kuzzle;

interface KuzzleDocumentInterface
{
    public function toKuzzleDocument();

    public static function fromKuzzleDocument($document);

}