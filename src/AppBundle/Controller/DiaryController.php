<?php

namespace AppBundle\Controller;

use AppBundle\Entity\DiaryEntity;
use AppBundle\Form\DiaryForm;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class DiaryController extends Controller
{
    /**
     * @Route("/diary/{userId}", name="userDiary")
     */
    public function showAction($userId, Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $user = $em->getRepository('AppBundle:User')
            ->findOneBy(['id'=>$userId]);
        if(!$user){
            $this->createNotFoundException('user not found :(');
        }

        $diary = new DiaryEntity();
        $form = $this->createForm(DiaryForm::class, $diary);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()){
            $diary->setUserId($user);
            $em->persist($diary);
            $em->flush();
            $this->redirectToRoute('profilepage');
        }


        return $this->render('default/Diary.html.twig', array(
            'user' => $user,
            'diaryForm' =>$form->createView()
        ));
    }
}
