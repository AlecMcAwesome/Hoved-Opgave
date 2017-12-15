<?php

namespace AppBundle\Controller;


use AppBundle\Entity\EmergencyEntity;
use AppBundle\Form\AdminEditProfileForm;
use AppBundle\Form\ICOEForm;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Form;
use Symfony\Component\HttpFoundation\Request;

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


        $exData = $em->getRepository('AppBundle:IntroToExerciseEntity');


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

    public function editUser(Request $request, $id){

        $em = $this->getDoctrine()->getManager();
        $user = $em->getRepository('AppBundle:User')
                ->findOneBy(['id' => $id]);
        if(!$user) {
            $this->createNotFoundException('No users found :( code: 404');
        }

        $userForm = $this -> createForm(AdminEditProfileForm::class, $user);
        $userForm -> handleRequest($request);
        if ($userForm->isSubmitted() && $userForm -> isValid()){
            $em->persist($user);
            $em->flush();

            return $this->redirectToRoute('adminprofile');
        }

        $icoeData = $em->getRepository('AppBundle:EmergencyEntity')
                    ->findOneBy(['user' => $id]);
        if(!$icoeData) {
            $this->createNotFoundException('No ICOE data found :( code: 404');
        }

        $emergencyInfo = new EmergencyEntity();
        $icoeForm = $this->createForm(ICOEForm::class, $emergencyInfo);
        $icoeForm->handleRequest($request);
        if ($icoeForm->isSubmitted() && $icoeForm->isValid()){
            if($icoeData != NULL){
                $em->remove($icoeData);
                $em->flush();
            }
            $emergencyInfo->setUser($user);
            $em->persist($emergencyInfo);
            $em->flush();
            return $this->redirectToRoute('adminprofile');
        }


        return $this->render('Admin/AdminEditUser.html.twig', array(
            'userform' => $userForm->createView(),
            'icoeform' => $icoeForm->createView(),
            'user' => $user,
            'icoe' => $icoeData
        ));
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
