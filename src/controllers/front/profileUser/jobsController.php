<?php
require_once  $_SERVER['DOCUMENT_ROOT'] . '/DR/src/database/db.php';

$queryCategory = $DB->selectAll('tb_category_profession')->orderby('title')->execute();
$rowCategory = $DB->fetchQuery($queryCategory);

$queryCity = $DB->selectAll('tb_city')->orderby('title')->execute();
$rowCity = $DB->fetchQuery($queryCity);

$query = "SELECT j.title,j.payment,cat.title as Category,city.title as City,tbcom.companyname,tbcom.companyid,tbcom.logo,j.description, j.city, j.category, j.id, j.approved from tb_jobs j
          join tb_category_profession cat on cat.id = j.category
          join tb_city city on city.id = j.city
          join tb_register_company tbcom on tbcom.companyid = j.company ";

//search filter

function unsetS()
{
    unset($_SESSION['searchbox']);
    unset($_SESSION['jobcity']);
    unset($_SESSION['jobcategory']);
}

if (isset($_POST['searchJob'])) {
    $whereJob = '';
    if (!empty($_POST['searchbox']) && !empty($_POST['jobcity']) && !empty($_POST['jobcategory'])) {
        $_SESSION['searchbox'] = $_POST['searchbox'];
        $_SESSION['jobcity'] = $_POST['jobcity'];
        $_SESSION['jobcategory'] = $_POST['jobcategory'];
        $whereJob = " WHERE j.title LIKE '%" . $_SESSION['searchbox'] . "%' AND j.city = " . $_SESSION['jobcity'] . " AND j.category = " . $_SESSION['jobcategory'] . " AND j.approved = 1";
    }
    if (empty($_POST['searchbox']) && !empty($_POST['jobcity']) && !empty($_POST['jobcategory'])) {
        $_SESSION['jobcity'] = $_POST['jobcity'];
        $_SESSION['jobcategory'] = $_POST['jobcategory'];
        $whereJob = " WHERE j.city = " . $_SESSION['jobcity'] . " AND j.category = " . $_SESSION['jobcategory'] . " AND j.approved = 1";
    }
    if (empty($_POST['searchbox']) && empty($_POST['jobcity']) && !empty($_POST['jobcategory'])) {
        $_SESSION['jobcategory'] = $_POST['jobcategory'];
        $whereJob = " WHERE j.category = " . $_SESSION['jobcategory'] . " AND j.approved = 1";
    }
    if (empty($_POST['searchbox']) && !empty($_POST['jobcity']) && empty($_POST['jobcategory'])) {
        $_SESSION['jobcity'] = $_POST['jobcity'];
        $whereJob = " WHERE j.city = " . $_SESSION['jobcity'] . " AND j.approved = 1";
    }
    if (!empty($_POST['searchbox']) && empty($_POST['jobcity']) && !empty($_POST['jobcategory'])) {
        $_SESSION['searchbox'] = $_POST['searchbox'];
        $_SESSION['jobcategory'] = $_POST['jobcategory'];
        $whereJob = " WHERE j.title LIKE '%" . $_SESSION['searchbox'] . "%' AND j.category = " . $_SESSION['jobcategory'] . " AND j.approved = 1";
    }
    if (!empty($_POST['searchbox']) && !empty($_POST['jobcity']) && empty($_POST['jobcategory'])) {
        $_SESSION['searchbox'] = $_POST['searchbox'];
        $_SESSION['jobcity'] = $_POST['jobcity'];
        $whereJob = " WHERE j.title LIKE '%" . $_SESSION['searchbox'] . "%' AND j.city = " . $_SESSION['jobcity'] . " AND j.approved = 1";
    }
    if (!empty($_POST['searchbox']) && empty($_POST['jobcity']) && empty($_POST['jobcategory'])) {
        $_SESSION['searchbox'] = $_POST['searchbox'];
        $whereJob = " WHERE j.title LIKE '%" . $_SESSION['searchbox'] . "%' AND j.approved = 1";
    }
    if (empty($_POST['searchbox']) && empty($_POST['jobcity']) && empty($_POST['jobcategory'])) {
        $whereJob = " WHERE j.approved = 1";
        unsetS();
    }
    $queryFilterJobs = $DB->newQueryStr($query)->conc($whereJob)->execute();
    $queryFilter = $DB->query($queryFilterJobs);
    // print_r($queryFilterJobs);
    if (mysqli_num_rows($queryFilter) > 0) {
        // $row = $DB->fetchQuery($queryFilterJobs);
        $tablewhere = $query . " " . $whereJob;

        $row = $DB->countJobs(" j " . $whereJob, $tablewhere . " ");
        // print_r($_SESSION);
    } else {
        echo "No results";
        $row = array();
        $total_pages = 0;
        // unsetS();
    }
} else {
    $queryjobs = $DB->newQueryStr($query)->where(array('approved' => 1))->execute();
    // $row = $DB->fetchQuery($queryjobs);
    $row = $DB->countJobs(' WHERE approved = 1 ', $queryjobs . " ");
    // print_r($row);
    // unsetS();
}
