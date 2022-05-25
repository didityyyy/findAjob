<?php

require_once  $_SERVER['DOCUMENT_ROOT'] . '/DR/src/database/db.php';

if (isset($_GET["searchbox"])){
    $searchbox = $_GET['searchbox'];
    $where = " WHERE CONCAT(companyname,companyid)  LIKE '%$searchbox%' ";
    $search = $DB->selectAll('tb_register_company')->conc($where)->orderby('companyname')->execute();
    $rowHR = $DB->fetchQuery($search);
    
} else {
    $query = $DB->selectAll('tb_register_company')->orderby('companyname')->execute();
    $rowHR = $DB->fetchQuery($query);
}

if(isset($_GET['id'])){
    $companyid = $_GET['id'];
    $querydetails = $DB->selectAll('tb_register_company')->where(array('companyid' => $companyid))->execute();
    $row = $DB->fetchQuery($querydetails);
    $queryjobs = $DB->selectAll('tb_jobs')->where(array('company'=>$companyid,'approved'=>1))->execute();
    $rowjob = $DB->fetchQuery($queryjobs);
}