<?php
/**
 * Created by PhpStorm.
 * User: kaspercools
 * Date: 17/03/15
 * Time: 19:59
 */

namespace controller;


use model\Person;
use model\Skill;
use Todum\Controller;
use Todum\Database\Pdo;
use Todum\View\ViewModel;

class About extends Controller
{
    public function initialise()
    {
        // TODO: Implement initialise() method.
    }

    public function indexAction()
    {

        $kasper = new Person("Kasper", "Cools", "Belgium", [
                new Skill('PHP', 1),
                new Skill('RESTfull API Design', 3),
                new Skill('AngularJS', 3),
                new Skill('Design Patterns', 2),
                new Skill('...', 1)
            ]
        );
        return new ViewModel(array('model' => $kasper));
    }
} 