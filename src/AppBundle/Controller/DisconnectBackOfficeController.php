<?php
/**
 * Created by PhpStorm.
 * User: Charlie
 * Date: 12/02/2017
 * Time: 23:18
 */

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

class DisconnectBackOfficeController extends Controller
{
    /**
     * @Route("/backOffice/logout", name="logout")
     */
    public function logoutAction(Request $request)
    {
        //Cette fonction vide permet de déconnecter l'utilisateur
        return $this->redirectToRoute('homepage');
    }
}