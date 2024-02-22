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
        $productForm = $layout->createBlock('catalog/admin_product');//catalog_block_admin_product
        $child->addChild('form', $productForm);
        $layout->toHtml();
        // print_r($layout->getChild('head')->getCss());
    }

    public function saveAction()
    {
        //Admin_Controller_Catalog_Product (id check update and inser)
        //Catalog_Model_Product->Core_Model_Abstract->setData->data variable ma store(data)
        //catalog_Model_Product->Core_Model_Abstract->save->Catalog_Model_Reasource_Product(obj)->save()
        //Catalog_Model_Reasource_Product->constructor->init()->Core_Model_Resource_Abstract->save->inser query->adapter->execute  
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
        $product= Mage::getModel('catalog/product');
        $id= $this->getRequest()->getParams('id');
          $product->delete($id);
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
        // $this->includeCss();
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


