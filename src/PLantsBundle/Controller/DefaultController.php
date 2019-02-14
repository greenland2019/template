<?php

namespace PLantsBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    public function indexAction(Request $request)
    {
        if($request->getSession()->get('login') ) {
            return $this->render('@PLants/Login/main-page.html.twig');
        }
        return $this->render('@PLants/Login/signin.html.twig');
    }
}
