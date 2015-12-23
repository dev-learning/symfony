<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class HomeController extends Controller
{
    /**
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function indexAction()
    {
        return $this->render('AppBundle:home:homepage.html.twig', ['banner' => $this->getBanner()]);
    }

    /**
     * @return \AppBundle\Entity\Banner[]|array
     */
    private function getBanner()
    {
        return $this->getDoctrine()->getRepository('AppBundle:Banner')->findBy(['isActive' => true]);
    }
}
