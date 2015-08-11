<?php

namespace Acme\Bundle\NewBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('AcmeNewBundle:Default:index.html.twig', array('name' => $name));
    }
}
