<?php

namespace AppBundle\Controller;

use AppBundle\Entity\IntroToExerciseEntity;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ExerciseController extends Controller
{
    /**
     * @Route("/excercises", name="exercises")
     */

    public function showExercise()
    {
        $user = $this->getUser();

        $em = $this->getDoctrine()->getManager();
        $exercises = $em->getRepository('AppBundle:IntroToExerciseEntity')
            ->findAll();
        if(!$exercises){
            $this->createNotFoundException('no exercises :(');
        }

        return  $this->render('Excercises/AllExercises.html.twig', array(
            'exercises' => $exercises,
            'user' => $user,
        ));
    }

    /**
     * @Route("/exercise/visualrelax", name="visualRelax")
     */
    public function showVisualExercise(){
        return $this->render('Excercises/VisualRelax.html.twig');
    }

    /**
     * @Route("/exercise/soundsofnature", name="soundsofnature")
     */
    public function showSoundsOfNature(){
        return $this->render('Excercises/SoundsOfNatureExercise.html.twig');
    }

    /**
     * @Route("/exercise/meditation", name="meditation")
     */
    public function showMeditation(){
        return $this->render('Excercises/Meditation.html.twig');
    }

    /**
     * @Route("/exercise/breathing", name="breathing")
     */

    public function showBreathing(){
        return $this->render('Excercises/BreathingExercise.html.twig');
    }

    /**
     * @Route("exercise/toggle/{userId}/{exId}", name ="togglefavorite")
     */
    public  function toggleFavorite($userId, $exId){

        $em = $this->getDoctrine()->getManager();

        $exercise = $em->getRepository('AppBundle:IntroToExerciseEntity')
            ->findOneBy(['id' => $exId]);

        $user = $em->getRepository('AppBundle:User')
            ->findOneBy(['id' => $userId]);

        $exercise->addUserFavorite($user);
        $em->persist($exercise);
        $em->flush();
        return $this->redirectToRoute('exercises');
    }

    /**
     * @Route("exercise/toggle/remove/{userId}/{exId}", name="toggleofffavorite")
     */
    public function removeFavorite($userId, $exId){
        $em = $this->getDoctrine()->getManager();

        $exercise = $em->getRepository('AppBundle:IntroToExerciseEntity')
            ->findOneBy(['id' => $exId]);

        $user = $em->getRepository('AppBundle:User')
            ->findOneBy(['id' => $userId]);

        $exercise->removeUserFavorite($user);
        $em->persist($exercise);
        $em->flush();
        return $this->redirectToRoute('exercises');
    }
}
