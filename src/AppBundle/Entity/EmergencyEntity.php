<?php
/**
 * Created by PhpStorm.
 * User: FrederikPetersen
 * Date: 27/11/2017
 * Time: 13.14
 */

namespace AppBundle\Entity;

use AppBundle\Entity\User;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name = "ICOE")
 */
class EmergencyEntity
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\OneToOne(targetEntity="User")
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id", onDelete="CASCADE")
     */
    private $user;

    /**
     * @ORM\Column (type="string", nullable=true)
     */
    private $contactPerson;

    /**
     * @ORM\Column (type ="integer", nullable=true)
     */

    private $cpTelefon;

    /**
     * @ORM\Column ( type = "string", nullable=true)
     */

    private $cpEmail;

    /**
     * @ORM\Column(type = "string", nullable=true)
     */
    private $hospitalName;

    /**
     * @ORM\Column(type = "string", nullable=true)
     */

    private $hospitalAddress;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */

    private $hospitalTlf;

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
    public function getContactPerson()
    {
        return $this->contactPerson;
    }

    /**
     * @param mixed $contactPerson
     */
    public function setContactPerson($contactPerson)
    {
        $this->contactPerson = $contactPerson;
    }

    /**
     * @return mixed
     */
    public function getCpTelefon()
    {
        return $this->cpTelefon;
    }

    /**
     * @param mixed $cpTelefon
     */
    public function setCpTelefon($cpTelefon)
    {
        $this->cpTelefon = $cpTelefon;
    }

    /**
     * @return mixed
     */
    public function getCpEmail()
    {
        return $this->cpEmail;
    }

    /**
     * @param mixed $cpEmail
     */
    public function setCpEmail($cpEmail)
    {
        $this->cpEmail = $cpEmail;
    }

    /**
     * @return mixed
     */
    public function getHospitalAddress()
    {
        return $this->hospitalAddress;
    }

    /**
     * @param mixed $hospitalAddress
     */
    public function setHospitalAddress($hospitalAddress)
    {
        $this->hospitalAddress = $hospitalAddress;
    }

    /**
     * @return mixed
     */
    public function getHospitalTlf()
    {
        return $this->hospitalTlf;
    }

    /**
     * @param mixed $hospitalTlf
     */
    public function setHospitalTlf($hospitalTlf)
    {
        $this->hospitalTlf = $hospitalTlf;
    }

    /**
     * @return mixed
     */
    public function getHospitalName()
    {
        return $this->hospitalName;
    }

    /**
     * @param mixed $hospitalName
     */
    public function setHospitalName($hospitalName)
    {
        $this->hospitalName = $hospitalName;
    }
}