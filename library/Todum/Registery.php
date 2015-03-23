<?php
/**
 * Created by PhpStorm.
 * User: kaspercools
 * Date: 16/03/15
 * Time: 22:22
 */

namespace Todum;


class Registery
{
    private static $instance;
    private $registry;

    public static function getInstance()
    {
        if (!isset(static::$instance)) {
            static::$instance = new Registery();
        }

        return static::$instance;
    }

    function __get($key)
    {
        if (!isset($this->registry[$key])) {
            throw new \Exception("There is no entry for key " . $key);
        }

        return $this->registry[$key];

    }

    function __set($key, $value)
    {
        if (isset($this->registry[$key])) {
            throw new \Exception("There is already an entry for the given key " . $key);
        }

        $this->registry[$key] = $value;
    }


    private function __construct()
    {
    }

    private function __clone()
    {
    }
}