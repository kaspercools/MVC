<?php
/**
 * Created by PhpStorm.
 * User: kaspercools
 * Date: 17/03/15
 * Time: 11:36
 */

namespace Todum\Routing;


class Request
{

    /**
     * @var string
     */
    private $action;

    /**
     * @var string
     */
    private $controller;

    /**
     * @var array
     */
    private $params;

    public function __construct($route)
    {
        $this->controller = $route['controller'];
        $this->action = $route['action'];
        $this->params = $route['params'];
    }

    /**
     * @return string
     */
    public function getAction()
    {
        return $this->action;
    }


    /**
     * @return string
     */
    public function getController()
    {
        return $this->controller;
    }

    /**
     * @return array
     */
    public function getParams()
    {
        return $this->params;
    }

    public function isPost()
    {
        return ($_SERVER['REQUEST_METHOD'] === 'POST');
    }

} 