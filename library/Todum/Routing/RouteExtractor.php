<?php
/**
 * Created by PhpStorm.
 * User: kaspercools
 * Date: 17/03/15
 * Time: 10:10
 */

namespace Todum\Routing;

class RouteExtractor
{
    /**
     * init other parameters
     */

    public function extractRoute($url)
    {
        $routeResult = ['controller' => null, 'action' => null, 'params' => array()];
        $linkUrlBasedParams = array();

        if ($_GET) {
            $url = substr($_SERVER['REQUEST_URI'], 0, strpos($_SERVER['REQUEST_URI'], "?"));
        }

        $linkUrlBasedParams = explode('/', trim($url, '/'));


        $linkUrlBasedParams = array_values($linkUrlBasedParams);
        if (count($linkUrlBasedParams) >= 1) {
            $routeResult['controller'] = $linkUrlBasedParams[0];

        }

        $linkUrlBasedParams = array_values($linkUrlBasedParams);

        if (count($linkUrlBasedParams) >= 2) {
            $routeResult['action'] = $linkUrlBasedParams[1];
        }

        //do some magic
        if (count($linkUrlBasedParams) >= 3) {
            unset($linkUrlBasedParams[0]);
            unset($linkUrlBasedParams[1]);
            $linkUrlBasedParams = array_values($linkUrlBasedParams);

            $result = array();

            while (count($linkUrlBasedParams)) {
                list($key, $value) = array_splice($linkUrlBasedParams, 0, 2);
                $result[$key] = $value;
            }

            $routeResult['params'] = $result;
            //$get values toevoegen/ $po st
        }

        //merge arrays
        $routeResult['params'] = array_merge($_GET, $_POST, $routeResult['params']);

        return $routeResult;
    }
} 