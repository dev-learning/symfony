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
            ->with(['name' => $categoryName]); // actual test
        $service = new CategoryService($repository);
        $service->getCategoryByName($categoryName);
    }

    public function testCategoryServiceReturnsNotFoundCategoryWhenCategoryNameIsNotFound()
    {
        $repository = $this->getMockBuilder(ObjectRepository::class)
            ->getMock();

        $repository->expects(self::once())
            ->method('findOneBy')
            ->willThrowException(new \Exception());

        $service = new CategoryService($repository);
        $category = $service->getCategoryByName('unknown category');
        self::assertEquals(CategoryService::CATEGORY_NOT_FOUND, $category->getName());
    }
}
