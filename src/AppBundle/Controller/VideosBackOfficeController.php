<?php
/**
 * Created by PhpStorm.
 * User: Charlie
 * Date: 22/02/2017
 * Time: 16:59
 */

namespace AppBundle\Controller;

use AppBundle\Entity\Video;
use AppBundle\Form\VideoType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;


class VideosBackOfficeController extends Controller
{
    /**
     * @Route("/backOffice/videos", name="videosBackOffice")
     */
    public function indexAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        //On récupère toutes les danses
        $stars = $em->getRepository("AppBundle:Celebrity")->findAll();
        //On récupère toutes les vidéos
        $videos = $em->getRepository("AppBundle:Video")->find(1);
        //On récupère toutes les saisons pour le menu
        $saisons = $em->getRepository("AppBundle:Saison")->findAll();

        $videoObject = new Video();
        $formCreateVideo = $this->createForm(VideoType::class, $videoObject);
        $formCreateVideo->handleRequest($request);

        $formUpdateVideo = $this->createForm(VideoType::class, $videos);
        $formUpdateVideo->handleRequest($request);


        if ($formCreateVideo->isSubmitted() && $formCreateVideo->isValid()) {

            $em = $this->getDoctrine()->getManager();

            $em -> persist($videoObject);//Doctrine est au courant des changements
            $em -> flush();//On force
            // sauvegarde du produit

            return $this->redirectToRoute('videosBackOffice');
        }

        if ($formUpdateVideo->isSubmitted() && $formUpdateVideo->isValid()) {

            $em = $this->getDoctrine()->getManager();

            $em -> flush();//On flush juste car Doctrine à déjà la vidéo
            // sauvegarde du produit

            return $this->redirectToRoute('videosBackOffice');
        }

        //die(dump($formVideo));

        return $this->render('Back/VideosBackOffice.html.twig', [
            'stars' => $stars,
            'videos' => $videos,
            'saisons' => $saisons,
            'formCreateVideo' => $formCreateVideo->createView(),
            'formUpdateVideo' => $formUpdateVideo->createView()
        ]);
    }

    public function removeAction(Request $request)
    {
        $id = $request->get("id");

        $em = $this->getDoctrine()->getManager();
        $video = $em->getRepository('AppBundle:Video')->find($id);

        $em->remove($video);//Doctrine supprime la star
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
        $video = new Video();
        $video = $em->getRepository('AppBundle:Video')->find($id);

        if ($type == "firstName"){
            $video->setTitleVideo($value);
        }
        else{
            $video->setLikeVideo($value);
        }
        $em -> persist($video);//Doctrine est au courant des changements
        $em -> flush();//On force

        return new JsonResponse($id);
    }
}