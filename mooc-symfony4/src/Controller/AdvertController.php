<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class AdvertController extends AbstractController{

    /**
     * Affiche page index
     * 
     * @Route("/advert", name="oc_advert_index1")
     * @Route("/", name="oc_advert_index")
     *
     * @return void
     */
    public function index(){
        return $this->render(
            'Advert/index.html.twig', 
            ['title'=>'ToTo Asticot']
        );
    }



    /**
     * Affiche une page avec le numero saisi dans l'url
     * 
     * @Route("/advert/index/{id}",name="oc_advert_view")
     *
     * @return void
     */
    public function view($id = "Non renseigné"){
        return new Response("<body>Affichage de l'annonce numero : ".$id."</body>");
    }

 
    /**
     * @Route("/advert/view/{year}/{slug}.{format}", name="oc_advert_view_slug", requirements={
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