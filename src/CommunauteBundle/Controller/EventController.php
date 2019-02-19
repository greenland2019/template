<?php

namespace CommunauteBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use CommunauteBundle\Entity\Evenement;

class EventController extends Controller
{
    public function affichAction(Request $request){
        $em = $this->getDoctrine()->getManager();
        $events= $em->getRepository('CommunauteBundle:Evenement')->findAll();

        if ($request->getMethod() == "POST") {

                $evenement = new evenement();
                $evenement->setLieu($request->get("adresse"));
                $evenement->setType($request->get("type"));
                $evenement->setAffiche($request->get("affiche"));
                $evenement->setNbParticipants(0);
                $evenement->setDateEvent(new \DateTime($request->get("date")));
                $evenement->setDescription($request->get("description"));
                $em->persist($evenement);
                $em->flush();


            return $this->render('@Communaute/Event/events.html.twig',array('events'=>$events));

            }

        return $this->render('@Communaute/Event/events.html.twig',array('events'=>$events));
    }
}
