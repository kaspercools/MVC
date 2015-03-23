<?php

/**
 * Created by PhpStorm.
 * User: kaspercools
 * Date: 16/03/15
 * Time: 21:17
 */
namespace Todum;

use Todum\Routing\Router;
use Todum\View\ViewElement;
use Todum\View\ViewModel;

abstract class Application
{
    /**
     * @var View
     */
    private $currentView;
    private $disableViewRender;
    private $enableLayout = true;

    public function __construct()
    {
        $this->disableViewRender = false;
    }

    final public function run()
    {
        //register and setup router for the first time
        $this->registerFrameworkWideVariables();
        $this->setReporting();
        $this->removeMagicQuotes();
        $this->unregisterGlobals();
        //dispatch controller
        $this->dispatch(Registery::getInstance()->router);

        if (!$this->disableViewRender) {
            //show view
            $this->renderView();
        }
    }

    public function registerFrameworkWideVariables()
    {
        $registery = Registery::getInstance();
        $registery->router = Router::getInstance();
        $registery->application = $this;
    }

    public function dispatch($router)
    {
        //get the router instance

        //format the controllername as we want it to be eb xController
        $controller = 'controller\\' . ucwords($router->getController());
        $action = $router->getAction() . 'Action';

        if (class_exists($controller)) {
            $dispatch = new $controller($router->getRequest());

            //do some other crazy stuff and eventually call the initialise method
            $dispatch->initialise();

            if ((int)method_exists($dispatch, $action)) {
                $returnVal = $dispatch->$action();

                if (isset($returnVal)) {
                    $this->setViewModel($returnVal);
                }
            } else {
                /* Error Generation Code Here */
                Router::forward('error');
            }
        } else {
            /* Error Generation Code Here */
            Router::forward('error');
        }
    }

    public function setViewModel($view)
    {

        $this->currentView = $view;
    }

    private function setReporting()
    {
        if (DEBUG == true) {
            error_reporting(E_ALL);
            ini_set('display_errors', 'On');
        } else {
            error_reporting(E_ALL);
            ini_set('display_errors', 'Off');
            ini_set('log_errors', 'On');
            ini_set('error_log', ROOT . DS . 'tmp' . DS . 'logs' . DS . 'error.log');
        }
    }

    private function stripSlashesDeep($value)
    {
        $value = is_array($value) ? array_map(array($this, 'strip_slashes_deep'), $value) : stripslashes($value);
        return $value;
    }

    private function removeMagicQuotes()
    {
        if (get_magic_quotes_gpc()) {
            $_GET = $this->stripSlashesDeep($_GET);
            $_POST = $this->stripSlashesDeep($_POST);
            $_COOKIE = $this->stripSlashesDeep($_COOKIE);
        }
    }

    private function unregisterGlobals()
    {
        if (ini_get('register_globals')) {
            $array = array('_SESSION', '_POST', '_GET', '_COOKIE', '_REQUEST', '_SERVER', '_ENV', '_FILES');

            foreach ($array as $value) {
                foreach ($GLOBALS[$value] as $key => $var) {
                    if ($var === $GLOBALS[$key]) {
                        unset($GLOBALS[$key]);
                    }
                }
            }
        }
    }

    public function renderView()
    {
        $view = null;
        $layoutVariables = [];
        $router = Registery::getInstance()->router;

        //we need to build our decorators
        //this is pretty static, we could define some kind of config file to make this dynamic
        $layout = new ViewElement();
        $footerViewModel = new ViewModel();
        $layout->setView($footerViewModel);
        $layout->setTemplatePlaceHolderVariableName('footerPlaceholder');
        $layout->setRenderPaths(array('controller'=>'#layout#','action'=>'footer'));

        $layout = new ViewElement($layout);
        $layout->setView(new ViewModel());
        $layout->setTemplatePlaceHolderVariableName('headerPlaceholder');
        $layout->setRenderPaths(array('controller'=>'#layout#','action'=>'header'));


        $layout = new ViewElement($layout);
        $layout->setView($this->currentView);
        $layout->setTemplatePlaceHolderVariableName('contentPlaceholder');
        $layout->setRenderPaths(array('controller'=>$router->getController(),'action'=>$router->getAction()));

        $layout = new ViewElement($layout);
        $layout->setView(new ViewModel());
        $layout->setRenderPaths(array('controller'=>'#layout#','action'=>'main'));

        echo $layout->buildView()->render();

    }

    public function disableViewRenderer()
    {
        $this->disableViewRender = true;
    }

    public function enableViewRenderer()
    {
        $this->disableViewRender = false;
    }

    public function disableLayout()
    {
        $this->enableLayout = false;
    }

    public function enableLayout()
    {
        $this->enableLayout = true;
    }
}