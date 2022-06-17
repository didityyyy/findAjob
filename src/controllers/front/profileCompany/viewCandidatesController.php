<?php
require_once  $_SERVER['DOCUMENT_ROOT'] . '/DR/src/database/db.php';

if (!isset($_SESSION)) {
    session_start();
}

$username = $_SESSION['username'];
$addJob = 'SELECT j.id as id,j.title as job, c.title as city, j.payment as payment,COUNT(usc.jobid) + COUNT(can.jobid) as count FROM tb_jobs j join tb_register_company regc on regc.companyid = j.company join tb_city c on c.id = j.city left join tb_used_saved_candidates usc on usc.jobid = j.id left join tb_candidates can on can.jobid = j.id ';
$group = ' group by j.id';
$queryJob = $DB->newQueryStr($addJob)->where(array('regc.username' => $DB->str($username), 'j.approved' => 1))->conc($group)->execute();
$rowJob = $DB->fetchQuery($queryJob);
$output = '';

if (isset($_POST['jobid'])) {
    $jobid = $_POST['jobid'];

    $queryJob = $DB->newQueryStr($addJob)->where(array('regc.username' => $DB->str($username), 'j.approved' => 1, 'j.id' => $jobid))->conc($group)->execute();
    $rowJob = $DB->fetchQuery($queryJob);
    if ($rowJob > 1) {
        $output = "<div class='flex-between-x list-jobs' id='jobs'>
            <div>
                <h3>" . $rowJob[0]['job'] . "</h3>
                <p>" . $rowJob[0]['city'] . " " . $rowJob[0]['payment'] . "лв</p>
            </div>
            <div>
                <p>Брой кандидатури: " . $rowJob[0]['count'] . "</p>
                <a href='/DR/view/front/profileCompany/detailsViewCandidates.php?id-j=" . $rowJob[0]['id'] . "'> <input type='button' class='input btn' style='padding: 3px;' value='Преглед'></a>
            </div>
        </div>
    ";
        echo $output;
    }
}

if (isset($_GET['id-j'])) {
    $id = $_GET['id-j'];

    //display all candidates per job
    $addQuery2 = 'SELECT cand.id_c, cand.firstname, cand.lastname, cand.email, s.title as status, j.id as job, j.title as titlejob, s.id FROM tb_candidates cand join tm_status s on s.id = cand.status join tb_jobs j on j.id = cand.jobid ';
    $queryCand2 = $DB->newQueryStr($addQuery2)->where(array('j.id' => $id))->execute();
    $rowCand = $DB->fetchQuery($queryCand2);

    $addQuery3 = 'SELECT cand.id_c, cand.firstname, cand.lastname, cand.email, s.title as status, j.id as job, j.title as titlejob, s.id FROM tb_used_saved_candidates usc join tb_candidates cand on cand.id_c = usc.id_cand join tm_status s on s.id = usc.status join tb_jobs j on j.id = usc.jobid ';
    $queryCand3= $DB->newQueryStr($addQuery3)->where(array('j.id' => $id))->execute();
    $rowCand2 = $DB->fetchQuery($queryCand3);
}

if (isset($_GET['id-c'])) {
    $id = $_GET['id-c'];

    //display details person candidate
    $addQuery = 'SELECT cand.id_c ,cand.firstname ,cand.lastname ,cand.email ,cand.address ,cand.zipcode ,cand.phone ,cand.birthdate ,cand.workexperience ,cand.educationexperience ,cand.educationexperience ,cand.personalexperience , c.title as city, s.title as status, cl.username as username, j.id as job FROM tb_candidates cand join tb_city c on c.id = cand.city join tb_register_client cl on cl.id = cand.profileid join tm_status s on s.id = cand.status join tb_jobs j on j.id = cand.jobid ';
    $queryCand = $DB->newQueryStr($addQuery)->where(array('cand.id_c' => $id))->execute();
    $rowDetails = $DB->fetchQuery($queryCand);
}

//display status
$queryStatus = $DB->selectAll('tm_status')->execute();
$rowStatus = $DB->fetchQuery($queryStatus);

//display data with selected status
if (isset($_POST['statusid'])) {
    $status = $_POST['statusid'];
    if (isset($_POST['idjob'])) {
        $idjob = $_POST['idjob'];

        $addQuery2 = 'SELECT cand.id_c, cand.firstname, cand.lastname, cand.email, s.title as status, j.id as job, j.title as titlejob, s.id FROM tb_candidates cand join tm_status s on s.id = cand.status join tb_jobs j on j.id = cand.jobid ';
        $queryCand2 = $DB->newQueryStr($addQuery2)->where(array('j.id' => $idjob, 's.id' => $status))->execute();
        $rowCand = $DB->fetchQuery($queryCand2);
        $addQuery3 = 'SELECT cand.id_c, cand.firstname, cand.lastname, cand.email, s.title as status, j.id as job, j.title as titlejob, s.id FROM tb_used_saved_candidates usc join tb_candidates cand on cand.id_c = usc.id_cand join tm_status s on s.id = usc.status join tb_jobs j on j.id = usc.jobid ';
        $queryCand3= $DB->newQueryStr($addQuery3)->where(array('j.id' => $idjob, 's.id' => $status))->execute();
        $rowCand2 = $DB->fetchQuery($queryCand3);

        if (!empty($rowCand || !empty($rowCand2))) {
            $output = "<tr>
            <th>Име и Фамилия</th>
            <th>Имейл</th>
            <th>Статус</th>
            </tr>";
            for ($n = 0; $n < count($rowCand); $n++) {
                $output .= "<tr id=" .  $rowCand[$n]['id_c'] . ">
                <td>
                    <a href='/DR/view/front/profileCompany/detailsCandidatesPerson.php?id-c=" . $rowCand[$n]['id_c'] . "'>" . $rowCand[$n]['firstname'] . " " . $rowCand[$n]['lastname'] . "</a>
                </td>
                <td>" . $rowCand[$n]['email'] . "</td>
                <td>" . $rowCand[$n]['status'] . "</td>
                </tr>";
            }
            for ($n = 0; $n < count($rowCand2); $n++) {
                $output .= "<tr id=" .  $rowCand2[$n]['id_c'] . ">
                <td>
                    <a href='/DR/view/front/profileCompany/detailsCandidatesPerson.php?id-c=" . $rowCand2[$n]['id_c'] . "'>" . $rowCand2[$n]['firstname'] . " " . $rowCand2[$n]['lastname'] . "</a>
                </td>
                <td>" . $rowCand2[$n]['email'] . "</td>
                <td>" . $rowCand2[$n]['status'] . "</td>
                </tr>";
            }
        } else {
            $output = '<p class="no-data mt10" style="text-align: center;">Няма налични данни</p>';
        }
        echo $output;
    }
}
