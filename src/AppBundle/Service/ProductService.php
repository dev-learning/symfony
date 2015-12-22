<?php

namespace AppBundle\Service;

use AppBundle\Entity\Product;
use Doctrine\Common\Persistence\ObjectRepository;

class ProductService
{
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
     */
    public function __construct(ObjectRepository $repository, CategoryService $categoryService)
    {
        $this->repository = $repository;

        $this->categoryService = $categoryService;
    }

    /**
     * get all active products
     */
    public function getAllActiveProducts()
    {
        $this->repository->findBy(['isActive' => true]);
    }

    /**
     * @return Product[]
     */
    public function getProductsByCategoryName($categoryName)
    {
//        $category = $this->categoryService->getCategoryByName($categoryName);
//        return $category->getProducts();
        $products = $this->repository->findBy(['category' => $categoryName]);
        return $products;
    }

    /**
     * @param $path
     * @return Product
     */
    public function getProductByPath($path)
    {
        return $this->repository->findOneBy(['path' => $path]);
    }

    /**
     * @param $productId
     * @return object
     */
    public function getProductById($productId)
    {
        return $this->repository->findOneBy(['id' => $productId]);
    }
}
