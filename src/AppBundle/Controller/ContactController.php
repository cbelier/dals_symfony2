<?php
/**
 * Created by PhpStorm.
 * User: Charlie
 * Date: 12/02/2017
 * Time: 00:40
 */

namespace AppBundle\Controller;


use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class ContactController extends Controller
{
    /**
     * @Route("/contact", name="pageContact")
     */
    public function indexAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        //On récupère toutes les danses pour le menu
        $danses = $em->getRepository("AppBundle:Danse")->findAll();
        //On récupère toutes les saisons pour le menu
        $saisons = $em->getRepository("AppBundle:Saison")->findAll();

        return $this->render('Front/Contact.html.twig', [
            'danses' => $danses,
            'saisons' => $saisons,
        ]);
    }

    /**
     * @Route("signIn", name="security.signIn")
     */
    public function signInAction(Request $request)
    {
        $user = new User();
        $formUser = $this->createForm(UserType::class, $user);
        $formUser->handleRequest($request);

        $rcRole = $this->getDoctrine()->getRepository('adminBundle:Role');

        if ($formUser->isSubmitted() && $formUser->isValid()) {

            $token = bin2hex(openssl_random_pseudo_bytes(16));

            $data = $formUser->getData();

            $encoderPassword = $this->get('security.password_encoder');
            $password = $encoderPassword->encodePassword($data, $data->getPassword());

            $data->setToken($token);
            $data->setPassword($password);

            $role = $rcRole->findOneBy([
                'name' => 'ROLE_USER'
            ]);
            $data->addRole($role);


            $em = $this->getDoctrine()->getManager();

            $em -> persist($data);//Doctrine est au courant des changements
            $em -> flush();//On force
            // sauvegarde du produit

            // Envoie du mail
            $message = \Swift_Message::newInstance()
                ->setSubject('Confirmer votre email')
                ->setFrom($data->getEmail())
                ->setTo('925901abb7-fccc9b@inbox.mailtrap.io')
                ->setBody(
                    $this->renderView(
                        'emails/formulaire-contact.html.twig',
                        [
                            'email' => $data->getEmail(),
                            'token' =>$token,
                        ])
                )
                ->setContentType('text/html');




            $this->get('mailer')->send($message);

            $this->addFlash('success', 'Votre inscription est validée');

            return $this->redirectToRoute('accueil');
        }

        return $this->render('Security/signIn.html.twig', [
            'formUser' => $formUser->createView()
        ]);
    }
}