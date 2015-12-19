<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Banner;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class HomeController extends Controller
{
    /**
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function indexAction()
    {
        // replace this example code with whatever you need
        return $this->render('AppBundle:home:homepage.html.twig', ['banner' => $this->getBanner()]);
    }


    public function getBanner()
    {
        return $this->getDoctrine()->getRepository('AppBundle:Banner')->findAll();
    }
}
