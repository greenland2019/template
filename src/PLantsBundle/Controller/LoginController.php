<?php

namespace PLantsBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use PLantsBundle\Entity\Personne;

class LoginController extends Controller
{
    public function connectAction(Request $request){

        $em = $this->getDoctrine()->getManager();
        if($request->getMethod() == "POST"){
            $admin= $em->getRepository('PLantsBundle:Personne')->findOneBy(['email'=> $request->get("email"),'password'=> $request->get("password")]);
            if($admin && $admin->getRole()=="admin"){
                $sesion =$request->getSession();
                $sesion->set('login', $admin->getPrenom());
                return $this->render('@PLants/Login/main-page.html.twig');
            }

                return $this->render('@PLants/Login/signin.html.twig');
        }
        return $this->render('@PLants/Login/signin.html.twig');
    }
}
