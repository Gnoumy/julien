<?php

namespace blogBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use blogBundle\Entity\Categories;

class DefaultController extends Controller
{
    public function indexAction(Request $request)
    {

    	$em = $this->getDoctrine()->getManager();
    	$Categories = $em->getRepository('blogBundle:Categories')->findAll();

        return $this->render('blogBundle:Default:index.html.twig', array('Categories' => $Categories));
    }
}
