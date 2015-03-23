<?php
/**
 * Created by PhpStorm.
 * User: kaspercools
 * Date: 16/03/15
 * Time: 21:24
 */

namespace Todum\Database;

class Pdo
{
    private static $instance = NULL;

    private function __construct()
    {

    }

    private function __clone()
    {

    }

    public static function getInstance()
    {
        if (!isset(static::$instance)) {
            //$pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
            $pdo_options=[];
            static::$instance = new PDO('mysql:host=localhost;dbname=studyx', 'homestead', 'secret', $pdo_options);

        }
        return static::$instance;
    }
}