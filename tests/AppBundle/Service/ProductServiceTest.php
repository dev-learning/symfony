<?php

namespace Tests\AppBundle\Service;

use AppBundle\Entity\Product;
use AppBundle\Service\ProductService;
use Doctrine\Common\Persistence\ObjectRepository;

class ProductServiceTest extends \PHPUnit_Framework_TestCase
{
    public function testProductServiceGetAllActiveProducts()
    {
        $products = [];
        $products[0] = new Product();
        $products[0]->setIsActive(true);

        $products[1] = new Product();

        $repository = $this->getMockBuilder(ObjectRepository::class)
            ->getMock();

        $repository->expects(self::any())
            ->method('findBy')
            ->with(['isActive' => true])
            ->will(self::returnValue($products));

        $service = new ProductService($repository);
        var_dump($service->getAllActiveProducts());exit;
        self::assertEquals($products, $service->getAllActiveProducts());
    }


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