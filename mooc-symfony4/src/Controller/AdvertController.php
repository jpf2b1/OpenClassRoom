<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;



class AdvertController extends AbstractController{
    /**
     * Affiche page ACCUEIL
     * 
     * @Route("/", name="page_accueil")
     *
     * @return void
     */
    public function accueil(){
        return new response("<body><h1>Mon accueil</h1><p>Page générer grace a NEW RESPONSE ET NON à L'AIDE DES TEMPLATES</p></body>");
    }

    /**
     * Affiche page index
     * 
     * @Route("advert/{id}", name="oc_advert_index_widthid", defaults={"id"=1}, requirements={"id"="\d{1,4}"})
     *
     * @return void
     */
    public function index($id){
        return $this->render(
            'Advert/index.html.twig', 
            ['title'=>'ToTo Asticot', 'advertId'=>'page '.$id, 'id'=>$id]
        );
    }

    /**
     * Affiche une page avec le numero saisi dans l'url
     * 
     * @Route("advert/view",name="oc_advert_view_default", defaults={"id"=1})
     * @Route("advert/view/{id}",name="oc_advert_view", defaults={"id"=1})
     *
     * @return void
     */
    public function view($id, Request $request){

        // On récupère notre paramètre tag
        $tag = $request->query->get('tag');

        return new Response("<body>Affichage de l'annonce numero : ".$id.", avec le tag : ".$tag."</body>");
    }

 
    /**
     * @Route("advert/view/{year}/{slug}.{format}", name="oc_advert_view_slug", requirements={
     * "year"= "\d{4}",
     * "format" = "html|xml"
     * }, defaults={"format"="html"})
     */
    public function viewSlug($slug, $year, $format)
    {
    return new Response(
        "On pourrait afficher l'annonce correspondant au
        slug '".$slug."', créée en ".$year." et au format ".$format."."
    );
    }




}