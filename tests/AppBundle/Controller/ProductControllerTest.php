<?php

namespace AppBundle\Controller;

class ProductControllerTest extends \PHPUnit_Framework_TestCase
{
    public function testTest()
    {
        $controller = new ProductController();
        $controller->categoryAction('hallo');
    }
}
