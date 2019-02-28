<?php

namespace CommandeBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use CommandeBundle\Entity\Commande;
use CommandeBundle\Entity\livraison;

class CommandeController extends Controller
{
    public function afficherAction()
    { $em = $this->getDoctrine()->getManager();
        $commande=$em->getRepository("CommandeBundle:Commande")->findAll();

        return $this->render('@PLants/Login/commande.html.twig',array("com"=>$commande));
    }
    public function suppAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        if($request->isXmlHttpRequest()) {

           $commande = $em->getRepository("CommandeBundle:Commande")->find($request->get('id'));
            $livraison=$em->getRepository("CommandeBundle:Livraison")->findOneBy(['commande'=>$commande]);
            $em->remove($livraison);
            $em->remove($commande);
            $em->flush();
            $response = new Response(json_encode(array('result' => 'bien')));

            $response->headers->set('Content-Type', 'application/json');
            return $response;
        }
    }

}
