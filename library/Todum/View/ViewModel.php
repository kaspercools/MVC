<?php
/**
 * Created by PhpStorm.
 * User: kaspercools
 * Date: 16/03/15
 * Time: 22:06
 */

namespace Todum\View;


class ViewModel
{
    protected $variables = array();

    public function __construct($model = null)
    {
        $this->variables = ($model == null) ? [] : $model;
    }

    function set($name, $value)
    {
        $this->variables[$name] = $value;
    }

    public function getVariables(){

        return $this->variables;
    }
} 