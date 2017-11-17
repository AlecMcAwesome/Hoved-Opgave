<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class AdminController extends Controller
{
    /**
     * @Route("/admin", name="adminprofile")
     */

    public function adminProfile()
    {
        $em = $this->getDoctrine()->getManager();
        $users = $em->getRepository('AppBundle:User')
            ->findAll();

        if(!$users){
            $this->createNotFoundException('No users found :( code: 404');
        }


        return $this->render('Admin/AdminProfile.html.twig', array(
            'users' => $users
        ));
    }
}
