<?php
require_once  $_SERVER['DOCUMENT_ROOT'] . '/DR/src/database/db.php';

$query = "SELECT j.title,j.payment,cat.title as Category,city.title as City,tbcom.companyname,tbcom.companyid,tbcom.logo,j.description, j.city, j.category, j.id, j.approved from tb_jobs j
          join tb_category_profession cat on cat.id = j.category
          join tb_city city on city.id = j.city
          join tb_register_company tbcom on tbcom.companyid = j.company ";

$output = "";
if (!empty($_POST['searchbox']) || !empty($_POST['jobcity']) || !empty($_POST['jobcategory'])) {
    $whereJob = '';
    if (!empty($_POST['searchbox']) && !empty($_POST['jobcity']) && !empty($_POST['jobcategory'])) {
        $searchbox = $_POST['searchbox'];
        $jobcity = $_POST['jobcity'];
        $jobcategory = $_POST['jobcategory'];
        $whereJob = " WHERE j.title LIKE '%" . $searchbox . "%' AND j.city = " . $jobcity . " AND j.category = " . $jobcategory . " AND j.approved = 1";
    }
    if (empty($_POST['searchbox']) && !empty($_POST['jobcity']) && !empty($_POST['jobcategory'])) {
        $jobcity = $_POST['jobcity'];
        $jobcategory = $_POST['jobcategory'];
        $whereJob = " WHERE j.city = " . $jobcity . " AND j.category = " . $jobcategory . " AND j.approved = 1";
    }
    if (empty($_POST['searchbox']) && empty($_POST['jobcity']) && !empty($_POST['jobcategory'])) {
        $jobcategory = $_POST['jobcategory'];
        $whereJob = " WHERE j.category = " . $jobcategory . " AND j.approved = 1";
    }
    if (empty($_POST['searchbox']) && !empty($_POST['jobcity']) && empty($_POST['jobcategory'])) {
        $jobcity = $_POST['jobcity'];
        $whereJob = " WHERE j.city = " . $jobcity . " AND j.approved = 1";
    }
    if (!empty($_POST['searchbox']) && empty($_POST['jobcity']) && !empty($_POST['jobcategory'])) {
        $searchbox = $_POST['searchbox'];
        $jobcategory = $_POST['jobcategory'];
        $whereJob = " WHERE j.title LIKE '%" . $searchbox . "%' AND j.category = " . $jobcategory . " AND j.approved = 1";
    }
    if (!empty($_POST['searchbox']) && !empty($_POST['jobcity']) && empty($_POST['jobcategory'])) {
        $searchbox = $_POST['searchbox'];
        $jobcity = $_POST['jobcity'];
        $whereJob = " WHERE j.title LIKE '%" . $searchbox . "%' AND j.city = " . $jobcity . " AND j.approved = 1";
    }
    if (!empty($_POST['searchbox']) && empty($_POST['jobcity']) && empty($_POST['jobcategory'])) {
        $searchbox = $_POST['searchbox'];
        $whereJob = " WHERE j.title LIKE '%" . $searchbox . "%' AND j.approved = 1";
    }
    if (empty($_POST['searchbox']) && empty($_POST['jobcity']) && empty($_POST['jobcategory'])) {
        $whereJob = " WHERE j.approved = 1";
    }
    $queryFilterJobs = $DB->newQueryStr($query)->conc($whereJob)->execute();
    $queryFilter = $DB->query($queryFilterJobs);
    if (mysqli_num_rows($queryFilter) > 0) {
        $tablewhere = $query . " " . $whereJob;
        $row = $DB->countJobs(" j " . $whereJob, $tablewhere . " ");
        for ($n = 0; $n < count($row); $n += 1) {
            $output .= "<div class='flex-between-x list-jobs' id='jobs'>
            <div>
                <a href='/DR/view/front/profileUser/detailsJobs.php?id=" . $row[$n]['id'] . "'>
                    <h3>" . $row[$n]['title'] . "</h3>
                    <p>" . $row[$n]['City'] . " " . $row[$n]['payment'] . "лв</p>
                </a>
            </div>
            <div>
                <p>" . $row[$n]['companyname'] . "</p>
                <img src='/DR/assets/images/logos/" . $row[$n]['logo'] . "' alt='logo' class='logo-company'>
            </div>
        </div>";
        }
    } else {
        $output = "not-found";
        $row = array();
        $total_pages = 0;
    }
} else {
    $queryjobs = $DB->newQueryStr($query)->where(array('approved' => 1))->execute();
    $row = $DB->countJobs(' WHERE approved = 1 ', $queryjobs . " ");
    for ($n = 0; $n < count($row); $n += 1) {
        $output .= "<div class='flex-between-x list-jobs' id='jobs'>
        <div>
            <a href='/DR/view/front/profileUser/detailsJobs.php?id=" . $row[$n]['id'] . "'>
                <h3>" . $row[$n]['title'] . "</h3>
                <p>" . $row[$n]['City'] . " " . $row[$n]['payment'] . "лв</p>
            </a>
        </div>
        <div>
            <p>" . $row[$n]['companyname'] . "</p>
            <img src='/DR/assets/images/logos/" . $row[$n]['logo'] . "' alt='logo' class='logo-company'>
        </div>
    </div>";
    }
}
echo $output;
