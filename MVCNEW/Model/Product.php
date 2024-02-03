<?php
class Model_Product extends Model_Abstract
{
    public $tableName = "ccc_product";

    public function __construct()
    {
        // echo "I'm here";
        // echo get_class($this);
    }

    public function save($data)
    {
        echo "<pre>";
        $sql = $this->getQueryBuilder()
            ->insert(
                $this->tableName,
                $data
            );
         $this->getQueryBuilder()->exec($sql);
        // echo $sql;
        // print_r($data);
    }
    public function show($column = "*", $condition = "")
    {
        $sql = $this->getQueryBuilder()->selectQuery(
            $this->tableName,
            $column,
            $condition
        );
        $result = $this->getQueryBuilder()->exec($sql);

        if ($result !== false) {
            $data = $this->getQueryBuilder()->fetch_assoc_all($result);

            if (!empty($data)) {
                return $data;
            } else {
                return [];
            }
        } else {
            return [];
        }
    }

    public function getProductById($productId)
    {
        $condition = ['product_id' => $productId];
        $result = $this->getQueryBuilder()->selectQuery($this->tableName, '*', $condition);
        $data = $this->getQueryBuilder()->fetchAssocAll($result);

        if (!empty($data)) {
            return $data[0]; // Return the first record since we're fetching by ID
        } else {
            return null; // Return null if no product is found
        }
    }


    
    

    public function getProduct($productId)
    {
        $condition = ['product_id' => $productId];
        $sql = $this->getQueryBuilder()->selectQuery(
            $this->tableName,
            "*",
            $condition
        );
        $result = $this->getQueryBuilder()->exec($sql);

        if ($result !== false) {
            return $this->getQueryBuilder()->fetch_assoc($result);
        } else {
            // Handle the error or return an empty array as per your application's logic
            return [];
        }
    }

    public function deleteProduct($productId) {
        $condition = ['product_id' => $productId];
        $sql = $this->getQueryBuilder()->delete($this->tableName, $condition);
        $this->getQueryBuilder()->exec($sql);
    }
}
