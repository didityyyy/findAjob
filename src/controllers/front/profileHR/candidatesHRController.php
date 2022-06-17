<?php
require_once  $_SERVER['DOCUMENT_ROOT'] . '/DR/src/database/db.php';

$query = "SELECT c.id_c,c.firstname,c.lastname,c.email,c.address,c.city,c.zipcode,c.phone,c.birthdate,c.workexperience,
        c.educationexperience,c.personalexperience,p.username,s.id,j.title,s.title as status from tb_candidates c
        join tm_status s on s.id = c.status
        join tb_register_client p on p.id = c.profileid
        join tb_jobs j on j.id = c.jobid ";
$query2 = "SELECT c.id_c,c.firstname,c.lastname,c.email,c.address,c.city,c.zipcode,c.phone,c.birthdate,c.workexperience,
        c.educationexperience,c.personalexperience,p.username,s.id,j.title,s.title as status,usc.id_usc from tb_used_saved_candidates usc
        join tm_status s on s.id = usc.status
        join tb_register_client p on p.id = usc.id_profile
        join tb_jobs j on j.id = usc.jobid 
        join tb_candidates c on c.id_c = usc.id_cand ";

$queryОnhold            = $DB->newQueryStr($query)->where(array('s.id' => 5))->execute();
$queryApprovedInterview = $DB->newQueryStr($query)->where(array('s.id' => 1))->execute();
$queryInterviewed       = $DB->newQueryStr($query)->where(array('s.id' => 2))->execute();
$queryRejected          = $DB->newQueryStr($query)->where(array('s.id' => 3))->execute();
$queryApproved          = $DB->newQueryStr($query)->where(array('s.id' => 4))->execute();

$queryОnhold2            = $DB->newQueryStr($query2)->where(array('s.id' => 5))->execute();
$queryApprovedInterview2 = $DB->newQueryStr($query2)->where(array('s.id' => 1))->execute();
$queryInterviewed2       = $DB->newQueryStr($query2)->where(array('s.id' => 2))->execute();
$queryRejected2          = $DB->newQueryStr($query2)->where(array('s.id' => 3))->execute();
$queryApproved2          = $DB->newQueryStr($query2)->where(array('s.id' => 4))->execute();

$allresults = $DB->fetchQuery($query);
$results1 = $DB->fetchQuery($queryОnhold);
$results2 = $DB->fetchQuery($queryApprovedInterview);
$results3 = $DB->fetchQuery($queryInterviewed);
$results4 = $DB->fetchQuery($queryRejected);
$results5 = $DB->fetchQuery($queryApproved);

$allresults2 = $DB->fetchQuery($query2);
$results12 = $DB->fetchQuery($queryОnhold2);
$results22 = $DB->fetchQuery($queryApprovedInterview2);
$results32 = $DB->fetchQuery($queryInterviewed2);
$results42 = $DB->fetchQuery($queryRejected2);
$results52 = $DB->fetchQuery($queryApproved2);

if (isset($_GET['id'])) {
    $id_c = $_GET['id'];
    $queryCand = $DB->newQueryStr($query)->where(array('c.id_c' => $id_c))->execute();
    $result = $DB->fetchQuery($queryCand);

    if (isset($_POST['approvedinterview'])) {
        $updateStatus = $DB->update('tb_candidates', ['status' => 1])->where(array('id_c' => $id_c))->execute();
        if ($DB->query($updateStatus) == 1) {
            $message = 'Успешно обновихте статуса!';
        } else {
            $errors['status'] = "Неуспешно!";
        }
    }

    if (isset($_POST['interviewed'])) {
        $updateStatus = $DB->update('tb_candidates', ['status' => 2])->where(array('id_c' => $id_c))->execute();
        if ($DB->query($updateStatus) == 1) {
            $message = 'Успешно обновихте статуса!';
        } else {
            $errors['status'] = "Неуспешно!";
        }
    }

    if (isset($_POST['approved'])) {
        $updateStatus = $DB->update('tb_candidates', ['status' => 4])->where(array('id_c' => $id_c))->execute();
        if ($DB->query($updateStatus) == 1) {
            $message = 'Успешно обновихте статуса!';
        } else {
            $errors['status'] = "Неуспешно!";
        }
    }

    if (isset($_POST['rejected'])) {
        $updateStatus = $DB->update('tb_candidates', ['status' => 3])->where(array('id_c' => $id_c))->execute();
        if ($DB->query($updateStatus) == 1) {
            $message = 'Успешно обновихте статуса!';
        } else {
            $errors['status'] = "Неуспешно!";
        }
    }
}



