<?php

class Customer_Controller_Account extends Core_Controller_Front_Action
{
    // public function __construct(){

    // }

    public function registerAction()
    {
        $layout = $this->getLayout();
        $child = $layout->getChild('content');
        $layout->getChild('head')->addCss('header.css')
                            ->addCss('form.css');
        $register = $layout->createBlock('customer/register')->setTemplate('customer/register.phtml');
        $child->addChild('register', $register);
        $layout->toHtml();
    }

}