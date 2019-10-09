<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class AdvertController extends Controller{
    /**
     * Affiche "Bonjour Hello World"
     * 
     * @Route("/", name="homepage")
     * @Route("/hello-world")
     *
     * @return void
     */
    public function index(){

        //return new Response("Bonjour Hello World");
        return $this->render(
            "Advert/index.html.twig",
            ['title'=>'Bonjour a tous']
        );

    }

    /**
     * Undocumented function
     * 
     * @Route("/advert/view/{id}", name="oc_advert_view")
     *
     * @return void
     */
    public function view($id='none'){
        return new Response("Affichage de l'annonce d'id : ".$id);
    }
}