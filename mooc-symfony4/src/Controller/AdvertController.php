<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;


/**
 * @Route("/advert")
 */
class AdvertController extends AbstractController{

    /**
     * Affiche page index
     * 
     * @Route("/", name="oc_advert_index1")
     * @Route("/{id}", requirements={"id" = "\d+"}, defaults={"page" = 1})
     *
     * @return void
     */
    public function index($id){
        return $this->render(
            'Advert/index.html.twig', 
            ['title'=>'ToTo Asticot', 'advertId'=>'page '.$id]
        );
    }



    /**
     * Affiche une page avec le numero saisi dans l'url
     * 
     * @Route("/index/{id}",name="oc_advert_view", requirements={"id" = "\d+")
     *
     * @return void
     */
    public function view($id = "Non renseigné"){
        return new Response("<body>Affichage de l'annonce numero : ".$id."</body>");
    }

 
    /**
     * @Route("/view/{year}/{slug}.{format}", name="oc_advert_view_slug", requirements={
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