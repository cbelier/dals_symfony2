<?php
/**
 * Created by PhpStorm.
 * User: Charlie
 * Date: 12/02/2017
 * Time: 22:29
 */

namespace AppBundle\Controller;

use AppBundle\Entity\Celebrity;
use AppBundle\Form\StarType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;


class StarsBackOfficeController extends Controller
{
    /**
     * @Route("/backOffice/stars", name="starsBackOffice")
     */
    public function indexAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        //On récupère toutes les danses
        $stars = $em->getRepository("AppBundle:Celebrity")->findAll();
        //On récupère toutes les vidéos
        $videos = $em->getRepository("AppBundle:Video")->findVideoWithRelation();

        //Ici on prépare l'entrée de nouvelles stars
        $star = new Celebrity();
        $formStar = $this->createForm(StarType::class, $star);
        $formStar->handleRequest($request);

        //die(dump($videos));

        return $this->render('Back/StarsBackOffice.html.twig', [
            'stars' => $stars,
            'videos' => $videos,
        ]);
    }

    public function createAction(Request $request)
    {
        $firstName = $request->get("firstName");
        $lastName = $request->get("lastName");

        $star = new Celebrity();
        $star->setFirstnameCelebrity($firstName);
        $star->setLastnameCelebrity($lastName);

        $em = $this->getDoctrine()->getManager();
        $em -> persist($star);//Doctrine est au courant des changements
        $em -> flush();//On force
        // sauvegarde de la star

        $res = $em->getRepository('AppBundle:Celebrity')->searchLastInsertion($firstName, $lastName);


        return new JsonResponse($res);
    }


    public function removeAction(Request $request)
    {
        $id = $request->get("id");

        $em = $this->getDoctrine()->getManager();
        $star = $em->getRepository('AppBundle:Celebrity')->find($id);

        $em->remove($star);//Doctrine supprime la star
        $em->flush();//On force

        return new JsonResponse($id);

    }


    public function updateAction(Request $request)
    {
        $id = $request->get("id");
        $type = $request->get("type");
        $value = $request->get("value");

        //die(dump("id: $id, type: $type, valeur: $value"));

        $em = $this->getDoctrine()->getManager();
        $star = new Celebrity();
        $star = $em->getRepository('AppBundle:Celebrity')->find($id);

        if ($type == "firstName"){
            $star->setFirstnameCelebrity($value);
        }
        else{
            $star->setLastnameCelebrity($value);
        }
        $em -> persist($star);//Doctrine est au courant des changements
        $em -> flush();//On force

        return new JsonResponse($id);
    }
}


