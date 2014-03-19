<?php

namespace Hotel\BackendBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Symfony\Component\Security\Core\SecurityContext;

class DefaultController extends Controller
{
    public function loginAction()
    {
        

        $petition = $this->getRequest();

        $session = $petition->getSession();
        $error = $petition->attributes->get(
        SecurityContext::AUTHENTICATION_ERROR,
        $session->get(SecurityContext::AUTHENTICATION_ERROR)
        );
        return $this->render('BackendBundle:Default:login.html.twig', array(
        'last_username' => $session->get(SecurityContext::LAST_USERNAME),
        'error' => $error
        ));
    }
        
     //  $listObjetos =  array(
       //     array('name'=>'Danilo','LastName'=>'Tobon'),
         //   array('name'=>'Jessica','LastName'=>'Ortiz'),
           // array('name'=>'Felipe','LastName'=>'Vallejo')
        //);
        //return $this->render('BackendBundle:Default:index.html.twig', array('name' => $name,'list'=>$listObjetos));
    
}
