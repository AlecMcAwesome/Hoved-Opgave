<?php
/**
 * Created by PhpStorm.
 * User: FrederikPetersen
 * Date: 10/12/2017
 * Time: 20.10
 */

namespace AppBundle\Repository;

use Doctrine\ORM\EntityRepository;

class ExerciseRepository extends EntityRepository
{
    public function findAllExercises(){
        return $this->getEntityManager()
            ->createQuery('SELECT e FROM AppBundle:IntroToExerciseEntity e ORDER BY e.title')
            ->execute();
    }

}