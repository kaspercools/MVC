<?php
/**
 * Created by PhpStorm.
 * User: kaspercools
 * Date: 18/03/15
 * Time: 06:21
 */

namespace model;


class Skill {
    /**
     * var @string
     */
    private $name;
    /**
     * var @string
     */
    private $level;

    public function __construct($name,$level){
        $this->name=$name;
        $this->level=$level;
    }

    /**
     * @return mixed
     */
    public function getLevel()
    {
        return $this->level;
    }

    /**
     * @param mixed $level
     */
    public function setLevel($level)
    {
        $this->level = $level;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }
} 