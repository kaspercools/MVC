<?php
/**
 * Created by PhpStorm.
 * User: kaspercools
 * Date: 17/03/15
 * Time: 20:36
 */

namespace model;


use Todum\Database\Pdo;

class Person {
    private $firstName;
    private $lastName;
    private $country;
    private $skills;

    public function __construct($firstName,$lastName,$country,$skills){
        $this->firstName=$firstName;
        $this->lastName=$lastName;
        $this->country=$country;
        $this->skills=$skills;
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
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * @param mixed $country
     */
    public function setCountry($country)
    {
        $this->country = $country;
    }

    /**
     * @return mixed
     */
    public function getSkills()
    {
        return $this->skills;
    }

    public function addSkill(Skill $skill){
        $this->skills[]=$skill;
    }
} 