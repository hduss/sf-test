<?php

 // src/AppBundle/Controller/SecurityController.php
 namespace AppBundle\Controller;
  
 use Symfony\Bundle\FrameworkBundle\Controller\Controller;
 use Symfony\Component\HttpFoundation\Request;
  
 class SecurityController extends Controller
 {
    public function loginAction(Request $request)
    {
        $authenticationUtils = $this->get('security.authentication_utils');
     
        // @var AuthenticationException $error (Erreur d'authentification)
        $error = $authenticationUtils->getLastAuthenticationError();
     
        // Dernier nom d'utilisateur saisi
        $lastUsername = $authenticationUtils->getLastUsername();
     
        return $this->render('CustomerBundle:Security:login.html.twig', array(
            'last_username' => $lastUsername,
            'error'         => $error,
        ));
    }
}