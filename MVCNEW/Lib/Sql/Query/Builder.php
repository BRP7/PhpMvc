<?php
class Lib_Sql_Query_Builder extends Lib_Connection
{
    public function __construct()
    {
        // echo get_class($this);
    }

    public function insert($tableName, $data)
    {
        $columns = $values = [];
        foreach ($data as $key => $value) {
            $columns[] = sprintf("`%s`", $key);
            $values[]  = sprintf("'%s'", addslashes($value));
        }
        $columns = implode(",", $columns);
        $values = implode(",", $values);
        return "INSERT INTO {$tableName} ({$columns}) VALUES ({$values});";
    }
    public function selectQuery($table, $columns = "*", $condition = "")
    {
        if ($columns === "*") {
            $columns = "*";
        } else {
            $columns = "`" . str_replace(",", "`,`", $columns) . "`";
        }

        $query = "SELECT $columns FROM $table";

        if (!empty($condition)) {
            $query .= " WHERE $condition";
        }

        return $query;
    }
    
    
    
    
    public function update($tableName, $data, $condition)
    {
        $set = "";
        foreach ($data as $key => $value) {
            $set .= "`$key` = '$value', ";
        }
        $set = rtrim($set, ", ");

        $whereClause = $this->buildWhereClause($condition);

        return "UPDATE $tableName SET $set WHERE $whereClause";
    }

    public function delete($tableName, $condition)
    {
        $whereClause = $this->buildWhereClause($condition);
        return "DELETE FROM $tableName WHERE $whereClause";
    }

    private function buildWhereClause($condition)
    {
        $whereClause = "";
        foreach ($condition as $key => $value) {
            $whereClause .= "`$key` = '$value' AND ";
        }
        return rtrim($whereClause, " AND ");
    }
    
}
