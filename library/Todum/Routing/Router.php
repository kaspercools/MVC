<?php
/**
 * Created by PhpStorm.
 * User: kaspercools
 * Date: 16/03/15
 * Time: 21:38
 */

namespace Todum\Routing;

use Todum\Registery;

class Router
{
    private static $routerInstance;
    private $application;
    const default_action = 'index';
    const default_controller = 'index';

    protected $request;

    private function __construct()
    {
        $this->buildRoute();
    }

    public static function forward($url)
    {
        $router = static::getInstance();
        $routeExtractor = new RouteExtractor();
        $routeParams = $routeExtractor->extractRoute($url);

        $router->setRoute($routeParams);
        Registery::getInstance()->application->dispatch($router);
    }

    public static function redirect($url)
    {

        if (filter_var($url, FILTER_VALIDATE_URL) === FALSE) {
            header('Location: ' . PATH . $url);
        } else {
            header('Location: ' . $url);
        }


    }

    private function buildRoute()
    {

        $routeExtractor = new RouteExtractor();
        $routeParams = $routeExtractor->extractRoute($_SERVER['REQUEST_URI']);

        $this->setRoute($routeParams);
    }

    public static function getInstance()
    {
        if (static::$routerInstance === null) {
            static::$routerInstance = new Router();
        }
        return static::$routerInstance;
    }

    /*
    *  The magic gets transforms $router->action into $router->GetAction();
    */
    public function __get($name)
    {
        if (method_exists($this, 'get' . $name))
            return $this->{'get' . $name}();
        else
            return null;
    }

    public function setRoute($route)
    {
        if (!array_key_exists('controller', $route) || $route['controller'] === null || strlen($route['controller']) == 0) {
            $route['controller'] = self::default_controller;
        }

        if (!array_key_exists('action', $route) || $route['action'] === null || strlen($route['action']) == 0) {
            $route['action'] = self::default_action;
        }


        $this->request = new Request($route);
    }

    public function getAction()
    {
        return $this->request->getAction();
    }

    public function getParams()
    {
        return $this->request->getParams();
    }

    public function isPost()
    {
        return $this->request->isPost();
    }

    public function getController()
    {
        return $this->request->getController();
    }

    public function getRequest()
    {
        return $this->request;
    }
}