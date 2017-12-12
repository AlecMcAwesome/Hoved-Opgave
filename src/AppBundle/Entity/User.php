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
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\IntroToExerciseEntity", inversedBy="userFavorites")
     * @ORM\JoinColumn(name="favorites", referencedColumnName="usersFavorite", onDelete ="cascade")
     */
    private $favorites;

    /**
     * @ORM\Column(type = "string", nullable=true)
     */
    private $firstName;

    /**
     * @ORM\Column(type = "string", nullable=true)
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
     * @return mixed
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




}