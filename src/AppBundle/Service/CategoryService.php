<?php

namespace AppBundle\Service;

use AppBundle\Entity\Category;
use Doctrine\Common\Persistence\ObjectRepository;

class CategoryService
{
    /**
     * @var ObjectRepository
     */
    private $repository;

    /**
     * ProductService constructor.
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
        return $this->repository->findOneBy(['name' => $categoryName]);
    }
}