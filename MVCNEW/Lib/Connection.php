<?php
class Lib_Connection
{
    protected $_conn = null;

    public function __construct()
    {
        $this->connect();
    }

    public function connect()
    {
        if (is_null($this->_conn)) {
            $this->_conn = mysqli_connect("localhost", "root", "", "ccc_practice");
            if ($this->_conn === false) {
                die("<h3 style='color: red;'>ERROR: Could not connect. "
                    . mysqli_connect_error() . "</h3>");
            }
        }
        return $this->_conn;

    }

    // public function exec($sql)
    // {
    // 	try {
    // 		$test = $this->connect()->query($sql);
    // 		var_dump($this->connect()->error);
    // 	} catch(Exception $e) {

    // 		var_dump($e->getMessage());
    // 	}
    // }


    public function exec($sql)
    {
        $conn = $this->connect();
        $result = mysqli_query($conn, $sql);
        if ($result === false) {
            die("Query execution failed: " . mysqli_error($conn));
        }
        return $result;
    }
    
    public function fetchAssocAll($result)
    {
        $rows = [];
        while ($row = mysqli_fetch_assoc($result)) {
            $rows[] = $row;
        }
        return $rows;
    }
    
    public function fetch_assoc($res)
{
    $data = [];
    while ($row = mysqli_fetch_assoc($res)) {
        $data[] = $row;
    }
    return $data;
}

// public function fetch_all_assoc($result)
// {
//     $data = [];
//     while ($row = mysqli_fetch_assoc($result)) {
//         $data[] = $row;
//     }
//     return $data;
// }

// public function fetch_all_assoc($result)
// {
//     $data = [];
//     while ($row = mysqli_fetch_assoc($result)) {
//         $data[] = $row;
//     }
//     return $data;
// }
}
