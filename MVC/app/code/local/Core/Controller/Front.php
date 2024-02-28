<?php

class Core_Controller_Front
{
    public function init()
    { 
        $request = Mage::getModel('core/request');  //  req thi ek obejct lidho //url mate 
        $actionName = $request->getActionName(). 'Action'; //indexAction malse //objec thi eni mathod call thase
        $className = $request->getFullControllerClass(); //module controller action name return krse
        $controller = new $className(); //page_controller_index print thase object bnayu
       //echo "core_controller_front"; 
        $controller->$actionName();  //call ane return ahiya j thase 
       // catalog na construor ni ander product.php last ma action pass thase form
    }
}


