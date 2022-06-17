<?php

require_once  $_SERVER['DOCUMENT_ROOT'] . '/DR/src/database/db.php';

$query = "SELECT j.title,j.payment,cat.title as Category,city.title as City,tbcom.companyname,tbcom.companyid,tbcom.logo,j.description, j.city, j.category, j.id, j.approved from tb_jobs j
          join tb_category_profession cat on cat.id = j.category
          join tb_city city on city.id = j.city
          join tb_register_company tbcom on tbcom.companyid = j.company ";
$queryApproved = $DB->newQueryStr($query)->where(array('approved' => 1))->execute();
$queryDisapproved = $DB->newQueryStr($query)->where(array('approved' => 0))->execute();
$rowApproved = $DB->fetchQuery($queryApproved);
$rowDisapproved = $DB->fetchQuery($queryDisapproved);

if (isset($_POST['searchapprovedjob'])) {
    $searchapprovedjob = $_POST['searchapprovedjob'];
    $output = '';
    $where = " WHERE j.approved = 1 AND j.title LIKE '%$searchapprovedjob%' ";
    $queryApproved = $DB->newQueryStr($query)->conc($where)->execute();
    $rowApproved = $DB->fetchQuery($queryApproved);

    if (!empty($rowApproved)) {
        for ($n = 0; $n < count($rowApproved); $n += 1) {
            $output .= "<div class='flex-between-x list-jobs'>
            <div>
                <a href='/DR/view/front/profileHR/detailsJobsHR.php?id=" . $rowApproved[$n]['id'] . "'>
                    <h3>" . $rowApproved[$n]['title'] . "</h3>
                    <p>" . $rowApproved[$n]['City'] . "; " . $rowApproved[$n]['payment'] . " лв</p>
                </a>
            </div>
            <div>
                <a href='/DR/view/front/profileHR/detailsCompaniesHR.php?id=" . $rowApproved[$n]['companyid'] . "'>
                    <p>" . $rowApproved[$n]['companyname'] . "</p>
                </a>
            </div>
        </div>";
        }
    } else {
        $output = '<p class="no-data mt10" style="text-align: center;">Няма налични данни</p>';
    }
    echo $output;
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $querydetails = $DB->newQueryStr($query)->where(array('j.id' => $id))->execute();;
    $rowdetails = $DB->fetchQuery($querydetails);
}

if (isset($_POST['approve'])) {
    $id = $_GET['id'];
    $queryUpdate = $DB->update('tb_jobs', array('approved' => 1))->where(array('id' => $id))->execute();
    $results = $DB->query($queryUpdate);
    header('location: /DR/view/front/profileHR/jobsHR.php');
}

if (isset($_POST['disapprove'])) {
    $id = $_GET['id'];
    $queryDelete = $DB->delete('tb_jobs')->where(array('id' => $id))->execute();
    $results = $DB->query($queryDelete);
    header('location: /DR/view/front/profileHR/jobsHR.php');
}
