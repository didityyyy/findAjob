<?php
require_once  $_SERVER['DOCUMENT_ROOT'] . '/DR/src/database/db.php';

if (isset($_GET["searchbox"])){
    $searchbox = $_GET['searchbox'];
    $where = " WHERE CONCAT(firstname,lastname,username)  LIKE '%$searchbox%' ";
    $search = $DB->selectAll('tb_hr')->conc($where)->orderby('firstname')->execute();
    $rowHR = $DB->fetchQuery($search);
    
} else {
    $query = $DB->selectAll('tb_hr')->orderby('firstname')->execute();
    $rowHR = $DB->fetchQuery($query);
}

if (isset($_GET['id'])){
    $hr = $_GET['id'];
    $querydel = $DB->delete('tm_users')->where(array('username' => $DB->str($hr)))->execute();
    $results = $DB->query($querydel);
    $rowHR = $DB->fetchQuery($query);
}