if (isset($_GET['id_usc'])) {
    $id_usc = $_GET['id_usc'];
    $queryCand = $DB->newQueryStr($query2)->where(array('usc.id_usc' => $id_usc))->execute();
    $result = $DB->fetchQuery($queryCand);

    if (isset($_POST['approvedinterview'])) {
        $updateStatus = $DB->update('tb_used_saved_candidates', ['status' => 1])->where(array('id_usc' => $id_usc))->execute();
        if ($DB->query($updateStatus) == 1) {
            $message = 'Успешно обновихте статуса!';
        } else {
            $errors['status'] = "Неуспешно!";
        }
    }

    if (isset($_POST['interviewed'])) {
        $updateStatus = $DB->update('tb_used_saved_candidates', ['status' => 2])->where(array('id_usc' => $id_usc))->execute();
        if ($DB->query($updateStatus) == 1) {
            $message = 'Успешно обновихте статуса!';
        } else {
            $errors['status'] = "Неуспешно!";
        }
    }

    if (isset($_POST['approved'])) {
        $updateStatus = $DB->update('tb_used_saved_candidates', ['status' => 4])->where(array('id_usc' => $id_usc))->execute();
        if ($DB->query($updateStatus) == 1) {
            $message = 'Успешно обновихте статуса!';
        } else {
            $errors['status'] = "Неуспешно!";
        }
    }

    if (isset($_POST['rejected'])) {
        $updateStatus = $DB->update('tb_used_saved_candidates', ['status' => 3])->where(array('id_usc' => $id_usc))->execute();
        if ($DB->query($updateStatus) == 1) {
            $message = 'Успешно обновихте статуса!';
        } else {
            $errors['status'] = "Неуспешно!";
        }
    }
}

if (isset($_POST['searchCandidate'])) {
    $searchCandidate = $_POST['searchCandidate'];
    $where = " WHERE CONCAT(c.firstname,c.lastname,j.title)  LIKE '%$searchCandidate%' ";
    $search = $DB->newQueryStr($query)->conc($where)->execute();
    $rowCand = $DB->fetchQuery($search);

    $search2 = $DB->newQueryStr($query2)->conc($where)->execute();
    $rowCand2 = $DB->fetchQuery($search2);

    $output = '';
    if (!empty($rowCand) || !empty($rowCand2)) {
        for ($n = 0; $n < count($rowCand); $n++) {
            $output .= "<div class='flex-between-x list-jobs'>
            <a href='/DR/view/front/profileHR/detailsCandidateHR.php?id=" . $rowCand[$n]['id_c'] . "'>
                <div>
                    <h3>" . $rowCand[$n]['firstname'] . " " . $rowCand[$n]['lastname'] . "</h3>
                    <p>Кандидатствал по обява : " . $rowCand[$n]['title'] . "</p>
                </div>
            </a>
            <div>
                <p>Статус: " . $rowCand[$n]['status'] . "</p>
            </div>
        </div>";
        }
        if (!empty($rowCand2)) {
            for ($n = 0; $n < count($rowCand2); $n++) {
                $output .= "<div class='flex-between-x list-jobs'>
            <a href='/DR/view/front/profileHR/detailsCandidateHR.php?id=" . $rowCand2[$n]['id_c'] . "'>
                <div>
                    <h3>" . $rowCand2[$n]['firstname'] . " " . $rowCand2[$n]['lastname'] . "</h3>
                    <p>Кандидатствал по обява : " . $rowCand2[$n]['title'] . "</p>
                </div>
            </a>
            <div>
                <p>Статус: " . $rowCand2[$n]['status'] . "</p>
            </div>
        </div>";
            }
        }
    } else {
        $output = '<p class="no-data mt10" style="text-align: center;">Няма налични данни</p>';
    }
    echo $output;
}
