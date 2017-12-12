<?php

namespace AppBundle\Controller\REST;

use AppBundle\Entity\IntroToExerciseEntity;
use FOS\RestBundle\Controller\Annotations as Rest;
use FOS\RestBundle\Controller\FOSRestController;
use AppBundle\Repository\ExerciseRepository;
use Symfony\Component\HttpFoundation\Request;

class ExercisesRestController extends FOSRestController
{
    /**
     * @Rest\Get("api/exercises/get")
     */

    public function getAction(Request $request){
        $em = $this->getDoctrine()->getManager()->getRepository(IntroToExerciseEntity::class);
        $exercises = $em ->FindAll();

        if (!$exercises){
            return $error = ['code' => 500, 'text' => 'no data'];
        }

        $result = ['code' => 200, 'data' => $exercises];

        return $result;
    }

    public function updateAction(){

}

}