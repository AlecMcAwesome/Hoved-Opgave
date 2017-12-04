<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ExerciseController extends Controller
{
    /**
     * @Route("/excercises", name="exercises")
     */

    public function showExercise()
    {
        return  $this->render('Excercises/AllExercises.html.twig');
    }

    /**
     * @Route("/exercises/visualrelax", name="visualRelax")
     */
    public function showVisualExercise(){
        return $this->render('Excercises/VisualRelax.html.twig');
    }

    /**
     * @Route("/exercises/soundsofnature", name="soundsofnature")
     */
    public function showSoundsOfNature(){
        return $this->render('Excercises/SoundsOfNatureExercise.html.twig');
    }
}
