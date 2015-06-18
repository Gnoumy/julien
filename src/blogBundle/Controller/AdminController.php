<?php

namespace blogBundle\Controller;

use blogBundle\Form\CategoriesType;
use blogBundle\Entity\Categories;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class AdminController extends Controller
{
    public function indexAction()
    {

    	$categories = new Categories();
    	$form = $this->createForm(new CategoriesType(), $categories);
        return $this->render('blogBundle:Admin:index.html.twig', array(
        	'form' => $form->createView())
        );
    }
}
