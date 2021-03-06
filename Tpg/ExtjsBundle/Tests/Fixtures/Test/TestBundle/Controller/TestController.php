<?php
namespace Test\TestBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Tpg\ExtjsBundle\Annotation as Extjs;

class TestController extends Controller {

    /**
     * @Extjs\Direct
     */
    public function testAction() {
        return new JsonResponse(array('result'=>'test'));
    }

    public function notApiAction() {
        return new JsonResponse(array('result'=>false));
    }

    /**
     * @Extjs\Direct
     */
    public function test2Action($id) {
        return new JsonResponse(array('result'=>$id));
    }
}