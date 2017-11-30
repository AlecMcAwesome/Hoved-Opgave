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
}
