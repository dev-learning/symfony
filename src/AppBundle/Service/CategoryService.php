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
     * @param $categoryName
     * @return Category
     */
    public function getCategoryByName($categoryName)
    {
        try {
            $category = $this->repository->findOneBy(['name' => $categoryName]);
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
        return $this->repository->findBy(['name' => $categoryName]);
    }
}