<?php

namespace Kuzzle\BridgeBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        $kuzzle = $this->get('kuzzle_bridge.kuzzle');

        $kuzzle->createDocument(array('test' => 'toto'), 'mst', 'kuzzle_bridge');

        $searchResults = $kuzzle->search([
            'query' => [
                'bool' => [
                    'should' => [
                        'term' => [
                            'test' => 'toto'
                        ]
                    ]
                ]
            ]
        ], 'mst', 'kuzzle_bridge');
        dump($searchResults);
//        dump($searchResults->getDocuments()[0]);

//        $document = $kuzzle->getDocument('AVYCPowJLc03WfnH_hkc', 'mst', 'kuzzle_bridge');
//        dump($document);

        $document = $kuzzle->updateDocument('AVYCVj-bLc03WfnH_hkm', array('toto' => 'test'), 'mst', 'kuzzle_bridge');
        dump($document);

//        $kuzzle->deleteDocuments([
//            'query' => [
//                'bool' => [
//                    'should' => [
//                        'term' => [
//                            'test' => 'toto'
//                        ]
//                    ]
//                ]
//            ]
//        ], 'mst', 'kuzzle_bridge');
        
        

            



        die;



        return $this->render('KuzzleBridgeBundle:Default:index.html.twig');
    }
}
