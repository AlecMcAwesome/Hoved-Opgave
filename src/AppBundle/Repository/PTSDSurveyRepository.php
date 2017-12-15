<?php
/**
 * Created by PhpStorm.
 * User: FrederikPetersen
 * Date: 15/12/2017
 * Time: 17.36
 */

namespace AppBundle\Repository;

use Doctrine\ORM\EntityRepository;

class PTSDSurveyRepository extends EntityRepository
{
    public function findLatestSurvey(){
        return $this->createQueryBuilder('e')->orderBy('e.createdAt', 'DESC');
    }

}