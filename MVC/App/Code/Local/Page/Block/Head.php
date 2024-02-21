<?php
class Page_Block_Head extends Core_Block_Template{
    protected $_css = array();
    protected $_js = array();
    public function __construct(){
        $this->setTemplate('page/head.phtml');
    }
    public function addJs($file){
        $this->_js[] = $file;
        return $this;
    }
    public function addCss($file){
        // $fullPath = Mage::getBaseDir('Skin')."/Css/".ucfirst($file);
        $this->_css[] = $file;
        // print_r($this->_css);

        return $this;   
    }

    public function getCssUrl($_css){
        return Mage::getBaseUrl('Skin/Css/' . $_css);
    }
    public function getJsUrl($_js){
        return Mage::getBaseUrl('/Skin/Js/'. $_js);
    }

    public function getJs(){
        return $this->_js;
    }
    public function getCss(){
        // echo "<br>";
        // print_r($this->_css);
        return $this->_css;
    }
}