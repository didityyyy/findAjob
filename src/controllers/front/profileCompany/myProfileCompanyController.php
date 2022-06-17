<?php
require_once  $_SERVER['DOCUMENT_ROOT'] . '/DR/src/database/db.php';
require_once  $_SERVER['DOCUMENT_ROOT'] . '/DR/src/database/emailVerification.php';

$username = $_SESSION['username'];
$query = $DB->selectAll('tb_register_company')->where(array('username' => $DB->str($username)))->execute();
$row = $DB->fetchQuery($query);

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

//added jobs
$queryAdd = 'SELECT j.title,j.payment,cat.title as Category,city.title as City,regc.companyname,regc.companyid,regc.logo,j.description, j.city, j.category, j.id, j.approved, j.expire_date,COUNT(usc.jobid) + COUNT(can.jobid) as count from tb_jobs j
join tb_category_profession cat on cat.id = j.category
join tb_city city on city.id = j.city
join tb_register_company regc on regc.companyid = j.company 
left join tb_used_saved_candidates usc on usc.jobid = j.id 
left join tb_candidates can on can.jobid = j.id ';
$group = ' group by j.id';
$queryAddedJobs = $DB->newQueryStr($queryAdd)->where(array('regc.username' => $DB->str($username)))->conc($group)->execute();
$resultsAddedJobs = $DB->query($queryAddedJobs);
$rowAddedJobs = $DB->fetchQuery($queryAddedJobs);

//display details job
if (isset($_GET['id'])) {

    $id = $_GET['id'];
    $addQuery = 'SELECT j.title as job, j.description as description, j.payment as payment, cat.title as category, c.title as city, j.id FROM tb_jobs j join tb_city c on c.id = j.city join tb_category_profession cat on cat.id = j.category ';
    $querydetails = $DB->newQueryStr($addQuery)->where(array('j.id' => $id))->execute();;
    $rowdetails = $DB->fetchQuery($querydetails);

}