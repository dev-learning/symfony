<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Product;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ProductController extends Controller
{
    /**
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function indexAction()
    {
        $this->createFakeProduct();
        return $this->render('AppBundle:product:products.html.twig', ['products' => $this->getAllProducts()]);
    }

    /**
     * @return \AppBundle\Entity\Product[]|array
     */
    private function getAllProducts()
    {
        return $this->getDoctrine()->getRepository('AppBundle:Product')->findBy(['isActive' => true]);
    }

    /**
     * create a fake product remove by live going
     * @return bool
     */
    private function createFakeProduct()
    {
        $product = new Product();
        $product->setName('Jack & Jones broek');
        $product->setLink($this->generateUrl('product', ['category' => 'schoen', 'product' => $product->getName()]));
        $product->setDescription('Mooi broek');
        $product->setPrice(10.95);
        $product->setSalePrice(9.95);
        $product->setIsActive(true);
        print_r($product);exit;
        $this->getDoctrine()->getManager()->persist($product);
        $this->getDoctrine()->getManager()->flush();
        return true;
    }
}