<?php
/**
 * Created by PhpStorm.
 * User: Charlie
 * Date: 11/02/2017
 * Time: 23:27
 */

namespace AppBundle\Controller;


use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;


class StarController extends Controller
{
    /**
     * @Route("/stars", name="starsPage")
     */
    public function indexAction(Request $request)
    {

        $em = $this->getDoctrine()->getManager();

        //On récupère toutes les danses pour le menu
        $toutesLesDanses = $em->getRepository("AppBundle:Danse")->findAll();
        //On récupère toutes les saisons pour le menu
        $saisons = $em->getRepository("AppBundle:Saison")->findAll();
        //On récupère toutes les stars
        $stars = $em->getRepository("AppBundle:Celebrity")->findAll();



        return $this->render('Front/StarsList.html.twig', [
            'stars' => $stars,
            'danses' => $toutesLesDanses,
            'saisons' => $saisons,
        ]);
    }

    /**
     * @Route("/stars/searchAjax", name="starAjax")
     */
    public function searchAction(Request $request){

        $data = $request->get("data");

        $doctrine = $this->getDoctrine();
        $res = $doctrine->getRepository('AppBundle:Celebrity')->searchbyName($data);



        return new JsonResponse($res);
    }
}
