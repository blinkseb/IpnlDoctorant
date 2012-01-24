<?php

namespace Madalynn\MainBundle\Entity;

use FOS\UserBundle\Entity\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * User
 *
 * @author Sébastien Brochet <blinkseb@madalynn.eu>
 *
 *
 * @ORM\Entity
 * @ORM\Table(name="doct_user")
 */
class User extends BaseUser
{

    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(length=255)
     *
     * @Assert\NotBlank
     */
    private $firstname;

    /**
     * @ORM\Column(length=255)
     *
     * @Assert\NotBlank
     */
    private $lastname;

    /**
     * @ORM\Column(type = "date")
     * @Assert\Date
     */
    private $birthday;

    /**
     * @ORM\Column(length=100, name = "groupe")
     *
     * @Assert\NotBlank
     */
    private $group;

    /**
     * @ORM\Column(type="smallint")
     * @Assert\Min(limit = -1, message = "L'étage doit être >= à -1")
     * @Assert\Max(limit = 5, message = "L'étage doit être <= à 5")
     */
    private $level;

    /**
     * @ORM\Column(length=15)
     *
     * @Assert\NotBlank
     */
    private $phone;

    /**
     * @ORM\Column(type="integer")
     *
     * @Assert\NotBlank
     */
    private $office;

    /**
     * @ORM\Column(length=100)
     *
     * @Assert\NotBlank
     */
    private $thesis;

    /**
     * @ORM\Column(type = "date")
     * @Assert\Date
     */
    private $beginningyear;

    /**
     * @ORM\Column(type = "date")
     * @Assert\Date
     */
    private $soutenance;

    /**
     * @ORM\Column()
     * @Assert\Choice(choices = {"DOCTORANT", "EX-DOCTORANT", "OTHER"})
     */
    private $status;

    public function __construct()
    {
        parent::__construct();
    }

    public function getFormatedLevel()
    {
        switch ($this->level) {
            case 0:
                return 'Rez-de-chaussée';
            case 1:
                return '1<sup>er</sup> étage';
            default:
                return $this->level . '<sup>ème</sup> étage';
        }
    }

    public function getThesisYear()
    {
        return $this->beginningyear->diff(new \DateTime())->y + 1;
    }

    public function getFormatedThesisYear()
    {
        $year = $this->getThesisYear();
        switch ($year) {
            default:
                return $year . '<sup>ème</sup> année';
            case 1:
                return '1<sup>ère</sup> année';
        }
    }

    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set firstname
     *
     * @param string $firstname
     * @return User
     */
    public function setFirstname($firstname)
    {
        $this->firstname = $firstname;
        return $this;
    }

    /**
     * Get firstname
     *
     * @return string
     */
    public function getFirstname()
    {
        return $this->firstname;
    }

    /**
     * Set lastname
     *
     * @param string $lastname
     * @return User
     */
    public function setLastname($lastname)
    {
        $this->lastname = $lastname;
        return $this;
    }

    /**
     * Get lastname
     *
     * @return string
     */
    public function getLastname()
    {
        return $this->lastname;
    }

    /**
     * Set group
     *
     * @param string $group
     * @return User
     */
    public function setGroup($group)
    {
        $this->group = $group;
        return $this;
    }

    /**
     * Get group
     *
     * @return string
     */
    public function getGroup()
    {
        return $this->group;
    }

    /**
     * Set level
     *
     * @param smallint $level
     * @return User
     */
    public function setLevel($level)
    {
        $this->level = $level;
        return $this;
    }

    /**
     * Get level
     *
     * @return smallint
     */
    public function getLevel()
    {
        return $this->level;
    }

    /**
     * Set phone
     *
     * @param string $phone
     * @return User
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;
        return $this;
    }

    /**
     * Get phone
     *
     * @return string
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * Set thesis
     *
     * @param string $thesis
     * @return User
     */
    public function setThesis($thesis)
    {
        $this->thesis = $thesis;
        return $this;
    }

    /**
     * Get thesis
     *
     * @return string
     */
    public function getThesis()
    {
        return $this->thesis;
    }

    /**
     * Set beginningyear
     *
     * @param date $beginningyear
     * @return User
     */
    public function setBeginningyear($beginningyear)
    {
        $this->beginningyear = $beginningyear;
        return $this;
    }

    /**
     * Get beginningyear
     *
     * @return date
     */
    public function getBeginningyear()
    {
        return $this->beginningyear;
    }

    /**
     * Set soutenance
     *
     * @param date $soutenance
     * @return User
     */
    public function setSoutenance($soutenance)
    {
        $this->soutenance = $soutenance;
        return $this;
    }

    /**
     * Get soutenance
     *
     * @return date
     */
    public function getSoutenance()
    {
        return $this->soutenance;
    }

    /**
     * Set status
     *
     * @param string $status
     * @return User
     */
    public function setStatus($status)
    {
        $this->status = $status;
        return $this;
    }

    /**
     * Get status
     *
     * @return string
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set office
     *
     * @param integer $office
     * @return User
     */
    public function setOffice($office)
    {
        $this->office = $office;
        return $this;
    }

    /**
     * Get office
     *
     * @return integer
     */
    public function getOffice()
    {
        return $this->office;
    }


    /**
     * Set birthday
     *
     * @param date $birthday
     * @return User
     */
    public function setBirthday($birthday)
    {
        $this->birthday = $birthday;
        return $this;
    }

    /**
     * Get birthday
     *
     * @return date
     */
    public function getBirthday()
    {
        return $this->birthday;
    }
}