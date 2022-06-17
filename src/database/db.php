<?php

class Database
{

    private $host = "localhost";
    private $username = "root";
    private $password = "";
    private $db = "find_a_job";
    private $queryBuilderString = "";

    // function create(){
    //     $sql = 'CREATE Database IF NOT EXISTS DR_findAjob';
    //     $connection = mysqli_connect($this->host,$this->username,$this->password);
    //     return mysqli_query($connection,$sql);
    // }

    function str($param)
    {
        return "'$param'";
    }

    function connect()
    {
        return mysqli_connect($this->host, $this->username, $this->password, $this->db);
    }

    function query($sqlQuery)
    {

        $conn = $this->connect();
        return mysqli_query($conn, $sqlQuery);
    }

    function querySelectAll($tableName)
    {

        $conn = $this->connect();
        return mysqli_query($conn, "SELECT * FROM $tableName");
    }

    // function fetch($tableName) {

    //     $resultArray    = array();
    //     $query          = "SELECT * FROM $tableName";
    //     $fetchResponse  = $this->query($query);

    //     while($data = mysqli_fetch_assoc($fetchResponse)) {
    //         array_push($resultArray, $data);
    //     }

    //     return $resultArray;
    // }

    function fetchQuery($query)
    {

        $resultArray    = array();
        $fetchResponse  = $this->query($query);

        while ($data = mysqli_fetch_array($fetchResponse)) {
            array_push($resultArray, $data);
        }

        return $resultArray;
    }

    function selectAll($tableName)
    {

        $this->queryBuilderString = "";

        $query = "SELECT * FROM $tableName";
        $this->queryBuilderString .= "$query ";
        return $this;
    }

    function insert($tableName, $queryPropertyCollection)
    {

        $queryKeys     = "";
        $queryValues    = "";

        foreach ($queryPropertyCollection as $key => $value) {

            $queryKeys .= ($key . ",");
            $queryValues .= ($value . ",");
        }

        $queryKeys     = substr($queryKeys, 0, strlen($queryKeys) - 1);
        $queryValues    = substr($queryValues, 0, strlen($queryValues) - 1);

        $query = "INSERT INTO $tableName($queryKeys) VALUES($queryValues)";

        // $this->query($query);
        return $query;
    }

    // UPDATE {table_name} 
    // SET column1 = value1, column2 = value2
    function update($tableName, $queryPropertyCollection)
    {

        $this->queryBuilderString = "";

        $updateQueryKeyValue = "";
        foreach ($queryPropertyCollection as $key => $value) {
            $updateQueryKeyValue .= "$key = $value,";
        }

        $updateQueryKeyValue = substr($updateQueryKeyValue, 0, strlen($updateQueryKeyValue) - 1);
        $query = "UPDATE $tableName SET $updateQueryKeyValue ";
        // self::query($query);
        $this->queryBuilderString .= " $query";
        return $this;
    }

    // DELETE {table_name}
    // WHERE []
    function delete($tableName)
    {

        $query = "DELETE FROM $tableName ";
        // $this->query($query);
        $this->queryBuilderString = " $query";
        return $this;
    }

    function where($queryPropertyCollection)
    {
        // WHERE a = ? AND / OR b = ?

        $whereQuery = "";
        $whereQueryArray = array();
        foreach ($queryPropertyCollection as $key => $value) {
            // $whereQuery .= "$key = $value";
            array_push($whereQueryArray, ("$key = $value"));
        }

        $whereQuery = implode(" AND ", $whereQueryArray);
        $query = "WHERE $whereQuery";
        $this->queryBuilderString .= $query;

        return $this;
    }

    function orderby($orderby)
    {
        $query = "ORDER BY $orderby";
        $this->queryBuilderString .= $query;

        return $this;
    }

    function conc($string)
    {
        $this->queryBuilderString .= $string;

        return $this;
    }

    function newQueryStr($query)
    {
        $this->queryBuilderString = $query;

        return $this;
    }

    function execute()
    {
        return $this->queryBuilderString;
    }

    function countJobs($count_table, $newQuery)
    {
        $products_page = 3;
        $total_products = "SELECT COUNT(*) FROM tb_jobs $count_table ";
        // echo($total_products);
        $result = $this->query($total_products);
        //  print_r($result);
        $resultArr =  mysqli_fetch_array($result);
        $total_rows = $resultArr[0];
        global $total_pages;
        $total_pages = ceil($total_rows / $products_page);
        // print_r($total_pages);
        global $page;
        if (isset($_GET['page']) && $total_pages > 1) {
            $page = $_GET['page'];
        } else {
            $page = 1;
        }
        $offset = ($page - 1) * $products_page;
        $limit = "LIMIT $offset, $products_page";
        $sql = $this->newQueryStr($newQuery)->conc($limit)->execute();
        // print_r($sql);
        // print_r($sql);
        // $res_data = $this->query($sql);
        return $this->fetchQuery($sql);
    }
}

$DB = new Database();
$db = $DB->connect();
