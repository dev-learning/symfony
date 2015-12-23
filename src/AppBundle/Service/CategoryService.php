<?php

namespace AppBundle\Service;

use AppBundle\Entity\Category;
use Doctrine\Common\Persistence\ObjectRepository;

class CategoryService
{
    const CATEGORY_NOT_FOUND = 'Category not found';

    /**
     * @var ObjectRepository
     */
    private $repository;

    /**
     * @param ObjectRepository $repository
     */
    public function __construct(ObjectRepository $repository)
    {
        $this->repository = $repository;
    }


    /**
     * @return Categories
     */
    public function getAllActiveCategories()
    {
        return $this->repository->findBy(['isActive' => 1]);
    }

    /**
     * @param $categoryName
     * @return Category
     */
    public function getCategoryByName($categoryName)
    {
        try {
            $category = $this->repository->findOneBy(['name' => $categoryName, 'isActive' => 1]);
        } catch (\Exception $e) {
            $category = new Category(self::CATEGORY_NOT_FOUND);
        }
        return $category;
    }

    /**
     * @param $categoryName
     * @return Category
     */
    public function getProductsByCategoryName($categoryName)
    {
        try {
            $category = $this->repository->findOneBy(['name' => $categoryName, 'isActive' => 1]);
        } catch (\Exception $e) {
            $category = new Category(self::CATEGORY_NOT_FOUND);
        }
        return $category;
    }
}