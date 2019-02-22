<?php

namespace CommunauteBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use CommunauteBundle\Entity\Evenement;
use Ob\HighchartsBundle\Highcharts\Highchart;
use CMEN\GoogleChartsBundle\GoogleCharts\Charts\PieChart;
use CMEN\GoogleChartsBundle\GoogleCharts\Charts\Histogram;

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


            return $this->redirectToRoute('communaute_liste_events');

            }

        return $this->render('@Communaute/Event/events.html.twig',array('events'=>$events));
    }

    public function statsAction($id,Request $request){

        $pieChart = new PieChart();
        $pieChart->getData()->setArrayToDataTable(
            [
                ['Language', 'Speakers (in millions)'],
                ['German',  5.85],
                ['French',  1.66],
                ['Italian', 0.316],
                ['Romansh', 0.0791]
            ]
        );
        $pieChart->getOptions()->setPieSliceText('label');
        $pieChart->getOptions()->setTitle('Swiss Language Use (100 degree rotation)');
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


        $em = $this->getDoctrine()->getManager();
        $event= $em->getRepository('CommunauteBundle:Evenement')->find($id);
        $participations = $em->getRepository('CommunauteBundle:Participation')->findBy(['evenement'=>$event]);
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

            return $this->render('@Communaute/Event/event_stat.html.twig', array('event' => $event,'parts' => $participations,'notes' => $notes,'piechart' => $pieChart, 'histogram' => $histogram));
        }
        return $this->render('@Communaute/Event/event_stat.html.twig',array('event' => $event,'parts' => $participations,'notes' => $notes,'piechart' => $pieChart, 'histogram' => $histogram));
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
}
