<?php
class Core_Model_Resource_Abstract {
    protected $_tableName = "";
    protected $_primaryKey = "";
    public function init($tableName,$primaryKey)
    {
        $this->_tableName = $tableName;
        $this->_primaryKey = $primaryKey;
    }
    public function getPrimaryKey(){
        return $this->_primaryKey;
    }
    public function getTableName(){
        return $this->_tableName;
    }

    public function load($id,$column=null){
        $query = "SELECT * FROM {$this->_tableName} WHERE {$this->_primaryKey}={$id}";
        return $this->getAdapter()->fetchRow($query);
    }
    public function save(Catalog_Model_Product $product){
        $data = $product->getData();
        if(isset($data[$this->getPrimaryKey()])){  
            unset($data[$this->getPrimaryKey()]);
         }
        // echo $this->insertSql($this->getTableName(),$data);
        $sql =  $this->insertSql($this->getTableName(),$data);
        $id = $this->getAdapter()->insert($sql);
        $product->setId($id);
        // var_dump($id);
        // print_r($product->getData());
        
        // echo 8999;
        // print_r($data);
    }

    public function insertSql($tableName, $data)
    {
        $columns = $values = [];
        foreach ($data as $key => $value) {
            $columns[] = sprintf("`%s`", $key);
            $values[]  = sprintf("'%s'", ($value));
        }
        $columns = implode(",", $columns);
        $values = implode(",", $values);
        return "INSERT INTO {$tableName} ({$columns}) VALUES ({$values});";
    }

    public function getAdapter(){
        return new Core_Model_DB_Adapter();
    }
}
