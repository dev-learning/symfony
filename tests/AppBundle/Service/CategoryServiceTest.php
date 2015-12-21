<?php

namespace Tests\AppBundle\Service;

use AppBundle\Entity\Category;
use AppBundle\Entity\Product;
use AppBundle\Service\CategoryService;
use Doctrine\Common\Persistence\ObjectRepository;

class CategoryServiceTest extends \PHPUnit_Framework_TestCase
{
    public function testCategoryServiceCanFindCategoriesByTheirName()
    {
        $categoryName = 'baz';
        $repository = $this->getMockBuilder(ObjectRepository::class)
            ->getMock();

        $repository->expects(self::once())
            ->method('findOneBy')
            ->with(['name' => $categoryName]) // actual test
            ->will(self::returnValue(new Category($categoryName)));

        $service = new CategoryService($repository);
        self::assertEquals(new Category($categoryName), $service->getCategoryByName($categoryName));
    }

    public function testCategoryServiceFindProductsByCategoryName()
    {
        $categoryName = 'foo';

        $category = new Category($categoryName);
        $category->setProducts([new Product('foo', 'foo', 1.95), new Product('bar', 'bar', 1.95)]);

        $categoryForService = new Category($categoryName);
        $products = [new Product('foo', 'foo', 1.95), new Product('bar', 'bar', 1.95)];
        $categoryForService->setProducts($products);

        $repository = $this->getMockBuilder(ObjectRepository::class)
            ->getMock();
        $repository
            ->method('findBy')
            ->with(['name' => $categoryName])
            ->will(self::returnValue($categoryForService));

        $service = new CategoryService($repository);
        self::assertEquals($category, $service->getProductsByCategoryName($categoryName));
    }
}
