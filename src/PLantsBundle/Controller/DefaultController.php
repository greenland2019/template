<?php

namespace PLantsBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('PLantsBundle:Default:index.html.twig');
    }
}
