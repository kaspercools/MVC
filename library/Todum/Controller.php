<?php
/**
 * Created by PhpStorm.
 * User: kaspercools
 * Date: 16/03/15
 * Time: 22:01
 */

namespace Todum;


abstract class Controller
{
    private $request;

    public function __construct($request)
    {
        $this->request = $request;
    }

    /**
     * @return array
     */
    public function getRequest()
    {
        return $this->request;
    }

    /**
     * @param mixed $request
     */
    public function setRequest($request)
    {
        $this->request = $request;
    }


    public abstract function initialise();

} 