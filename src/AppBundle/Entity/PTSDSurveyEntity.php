<?php
/**
 * Created by PhpStorm.
 * User: FrederikPetersen
 * Date: 12/12/2017
 * Time: 15.41
 */

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name = "UserSurvey")
 */
class PTSDSurveyEntity
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\User", inversedBy="surveyId")
     */
    private $user;

    /**
     * @ORM\Column(type="integer", nullable=false)
     */
    private $question1;

    /**
     * @ORM\Column(type="integer", nullable=false)
     */
    private $question2;

    /**
     * @ORM\Column(type="integer", nullable=false)
     */
    private $question3;

    /**
     * @ORM\Column(type="integer", nullable=false)
     */
    private $question4;


    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $result;

    /**
     * @ORM\Column(type="datetime", nullable=false)
     */
    private $createdAt;

    public function __construct()
    {
        $this->createdAt = new \DateTime();
    }

    /**
     * @return mixed
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * @param mixed $user
     */
    public function setUser($user)
    {
        $this->user = $user;
    }


    /**
     * @return mixed
     */
    public function getResult()
    {
        return $this->result;
    }

    /**
     * @param mixed $result
     */
    public function setResult($result)
    {
        $this->result = $result;
    }

    /**
     * @return mixed
     */
    public function getQuestion1()
    {
        return $this->question1;
    }

    /**
     * @param mixed $question1
     */
    public function setQuestion1($question1)
    {
        $this->question1 = $question1;
    }

    /**
     * @return mixed
     */
    public function getQuestion2()
    {
        return $this->question2;
    }

    /**
     * @param mixed $question2
     */
    public function setQuestion2($question2)
    {
        $this->question2 = $question2;
    }

    /**
     * @return mixed
     */
    public function getQuestion3()
    {
        return $this->question3;
    }

    /**
     * @param mixed $question3
     */
    public function setQuestion3($question3)
    {
        $this->question3 = $question3;
    }

    /**
     * @return mixed
     */
    public function getQuestion4()
    {
        return $this->question4;
    }

    /**
     * @param mixed $question4
     */
    public function setQuestion4($question4)
    {
        $this->question4 = $question4;
    }

    /**
     * @return mixed
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * @param mixed $createdAt
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;
    }
}