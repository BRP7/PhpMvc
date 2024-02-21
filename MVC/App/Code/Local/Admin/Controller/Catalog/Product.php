<?php

class Admin_Controller_Catalog_Product extends Core_Controller_Front_Action
{
    
    public function includeCss()
    {
        $layout = $this->getLayout();
        $layout->getChild('head')
            ->addCss('header.css')
            ->addCss('footer.css')
            ->addCss('form.css');
            // print_r($layout->getChild('head')->getCss());
    }
    public function formAction()
    { 
        $this->includeCss();
        $layout = $this->getLayout();
        $child = $layout->getChild('content');
        $productForm = $layout->createBlock('catalog/admin_product');
        $child->addChild('form', $productForm);
        $layout->toHtml();
        // print_r($layout->getChild('head')->getCss());
        

    }

    public function saveAction(){
        // echo "<pre>";
        $this->includeCss();
        $data= $this->getRequest()->getParams('catalog_product');//core_model_request
        $product = Mage::getModel('catalog/product')
                ->setData($data)
                ->save();
        // print_r($product);
    }













    // public function listAction()
    // {
    //     $layout = $this->getLayout();
    //     $layout->getChild('head')->addJs('js/page.js');
    //     $layout->getChild('head')->addJs('js/head.js');
    //     $layout->getChild('head')->addCss('css/page.css');
    //     $layout->getChild('head')->addCss('css/head.css');
    //     $child = $layout->getChild('content');

    //     $productForm = $layout->createBlock('catalog/admin_product_list')
    //         ->setTemplate('product/list.phtml');
    //     $child->addChild('list', $productForm);


    //     $layout->toHtml();

    // }
    // public function saveAction()
    // {
    //     $data = $this->getRequest()->getParams('catalog_product');
    //     echo "<pre>";
    //     // print_r($data);
    //     // echo die;
    //     $productModel = Mage::getModel('catalog/product');
    //     $productModel->setData($data)->save();
    //     print_r($productModel);

    // }


}