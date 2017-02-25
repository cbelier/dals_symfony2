<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;


class AccueilController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $videoLesPlusLikes = $em->getRepository("AppBundle:Video")->findVideoMoreLike(3);

        //On récupère toutes les danses pour le menu
        $danses = $em->getRepository("AppBundle:Danse")->findAll();
        //On récupère toutes les saisons pour le menu
        $saisons = $em->getRepository("AppBundle:Saison")->findAll();

        return $this->render('Front/Accueil.html.twig', [
            'danses' => $danses,
            'saisons' => $saisons,
            'videoLesPlusLikes' => $videoLesPlusLikes
        ]);
    }
}
