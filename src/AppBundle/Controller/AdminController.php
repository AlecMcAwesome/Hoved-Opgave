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

    /**
     * @Route("/admin-add/profile", name="adminaddprofile")
     */
    public function addUser(){

    }

    /**
     * @Route("/admin-edit/profile/{id}", name="admineditprofile")
     */

    public function editUser(){

    }

    /**
     * @Route("/admin-delete/profile/{id}", name="admindeleteprofile")
     */
    public function deleteUser($id){

        $em = $this->getDoctrine()->getManager();

        $user = $em->getRepository('AppBundle:User')
                ->findOneBy(['id' => $id]);

        $em->remove($user);
        $em->flush();

        return $this->redirectToRoute('adminprofile');
    }
}
