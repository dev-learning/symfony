<?php

namespace AppBundle\Controller;

use AppBundle\Service\CategoryService;
use AppBundle\Service\ProductService;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;



class ProductController extends Controller
{
    /**
     * @var ProductService
     */
    private $productService;


    /**
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function indexAction()
    {
        return $this->render('AppBundle:product:products.html.twig',
            ['products' => $this->productService->getAllActiveProducts()]
        );
    }


    /**
     ** @param $category
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function categoryAction($category)
    {
        $productService = new ProductService(
            $this->getDoctrine()->getRepository('AppBundle:Product'),
            new CategoryService($this->getDoctrine()->getRepository('AppBundle:Category'))
        );

        return $this->render('AppBundle:product:category.html.twig',
            ['category' => $productService->getProductsByCategoryName($category)]
        );
    }


    public function productAction($product)
    {
        $productService = new ProductService($this->getDoctrine()->getRepository('AppBundle:Product'));

        return $this->render('AppBundle:product:product.html.twig',
            ['product' => $productService->getProductByPath($product)]
        );
    }
}