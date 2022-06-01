<?php
require_once  $_SERVER['DOCUMENT_ROOT'] . '/DR/src/database/db.php';

$username = $_SESSION['username'];
$query = $DB->selectAll('tb_register_company')->where(array('username' => $DB->str($username)))->execute();
$row = $DB->fetchQuery($query);

//added jobs
$queryAdd = 'SELECT j.title,j.payment,cat.title as Category,city.title as City,tbcom.companyname,tbcom.companyid,tbcom.logo,j.description, j.city, j.category, j.id, j.approved, j.expire_date from tb_jobs j
join tb_category_profession cat on cat.id = j.category
join tb_city city on city.id = j.city
join tb_register_company tbcom on tbcom.companyid = j.company ';
$queryAddedJobs = $DB->newQueryStr($queryAdd)->where(array('tbcom.username'=>$DB->str($username)))->execute();
// print_r($queryAddedJobs);
$resultsAddedJobs = $DB->query($queryAddedJobs);
$rowAddedJobs = $DB->fetchQuery($queryAddedJobs);