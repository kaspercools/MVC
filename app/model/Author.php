<?php
/**
 * Created by PhpStorm.
 * User: kaspercools
 * Date: 18/03/15
 * Time: 07:18
 */

namespace model;


class Author {
    /**
     * @var string
     */
    private $firstName;

    /**
     * @var string
     */
    private $lastName;

    function __construct($firstName,$lastName)
    {
        $this->firstName=$firstName;
        $this->lastName=$lastName;
    }


    /**
     * @return string
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * @param string $firstName
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
} 