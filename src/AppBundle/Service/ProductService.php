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
     * @param ObjectRepository $repository
     */
    public function __construct(ObjectRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @param $path
     * @return Product
     */
    public function getProductByPath($path)
    {
        return $this->repository->findOneBy(['path' => $path]);
    }
}
