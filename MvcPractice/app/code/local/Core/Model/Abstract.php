<?php
class Core_Model_Abstract
{
    protected $_data = [];
    protected $_resourceClass = '';
    protected $_collectionClass = '';
    protected $_resource = null;
    protected $_collection = null;
    public function __construct()
    {
        // echo 'Core_Model_Abstract';
        $this->init();
    }
    public function setResourceClass($resourceClass)
    {
    }
    public function setCollectionClass($collectionClass)
    {
    }
    public function setId($id)
    {
        $this->_data[$this->getResource()->getPrimaryKey()] = $id;
        return $this;
    }
    public function getId()
    {
        return isset($this->_data[$this->getResource()->getPrimaryKey()])
        ? $this->_data[$this->getResource()->getPrimaryKey()]
        : '';
    }
    public function getResource()
    {
        // $modelClass = get_class($this);
        // $modelClass = str_replace('_Model_', '_Model_Resource_', $modelClass);
        return new $this->_resourceClass();// Catalog_Model_Resource_Product
    }
    public function getCollection()
    {
         $collection = new $this->_collectionClass();//obj  Catalog_Model_Resource_Collection_Product
         $collection->setResource($this->getResource());// Catalog_Model_Resource_Product
         $collection->select();
         return $collection;
    }

    public function getTableName()
    {
    }
    public function camelCase2UnderScore($str, $separator = "_")
    {
        if (empty($str)) {
            return $str;
        }
        $str = lcfirst($str);
        $str = preg_replace("/[A-Z]/", $separator . "$0", $str);
        return strtolower($str);
    }
    public function __call($method, $args)
    {
        $name = $this->camelCase2UnderScore(substr($method, 3));
        return isset($this->_data[$name])
            ? $this->_data[$name]
            : '';
    }
    public function __set($key, $value)
    {
    }
    public function __get($key)
    {
    }
    public function __unset($key)
    {
    }
    public function getData($key = null)
    {
        return $this->_data;
    }
    public function setData($data)
    {
        $this->_data = $data;
        return $this;
    }
    public function addData($key, $value)
    {
    }
    public function removeData($key = null)
    {
    }
    public function save()
    {
        $this->getResource()
            ->save($this);
        return $this;
    }
    public function delete()
    {
        if($this->getId()) {
        $this->getResource()
            ->delete($this);
        }
        return $this;
    }
    public function load($id, $column = null)
    {
        
        $this->_data = $this->getResource()->load($id, $column);
        return $this;
    }
}

?>