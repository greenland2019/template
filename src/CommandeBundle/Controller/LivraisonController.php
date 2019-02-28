<?php

namespace CommandeBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use DateTime;


class LivraisonController extends Controller
{
    public function afficherLivraisonAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        if($request->getSession()->get('login'))
        {
            $personne=$em->getRepository("PLantsBundle:Personne")->findOneBy(['prenom'=>$request->getSession()->get('login')]);
            $livraison=$em->getRepository("CommandeBundle:Livraison")->findBy(['livreur'=>$personne]);


        }
        return $this->render('@PLants/Login/livraison.html.twig',array("liv"=>$livraison));
    }

    public function modifierLivraisonAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        if($request->isXmlHttpRequest()) {

            $livraison= $em->getRepository("CommandeBundle:Livraison")->find($request->get('id'));;
            $livraison->setEtat('livré');
            $em->persist($livraison);
            $em->flush();
            $response = new Response(json_encode(array('result' => 'bien',)));

            $response->headers->set('Content-Type', 'application/json');
            return $response;
        }

    }
}
