<?php

class Page_Controller_Index extends Core_Controller_Front_Action
{
    public function indexAction()
    {
        $layout = $this->getLayout(); //core_block_layout
        $layout->getChild('head');
        // echo "<pre>";
        // $layout->getChild('head');
        $layout->getChild('head')->addCss('css/navigation.css');
        $layout->getChild('head')->addCss('css/page.css');
        // $layout->getChild('content');

        $banner = $layout->createBlock('core/template')//core_block_template no obj mlse
            ->setTemplate('banner/banner.phtml'); //set template abstrct ma thay che toh ema javanu
        $layout->getChild('content')//obj
            ->addChild('banner', $banner) // obj array ma store kari dese
            ->addChild('banner1', $banner);
        $layout->toHtml();
    }
    public function saveAction()
    {
        echo "Save Page";
    }
    public function listAction()
    {
        echo "List Page";
    }
}









