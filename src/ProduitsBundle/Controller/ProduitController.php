<?php

namespace ProduitsBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ProduitController extends Controller
{
    public function afficheAction(){
        $em= $this->getDoctrine()->getManager();
        $produits= $em->getRepository('ProduitsBundle:Produit')->findAll();

        return $this->render('@Produits/Produit/listproduits.html.twig',array('prods'=>$produits));
    }
}
