<?php
/**
 * Created by PhpStorm.
 * User: FrederikPetersen
 * Date: 01/12/2017
 * Time: 14.59
 */

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\DBAL\Migrations\Provider\SchemaProviderInterface;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name ="intro_To_Exercise")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ExerciseRepository")
 */
class IntroToExerciseEntity
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var \Doctrine\Common\Collections\Collection|User[]
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\User", inversedBy="favorites")
     * @ORM\JoinTable(name ="user_Favorites",
     *  joinColumns={
     *      @ORM\JoinColumn(name="exercise_id", referencedColumnName="id")
     *  },
     *  inverseJoinColumns={
     *      @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     *  })
     */
    private $userfavorites;

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    private $title;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $text;

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    private $link;

    public function __construct()
    {
        $this->userfavorites = new ArrayCollection();
    }

    public function addUserFavorite(User $user)
    {
        if($this->userfavorites->contains($user)){
            return;
        }
        $this->userfavorites[] = $user;
    }

    public function removeUserFavorite(User $user)
    {
        $this->userfavorites->removeElement($user);
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return ArrayCollection|User[]
     */
    public function getUserfavorites()
    {
        return $this->userfavorites;
    }

    /**
     * @param mixed $userfavorites
     */
    public function setUserfavorites($userfavorites)
    {
        $this->userfavorites = $userfavorites;
    }

    /**
     * @return mixed
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param mixed $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * @return mixed
     */
    public function getText()
    {
        return $this->text;
    }

    /**
     * @param mixed $text
     */
    public function setText($text)
    {
        $this->text = $text;
    }

    /**
     * @return mixed
     */
    public function getLink()
    {
        return $this->link;
    }

    /**
     * @param mixed $link
     */
    public function setLink($link)
    {
        $this->link = $link;
    }


}