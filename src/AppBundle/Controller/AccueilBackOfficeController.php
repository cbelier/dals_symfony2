<?php
/**
 * Created by PhpStorm.
 * User: Charlie
 * Date: 12/02/2017
 * Time: 22:29
 */

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;


class AccueilBackOfficeController extends Controller
{
    /**
     * @Route("/backOffice", name="backOffice")
     */
    public function indexAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        //On récupère toutes les danses pour le menu
        $danses = $em->getRepository("AppBundle:Danse")->findAll();
        //On récupère toutes les saisons pour le menu
        $saisons = $em->getRepository("AppBundle:Saison")->findAll();

        //On récupère le nombre de likes
        $nbLikes = $em->getRepository("AppBundle:Video")->findNbLike();
        $nbVideos = $em->getRepository("AppBundle:Video")->findNbVideo();
        $nbStars = $em->getRepository("AppBundle:Celebrity")->findNbStars();
        $nbSaisons = $em->getRepository("AppBundle:Saison")->findNbSaisons();

        return $this->render('Back/AccueilBackOffice.html.twig', [
            'danses' => $danses,
            'saisons' => $saisons,
            'nbLikes' => $nbLikes,
            'nbVideos' => $nbVideos,
            'nbStars' => $nbStars,
            'nbSaisons' => $nbSaisons
        ]);
    }
}
