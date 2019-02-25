<?php

namespace CommunauteBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use CommunauteBundle\Entity\Evenement;
use Ob\HighchartsBundle\Highcharts\Highchart;
use CMEN\GoogleChartsBundle\GoogleCharts\Charts\PieChart;
use CMEN\GoogleChartsBundle\GoogleCharts\Charts\Histogram;
//use CommunauteBundle\Entity\EvenementRepository;

class EventController extends Controller
{
    public function affichAction(Request $request){
        $em = $this->getDoctrine()->getManager();
        $events= $em->getRepository('CommunauteBundle:Evenement')->findAll();
        $eventtest = $em->getRepository('CommunauteBundle:Evenement')->displayeventsbyparts();
        $i=0;
        $event1= new Evenement();
        $event2= new Evenement();
        $event3= new Evenement();
        $event4= new Evenement();
        $event5= new Evenement();
        foreach ($eventtest as $event){
            if($i==0){
                $event1=$event;
            }

            if($i==1){
                $event2=$event;
            }

            if($i==2){
                $event3=$event;
            }

            if($i==3){
                $event4=$event;
            }

            if($i==4){
                $event5=$event;
            }
            $i+=1;
        }
        $pieChart = new PieChart();
        $pieChart->getData()->setArrayToDataTable(
            [
                ['Language', 'Speakers (in millions)'],
                [$event1->getDescription(),  $event1->getNbParticipants()],
                [$event2->getDescription(),  $event2->getNbParticipants()],
                [$event3->getDescription(), $event3->getNbParticipants()],
                [$event4->getDescription(), $event4->getNbParticipants()],
                [$event5->getDescription(), $event5->getNbParticipants()],
            ]
        );
        $pieChart->getOptions()->setPieSliceText('label');
        $pieChart->getOptions()->setTitle('Les evenements les  plus populaires');
        $pieChart->getOptions()->setPieStartAngle(100);
        $pieChart->getOptions()->setHeight(500);
        $pieChart->getOptions()->setWidth(900);
        $pieChart->getOptions()->getLegend()->setPosition('none');

        $histogram = new Histogram();
        $histogram->getData()->setArrayToDataTable([
            ['Population'],
            [12000000],
            [13000000],
            [100000000],
            [1000000000],
            [25000000],
            [600000],
            [6000000],
            [65000000],
            [210000000],
            [80000000],
        ]);
        $histogram->getOptions()->setTitle('Country Populations');
        $histogram->getOptions()->setWidth(900);
        $histogram->getOptions()->setHeight(500);
        $histogram->getOptions()->getLegend()->setPosition('none');
        $histogram->getOptions()->setColors(['#e7711c']);
        $histogram->getOptions()->getHistogram()->setLastBucketPercentile(10);
        $histogram->getOptions()->getHistogram()->setBucketSize(10000000);

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


            return $this->redirectToRoute('communaute_liste_events');

            }

        return $this->render('@Communaute/Event/events.html.twig',array('events'=>$events,'piechart' => $pieChart, 'histogram' => $histogram));
    }

    public function statsAction($id,Request $request){

        $em = $this->getDoctrine()->getManager();



        $event= $em->getRepository('CommunauteBundle:Evenement')->find($id);
        $personnes = $em->getRepository('PLantsBundle:Personne')->findAll();
        $notes= $em->getRepository('CommunauteBundle:NoteEvent')->findAll();
        //$participation = $em->getRepository('CommunauteBundle:Participation')->findBy(['evenement'=>$event]);

        if ($request->getMethod() == "POST") {
            if (empty($request->get('datemodif')))
                $event->setDateEvent(new \DateTime($request->get('date')));
            else {
                $event->setDateEvent(new \DateTime($request->get('datemodif')));

            }


                $event->setType($request->get('typemodif'));


            $event->setLieu($request->get('adressemodif'));
            $event->setDescription($request->get('descriptionmodif'));
            if (empty($request->get('affichemodif')))
                $event->setAffiche($request->get('affiche1'));
            else {
                $event->setAffiche($request->get('affichemodif'));
            }

            $em->persist($event);
            $em->flush();

            return $this->render('@Communaute/Event/event_stat.html.twig', array('event' => $event,'pers' => $personnes,'notes' => $notes));
        }
        return $this->render('@Communaute/Event/event_stat.html.twig',array('event' => $event,'pers' => $personnes,'notes' => $notes));
    }

    public function deleteAction($id){
        $em = $this->getDoctrine()->getManager();
        $event= $em->getRepository('CommunauteBundle:Evenement')->find($id);
        //$note = $em->getRepository('CommunauteBundle:NoteEvent')->findBy(['evenement'=>$event]);
        //$participation = $em->getRepository('CommunauteBundle:Participation')->findBy(['evenement'=>$event]);
        //$em->remove($note);
        //$em->remove($participation);
        $em->remove($event);
        $em->flush();

        return $this->redirectToRoute('communaute_liste_events');
    }

    public  function searchAction(Request $request){
        $em = $this->getDoctrine()->getManager();
        if($request->isXmlHttpRequest()){
            $events = $em->getRepository('CommunauteBundle:Evenement')->find($request->get('id'));
            $response = new Response(json_encode(array(
                'id' => $request->get('id'),

            )));
            $response->headers->set('Content-Type', 'application/json');

            return $response;
        }
    }
}
