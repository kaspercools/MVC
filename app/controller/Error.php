<?php
/**
 * Created by PhpStorm.
 * User: kaspercools
 * Date: 17/03/15
 * Time: 14:23
 */

namespace controller;


use Todum\Registery;
use Todum\View\ViewModel;
use Todum\Controller;

class Error extends Controller
{

    public function initialise()
    {
        // TODO: Implement initialise() method.
    }

    public function indexAction()
    {

        return new ViewModel(array('error' => 'Todum..?! WHAT THE ****, you lost me!'));
    }
} 