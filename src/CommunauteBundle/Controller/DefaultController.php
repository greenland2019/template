<?php

namespace CommunauteBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('CommunauteBundle:Default:index.html.twig');
    }
}
