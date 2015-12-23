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

        $product = new Product();

        $repository->expects(self::once())
            ->method('findOneBy')
            ->with(['path' => $productPath])
            ->will(self::returnValue($product->setPath($productPath)));

        $service = new ProductService($repository);
        self::assertEquals($product->setPath($productPath), $service->getProductByPath($productPath));
    }

    public function testProductServiceGetProductById()
    {
        $productId = 5;
        $repository = $this->getMockBuilder(ObjectRepository::class)
            ->getMock();

        $product = new Product();

        $repository->expects(self::once())
            ->method('findOneBy')
            ->with(['id' => $productId])
            ->will(self::returnValue($product->setId($productId)));

        $service = new ProductService($repository);
        self::assertEquals($product->setId($productId), $service->getProductById($productId));
    }
}