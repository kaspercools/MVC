<?php
/**
 * Created by PhpStorm.
 * User: kaspercools
 * Date: 17/03/15
 * Time: 15:36
 */

namespace Todum\View;


class ViewElement implements IViewDecorator
{
    private $layoutElement;

    private $viewModel;
    private $templatePath;
    private $placeholderVariableName;
    private $templateVariables;

    public function __construct($layoutElement = null)
    {
        $this->layoutElement = $layoutElement;
        $this->templateVariables=array();
        $this->placeholderVariableName='';
    }

    public function buildView()
    {

        //do other crazy stuff
        if ($this->viewModel !== null) {
            //extract($this->viewModel->getVariables());
        }

        if ($this->getView() !== null) {
            $variables = $this->getView()->getVariables();
            //add currentTempate content to placeholdervariable

            if(strlen($this->placeholderVariableName)>0){
                $variables[$this->placeholderVariableName] = $this->render();
            }

            $this->templateVariables = (array_merge($variables,$this->templateVariables));
        }

        //call parent if exists
        if ($this->layoutElement !== null) {
            $this->templateVariables = (array_merge($this->layoutElement->buildView()->getTemplateVariables(),$this->templateVariables));
        }
        return $this;
    }


    public function setView($viewModel)
    {
        $this->viewModel = $viewModel;
    }

    public function getView()
    {
        return $this->viewModel;
    }

    public function setRenderPaths($pathArray)
    {
        $this->templatePath = $pathArray;
    }

    public function setTemplatePlaceHolderVariableName($name){
        $this->placeholderVariableName=$name;
    }

    public function render()
    {
        //do some logic before loading the viewelement
        $viewContents = null;

        if(strlen($this->placeholderVariableName)){
            extract($this->viewModel->getVariables());
        }
        else{
            extract($this->templateVariables);
        }

        switch ($this->templatePath['controller']) {
            case '#layout#':

                if (file_exists(APPLICATIONROOT . DS . 'layout' . DS . $this->templatePath['action'] . '.todum')) {
                    ob_start();
                    include(APPLICATIONROOT . DS . 'layout' . DS . $this->templatePath['action'] . '.todum');
                    $viewContents = ob_get_clean();
                } else {
                    /* throw exception */

                }
                break;
            default:
                if (file_exists(APPLICATIONROOT . DS . 'view' . DS . $this->templatePath['controller'] . DS . $this->templatePath['action'] . '.todum')) {
                    ob_start();
                    include(APPLICATIONROOT . DS . 'view' . DS . $this->templatePath['controller'] . DS . $this->templatePath['action'] . '.todum');
                    $viewContents = ob_get_clean();

                } else { /* throw exception */
                }
                break;
        }

        return $viewContents;
    }

    public function getParentVariables(){
        return $this->templateVariables;
    }

    public function getTemplateVariables(){
        return $this->templateVariables;
    }
} 