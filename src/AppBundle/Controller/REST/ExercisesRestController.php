<?php

namespace AppBundle\Controller\REST;

use AppBundle\Entity\IntroToExerciseEntity;
use AppBundle\Entity\User;
use AppBundle\Form\AjaxfavoriteExercise;
use FOS\RestBundle\Controller\Annotations as Rest;
use FOS\RestBundle\Controller\FOSRestController;
use AppBundle\Repository\ExerciseRepository;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Component\HttpFoundation\Request;

class ExercisesRestController extends FOSRestController
{
    /**
     * @Rest\Get("api/exercises/get")
     */

    public function getAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager()->getRepository(IntroToExerciseEntity::class);
        $exercises = $em->FindAll();

        if (!$exercises) {
            return $error = ['code' => 500, 'text' => 'no data'];
        }

        $result = ['code' => 200, 'data' => $exercises];

        return $result;
    }

    /**
     * @Rest\Put("api/exercises/{typeid}")
     * @Rest\Patch("api/exercises/{typeid}")
     * Security("has_role('ROLE_USER')")
     */
    public function updateAction(Request $request, $typeid)
    {
        $id = intval($typeid);

        $body = $request->getContent();
        $data = json_decode($body, true);

        $em = $this->getDoctrine()->getManager();
        /*$user = $em->getRepository()
            ->findOneBy();
*/

        return $result = ['status' => 200, 'user' => json_encode($data)];


        /*
                $em = $this->getDoctrine()->getManager();
                $favorite = $em->getRepository('AppBundle:IntroToExerciseEntity');

                $form = $this->createForm(AjaxfavoriteExercise::class, $favorite);
          */

    }
}