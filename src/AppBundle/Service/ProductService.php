<?php

namespace AppBundle\Service;

use AppBundle\Entity\Product;
use Doctrine\Common\Persistence\ObjectRepository;

class ProductService
{
    CONST CATEGORY_SERVICE_IS_NOT_AVAILABLE = 'Category service is not available';

    /**
     * @var ObjectRepository
     */
    private $repository;

    /**
     * @var CategoryService
     */
    private $categoryService;

    /**
     * @param ObjectRepository $repository
     * @param CategoryService $categoryService
     */
    public function __construct(ObjectRepository $repository, CategoryService $categoryService = null)
    {
        $this->repository = $repository;

        if ($categoryService)
        {
            $this->categoryService = $categoryService;
        }
    }

    /**
     * get all active products
     */
    public function getAllActiveProducts()
    {
        return $this->repository->findBy(['isActive' => 1]);
    }

    /**
     * @return Products[]
     * @param string $categoryName
     */
    public function getProductsByCategoryName($categoryName)
    {
        if (!isset($this->categoryService) || empty($this->categoryService))
        {
            return self::CATEGORY_SERVICE_IS_NOT_AVAILABLE;
        }
        return $this->categoryService->getProductsByCategoryName($categoryName);
    }

    /**
     * @param $path
     * @return Product
     */
    public function getProductByPath($path)
    {
        return $this->repository->findOneBy(['path' => $path, 'isActive' => 1]);
    }

    /**
     * @param $productId
     * @return object
     */
    public function getProductById($productId)
    {
        return $this->repository->findOneBy(['id' => $productId, 'isActive' => 1]);
    }
}
