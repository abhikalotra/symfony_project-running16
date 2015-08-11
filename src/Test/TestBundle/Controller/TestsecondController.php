<?php

namespace Test\TestBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class TestsecondController extends Controller
{
    public function secondAction()
    {
        return $this->render('TestTestBundle:Page:indextwo.html.twig');
    }
}
