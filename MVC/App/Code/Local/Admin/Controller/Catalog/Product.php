<?php

class Admin_Controller_Catalog_Product extends Core_Controller_Front_Action
{
    
    public function setFormCss()
    {
        $layout = $this->getLayout();
        $layout->getChild('head')
            ->addCss('form.css');
            // print_r($layout->getChild('head')->getCss());
    }
    public function formAction()
    { 
        $this->setFormCss();
        $layout = $this->getLayout();
        $child = $layout->getChild('content');
        $productForm = $layout->createBlock('catalog/admin_product');
        $child->addChild('form', $productForm);
        $layout->toHtml();
        // print_r($layout->getChild('head')->getCss());
    }

    public function saveAction()
    {
        echo "<pre>";
        $obj = Mage::getModel('core/request');
        $id = $obj->getQueryData('id');

        if ($id) {
            $data = ['name' => 'BMW'];
        } else {
            $data = $this->getRequest()->getParams('catalog_product');
        }
        $product = Mage::getModel('catalog/product')
            ->setData($data);
        $product->save();


    }
    public function deleteAction()
    {
        $obj = Mage::getModel('core/request');
        $id = $obj->getQueryData('id');
        $product = Mage::getModel('catalog/product')
            ->setData(['product_id' => $id]);
        $product->delete();
    }

    // public function saveAction(){
    //     // echo "<pre>";
    //     $this->includeCss();
    //     $data= $this->getRequest()->getParams('catalog_product');//core_model_request
    //     $product = Mage::getModel('catalog/product')
    //             ->setData($data)
    //             ->save();
    //     // print_r($product);
    // }
    public function updateAction(){
        // echo "<pre>";
        $this->includeCss();
        $data= ["name"=>"Hello"];
        $product = Mage::getModel('catalog/product')
                ->setData($data)
                ->update();
        print_r($product);
    }
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


