<?php
/**
 * Created by PhpStorm.
 * User: Charlie
 * Date: 11/02/2017
 * Time: 00:19
 */

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class SaisonController extends Controller
{
    /**
     * @Route("/saison/{id}", name="saisonPage", requirements={"id" = "\d+"})
     */
    public function indexAction($id, Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        //On récupère toutes les danses pour le menu
        $toutesLesDanses = $em->getRepository("AppBundle:Danse")->findAll();
        //On récupère toutes les saisons pour le menu
        $saisons = $em->getRepository("AppBundle:Saison")->findAll();

        $lesDansesSelonLaSaison = $em->getRepository("AppBundle:Video")->findBy(array('saison' => $id));

        //die(dump($lesDansesSelonLaCategorie));

        return $this->render('Front/Danse.html.twig', [
            'idDeLaSaison' => $id,
            'lesDansesSelonLaCategorie' => $lesDansesSelonLaSaison,
            'danses' => $toutesLesDanses,
            'saisons' => $saisons,
            'saisonChoisie' => 'Saison '.$id
        ]);
    }
}