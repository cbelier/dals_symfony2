<?php
/**
 * Created by PhpStorm.
 * User: Charlie
 * Date: 11/02/2017
 * Time: 00:37
 */

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;


class DanseController extends Controller
{
    /**
     * @Route("/categories/{danseId}", name="danse")
     */
    public function indexAction($danseId, Request $request)
    {


        $em = $this->getDoctrine()->getManager();
        //On obtient l'objet selon la danse
        $danseObject = $em->getRepository("AppBundle:Danse")->findOneBy(array('nameDanse' => $danseId));

        //On récupère toutes les danses pour le menu
        $toutesLesDanses = $em->getRepository("AppBundle:Danse")->findAll();
        //On récupère toutes les saisons pour le menu
        $saisons = $em->getRepository("AppBundle:Saison")->findAll();


        if (!$danseObject) {
            throw $this->createNotFoundException(
                'Pas de danse trouvée pour '.$danseId
            );
        }

        $id = $danseObject->getId();//On extrait l'id de l'objet
        $nomDeLaCategorie = $danseObject->getNameDanse();
        $lesDansesSelonLaCategorie = $em->getRepository("AppBundle:Video")->findBy(array('danseId' => $id));

        //die(dump($lesDansesSelonLaCategorie));

        // replace this example code with whatever you need
        return $this->render('Front/Danse.html.twig', [
            'nomDeLaCategorie' => $nomDeLaCategorie,
            'lesDansesSelonLaCategorie' => $lesDansesSelonLaCategorie,
            'danses' => $toutesLesDanses,
            'saisons' => $saisons
        ]);
    }

}