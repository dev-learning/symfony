<?php

namespace Tests\AppBundle\Service;

use AppBundle\Entity\Product;
use AppBundle\Service\ProductService;
use Doctrine\Common\Persistence\ObjectRepository;

class ProductServiceTest extends \PHPUnit_Framework_TestCase
{
    public function testProductServiceGetProductByPath()
    {
        $productPath = 'foo';
        $repository = $this->getMockBuilder(ObjectRepository::class)
            ->getMock();

        $repository->expects(self::once())
            ->method('findOneBy')
            ->with(['path' => $productPath])
            ->will(self::returnValue(new Product($productPath)));

        $service = new ProductService($repository);
        self::assertEquals(new Product($productPath), $service->getProductByPath($productPath));
    }
}