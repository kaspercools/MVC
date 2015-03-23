<?php
/**
 * Created by PhpStorm.
 * User: kaspercools
 * Date: 16/03/15
 * Time: 22:08
 */

namespace controller;

use Todum\Controller;
use Todum\Routing\Router;
use Todum\View\ViewModel;

class Index extends Controller
{
    public function initialise()
    {
        // TODO: Implement initialise() method.
    }

    public function indexAction()
    {
        //do some logic
        /*
        Registery::getInstance()->application->disableViewRenderer();

        $result['name']='kasper cools';
        $result['skills']='php??';
        echo json_encode($result);
        */
        return new ViewModel(array('params' => $this->getRequest()->getParams()));
    }

    public function forwardAction()
    {
        //do some logic
        Router::forward('book/index');
    }

    public function searchAction()
    {

        return new ViewModel(array('facebook' => '<h2>this is a test</h2>'));
    }
}