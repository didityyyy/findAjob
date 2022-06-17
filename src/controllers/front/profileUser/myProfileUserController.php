<?php
require_once  $_SERVER['DOCUMENT_ROOT'] . '/DR/src/database/db.php';

$username = $_SESSION['username'];
$query = $DB->selectAll('tb_register_client')->where(array('username' => $DB->str($username)))->execute();
$row = $DB->fetchQuery($query);

$errors = array();

//change pass
if (isset($_POST['btn-change-pass-user'])) {

    $oldPass = $_POST['oldPass'];
    $newPass = $_POST['newPass'];
    $newPassRepeat = $_POST['newPassRepeat'];

    if (empty($oldPass) || empty($newPass)) {
        $errors['pass'] = 'Моля въведете парола';
    }

    if (!empty($oldPass) && $newPass !== $newPassRepeat) {
        $errors['pass'] = "Двете пароли не съвпадат.";
    }

    if (!strlen($newPass) > 5) {
        $errors['pass'] = "Дължината на паролата трябва да е поне 6 символа.";
    }

    if (count($errors) === 0) {
        $oldpass = md5($oldPass);
        $password = md5($newPass);

        $passQuery = $DB->selectAll('tm_users')->where(array('username' => $DB->str($username), 'password' => $DB->str($oldpass)))->execute();
        $results = $DB->query($passQuery);

        if (mysqli_num_rows($results) > 0) {

            $updatePass = $DB->update('tm_users', ['password' => $DB->str($password)])->where(array('username' => $DB->str($username)))->execute();
            if ($DB->query($updatePass) == 1) {
                $message = 'Успешно променихте паролата си!';
            } else {
                $errors['pass'] = "Неуспешно!";
            }
        } else {
            $errors['pass'] = "Грешна парола!";
        }
    }
}

//candidates

$queryAdd = 'c join tb_register_client rc on rc.id = c.profileid join tb_jobs j on j.id = c.jobid join tm_status s on s.id = c.status join tb_city city on city.id = c.city ';
$queryCandidates = $DB->selectAll('tb_candidates')->conc($queryAdd)->where(array('rc.username' => $DB->str($username)))->execute();
$queryAdd2 = 'usc join tb_candidates c on c.id_c = usc.id_cand join tb_register_client rc on rc.id = usc.id_profile join tm_status s on s.id = usc.status join tb_jobs j on j.id = usc.jobid ';
$queryCandidates2 = $DB->selectAll('tb_used_saved_candidates')->conc($queryAdd2)->where(array('rc.username' => $DB->str($username)))->execute();
$rowCandidates = $DB->fetchQuery($queryCandidates);
$rowCandidates2 = $DB->fetchQuery($queryCandidates2);
$candidates = $DB->query($queryCandidates);
$candidates2 = $DB->query($queryCandidates2);

//view candidate 
if(isset($_GET['id'])){
$idCandidate = $_GET['id'];
$queryCandidates1_1 = $DB->selectAll('tb_candidates')->conc($queryAdd)->where(array('rc.username' => $DB->str($username), 'c.id_c'=> $idCandidate))->execute();
$rowCandidates1_1 = $DB->fetchQuery($queryCandidates1_1);
}

//liked jobs
$queryAdd3 = 'lj join tb_register_client rc on rc.id = lj.profileid join tb_jobs j on j.id = lj.jobid ';
$queryLiked = $DB->selectAll('tb_liked_jobs')->conc($queryAdd3)->where(array('rc.username' => $DB->str($username)))->execute();
$rowLiked = $DB->fetchQuery($queryLiked);
$liked = $DB->query($queryLiked);
