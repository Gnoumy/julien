<?php

namespace blogBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use blogBundle\Form\CategoriesType;
use blogBundle\Entity\Categories;

class AdminController extends Controller
{
    public function indexAction()
    {

    	$categories = new Categories();
    	$form = $this->createForm(new CategoriesType(), $categories);


    	
        return $this->render('blogBundle:Admin:index.html.twig', array(
        	'formCategorie' => $form->createView())
        );
    }
}
