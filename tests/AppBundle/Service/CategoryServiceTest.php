<?php

namespace Tests\AppBundle\Service;

use AppBundle\Entity\Category;
use AppBundle\Service\CategoryService;
use Doctrine\Common\Persistence\ObjectRepository;

class CategoryServiceTest extends \PHPUnit_Framework_TestCase
{
    public function testCategoryServiceCanFindCategoriesByTheirName()
    {
        $categoryName = 'baz';
        $repository = $this->getMockBuilder(ObjectRepository::class)
            ->getMock();

        $repository->expects(self::exactly(2))
            ->method('findOneBy')
            ->with(['name' => $categoryName]) // actual test
            ->will(self::returnValue(new Category($categoryName)));

        $service = new CategoryService($repository);
        self::assertEquals(new Category($categoryName), $service->getCategoryByName($categoryName));
        self::assertNotEquals(new Category('bar'), $service->getCategoryByName($categoryName));
    }
}
