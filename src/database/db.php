<?php

// class Database {

//     private static $databaseConnection = null;
//     private static $queryBuilderString = "";


    // static function str($param) {
    //     return "'$param'";
    // }

    // static function query($sqlQuery) {

    //     $databaseConnection = self::getConnection();
    //     return mysqli_query($databaseConnection, $sqlQuery);
    // }

    // // TODO : implement when PHP classes are introduces
    // static function getLastInsertedId() {

    //     self::$databaseConnection = self::getConnection();
    //     return mysqli_insert_id(self::$databaseConnection );
    // } 

    // static function fetch($tableName) {

    //     $resultArray    = array();
    //     $query          = "SELECT * FROM $tableName";
    //     $fetchResponse  = self::query($query);

    //     while($data = mysqli_fetch_assoc($fetchResponse)) {
    //         array_push($resultArray, $data);
    //     }

    //     return $resultArray;
    // }

    // static function fetchQuery($query) {

    //     $resultArray    = array();
    //     $fetchResponse  = self::query($query);

    //     while($data = mysqli_fetch_assoc($fetchResponse)) {
    //         array_push($resultArray, $data);
    //     }

    //     return $resultArray;        
    // }


    // static function insert($tableName, $queryPropertyCollection) {

    //     $queryKeies     = "";
    //     $queryValues    = "";

    //     foreach ($queryPropertyCollection as $key => $value) {

    //         $queryKeies .= ($key . ",");
    //         $queryValues .= ($value . ",");
    //     }

    //     $queryKeies     = substr($queryKeies, 0, strlen($queryKeies) - 1);
    //     $queryValues    = substr($queryValues, 0, strlen($queryValues) - 1);

    //     $query = "INSERT INTO $tableName($queryKeies) VALUES($queryValues)";

    //     self::query($query);
    // }

    // // UPDATE {table_name} 
    // // SET column1 = value1, column2 = value2
    // static function update($tableName, $queryPropertyCollection) {

    //     $updateQueryKeyValue = "";
    //     foreach ($queryPropertyCollection as $key => $value) {
    //         $updateQueryKeyValue .= "$key = $value,";
    //     }

    //     $updateQueryKeyValue = substr($updateQueryKeyValue, 0, strlen($updateQueryKeyValue) - 1);
    //     $query = "UPDATE $tableName SET $updateQueryKeyValue ";
    //     // self::query($query);
    //     self::$queryBuilderString .= " $query";
    //     return Database;
    // }


    // static function helloWorld() {
    //     echo "** Hello world from inner function **";
    // }


    // // DELETE {table_name}
    // // WHERE []
    // static function delete($tableName) {

    //     $query = "DELETE $tableName";
    //     self::query($query);
    // }

    // static function where($queryPropertyCollection) {
    //     // WHERE a = ? AND / OR b = ?
        
    //     $whereQuery = "";
    //     foreach ($queryPropertyCollection as $key => $value) {
    //         $whereQuery .= "$key = $$value";
    //     }

    //     $query = "WHERE $whereQuery";
    //     self::$queryBuilderString .= $query;

    //     return Database;
    // }

    // static function execute() {

    //     echo 'Query Builder result : ';
    //     echo '<br>';
    //     echo self::$queryBuilderString;
    // }



    // // Give me the current database connection
    // private static function getConnection() {

    //     if(self::$databaseConnection == null) {
    //        self::$databaseConnection = self::connect(); 
    //     }

    //     return self::$databaseConnection;
    // }

    // 1. Create and Connection to Database - MySQL
    // 2. Prepare query 
    // 3. Manipulation of screen data
//     private static function  connect() {

//         define('HOST'       , 'localhost');
//         define('USERNAME'   , 'root');
//         define('PASSWORD'   , '');
//         define('DBNAME'     , 'DR-findAjob');
//         define('PORT'       , '3306');   

//         $sql = 'CREATE Database IF NOT EXISTS DR_findAjob';
//         $dbConn=mysqli_connect(HOST,USERNAME,PASSWORD);
//         if(self::query($dbConn,$sql))
//         {
//             echo "Successfully created";
//         }

//         return mysqli_connect(HOST, USERNAME, PASSWORD, DBNAME, PORT);
//     }

// }

class Database {

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

    function connect()
    {
        return mysqli_connect($this->host,$this->username,$this->password,$this->db);
    }

    function query($sqlQuery) {

        $conn= $this->connect();
        return mysqli_query($conn, $sqlQuery);
    }

    function fetch($tableName) {

        $resultArray    = array();
        $query          = "SELECT * FROM $tableName";
        $fetchResponse  = $this->query($query);

        while($data = mysqli_fetch_assoc($fetchResponse)) {
            array_push($resultArray, $data);
        }

        return $resultArray;
    }

    function fetchQuery($query) {

        $resultArray    = array();
        $fetchResponse  = $this->query($query);

        while($data = mysqli_fetch_assoc($fetchResponse)) {
            array_push($resultArray, $data);
        }

        return $resultArray;        
    }

    function insert($tableName, $queryPropertyCollection) {

        $queryKeys     = "";
        $queryValues    = "";

        foreach ($queryPropertyCollection as $key => $value) {

            $queryKeys .= ($key . ",");
            $queryValues .= ($value . ",");
        }

        $queryKeies     = substr($queryKeys, 0, strlen($queryKeys) - 1);
        $queryValues    = substr($queryValues, 0, strlen($queryValues) - 1);

        $query = "INSERT INTO $tableName($queryKeys) VALUES($queryValues)";

        $this->query($query);
    }

    // UPDATE {table_name} 
    // SET column1 = value1, column2 = value2
    function update($tableName, $queryPropertyCollection) {

        $updateQueryKeyValue = "";
        foreach ($queryPropertyCollection as $key => $value) {
            $updateQueryKeyValue .= "$key = $value,";
        }

        $updateQueryKeyValue = substr($updateQueryKeyValue, 0, strlen($updateQueryKeyValue) - 1);
        $query = "UPDATE $tableName SET $updateQueryKeyValue ";
        // self::query($query);
        $this->queryBuilderString .= " $query";
        return $this->Database;
    }

    // DELETE {table_name}
    // WHERE []
    function delete($tableName) {

        $query = "DELETE $tableName";
        $this->query($query);
    }

    function where($queryPropertyCollection) {
        // WHERE a = ? AND / OR b = ?
        
        $whereQuery = "";
        foreach ($queryPropertyCollection as $key => $value) {
            $whereQuery .= "$key = $$value";
        }

        $query = "WHERE $whereQuery";
        $this->queryBuilderString .= $query;

        return $this->Database;
    }

    function execute() {

        echo 'Query Builder result : ';
        echo '<br>';
        echo $this->queryBuilderString;
    }

}

$DB = new Database();
$db = $DB->connect();

