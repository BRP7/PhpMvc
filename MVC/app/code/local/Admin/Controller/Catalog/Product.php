<?php
class Admin_Controller_Catalog_Product extends Core_Controller_Front_Action
{
    public function setFormCss()
    {
        $layout = $this->getLayout();
        $layout->getChild('head')
            ->addCss('form.css');
    }

    public function formAction()
    {
        $this->setFormCss();
        $layout = $this->getLayout();
        $child = $layout->getChild('content');
        $productForm = $layout->createBlock('catalog/admin_product_form');//constructor
        $child->addChild('form', $productForm);
        $layout->toHtml();
    }


    public function saveAction()
    {
        $data = $this->getRequest()->getparams("catalog_product");
        $product = Mage::getModel('catalog/product')
            ->setData($data);
        $product->save();
    }

    public function deleteAction()
    {
        $id = $this->getRequest()->getparams("id");
        $product = Mage::getModel("catalog/product")->load($id);
        $product->delete();
    }

    public function listAction()
    {
        $layout = $this->getLayout();
        $child = $layout->getchild('content'); //core_block_layout
        $productForm = $layout->createBlock('catalog/admin_product_list');
        $child->addchild('list', $productForm);
        $layout->toHtml();

    }
}










