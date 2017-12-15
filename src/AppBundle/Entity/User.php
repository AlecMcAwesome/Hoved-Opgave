<?php
namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;



/**
 * @ORM\Entity
 * @ORM\Table(name="user")
 */
class User extends BaseUser
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\OneToOne(targetEntity ="EmergencyEntity", mappedBy = "user")
     */
    protected $id;

    /**
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\DiaryEntity", mappedBy="userId")
     * @ORM\JoinColumn(name="DiaryId", referencedColumnName="id")
     */
    private $diaryId;

    /**
     * @var \Doctrine\Common\Collections\Collection|IntroToExerciseEntity[]
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\IntroToExerciseEntity", mappedBy="userfavorites")
     */
    private $favorites;

    /**
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\PTSDSurveyEntity", mappedBy="user")
     */
    private $surveyId;

    /**
     * @ORM\Column(type = "string", nullable=false)
     */
    private $firstName;

    /**
     * @ORM\Column(type = "string", nullable=false)
     */
    private $lastName;


    public function __construct()
    {
        parent::__construct();
        $this->favorites = new ArrayCollection();
    }

    /**
     * @return mixed
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * @param mixed $firstName
     */
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;
    }

    /**
     * @return mixed
     */
    public function getDiaryId()
    {
        return $this->diaryId;
    }

    /**
     * @param mixed $diaryId
     */
    public function setDiaryId($diaryId)
    {
        $this->diaryId = $diaryId;
    }

    /**
     * @return ArrayCollection|IntroToExerciseEntity[]
     */
    public function getFavorites()
    {
        return $this->favorites;
    }

    /**
     * @param mixed $favorites
     */
    public function setFavorites($favorites)
    {
        $this->favorites = $favorites;
    }

    /**
     * @return mixed
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * @param mixed $lastName
     */
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;
    }

    /**
     * @return mixed
     */
    public function getSurveyId()
    {
        return $this->surveyId;
    }

    /**
     * @param mixed $surveyId
     */
    public function setSurveyId($surveyId)
    {
        $this->surveyId = $surveyId;
    }


}