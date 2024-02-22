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
        $obj = Mage::getModel('core/request');
        $id = $obj->getQueryData('id');
        if ($id) {
            $data = $product->getData();
            $sql = $this->editSql($this->getTableName(), $data, ['product_id' => $id]);
            $id = $this->getAdapter()->update($sql);
        } else {
            $data = $product->getData();
            if (isset($data[$this->getPrimaryKey()])) {
                unset($data[$this->getPrimaryKey()]);
            }
            $sql = $this->insertSql($this->getTableName(), $data);
            echo $sql;
            $id = $this->getAdapter()->insert($sql);
            $product->setId($id);
            // print_r($product->getData());
        }
    }
    
    public function delete($id){
        $where = [$this->_primaryKey=>$id];
        $sql = $this->deleteSql($this->getTableName(), $where);
        $this->getAdapter()->delete($sql); 

    }
    
    function editSql( $table, $data, $condition=[]) {
        $set = "";
        foreach ($data as $key => $value) {
            $set .= "$key = '$value', ";
        }
        $set = rtrim($set, ", ");
    
        $conditions = "";
        foreach ($condition as $key => $value) {
            $conditions .= "$key = '$value' AND ";
        }
        $conditions = rtrim($conditions, " AND ");
        $query = "UPDATE $table SET $set WHERE $conditions";
        return $query;
    }
    public function deleteSql($table_name, $where)
    {
        $where_con_arr = [];
        foreach ($where as $field => $value) {
            $where_con_arr[] = "`$field`='$value'";
        }
        $where_con_str = implode(" AND ", $where_con_arr);
        return "DELETE FROM {$table_name} WHERE {$where_con_str}";

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
