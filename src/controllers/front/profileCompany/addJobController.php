<?php
require_once  $_SERVER['DOCUMENT_ROOT'] . '/DR/src/database/db.php';

$queryCategory = $DB->selectAll('tb_category_profession')->orderby('title')->execute();
$rowCategory = $DB->fetchQuery($queryCategory);

$queryCity = $DB->selectAll('tb_city')->orderby('title')->execute();
$rowCity = $DB->fetchQuery($queryCity);

$errors = array();
$username = $_SESSION['username'];

$queryS = $DB->selectAll('tb_register_company')->where(array('username' => $DB->str($username)))->execute();
$rowS = $DB->fetchQuery($queryS);


if (isset($_POST['add-job-btn'])) {
    if ($rowS[0]['verified'] == 1) {
        $jobtitle = $_POST['jobtitle'];
        $jobpayment = $_POST['jobpayment'];
        $jobdescription = $_POST['jobdescription'];

        if (empty($jobtitle)) {
            $errors['titlejob'] = "Моля въведете Заглавие на обява";
        }

        if (empty($jobpayment)) {
            $errors['paymentjob'] = "Моля въведете Заплата";
        }

        if (empty($jobdescription)) {
            $errors['descriptionjob'] = "Моля въведете описание";
        }

        if (!isset($_POST['jobcategory']) || $_POST['jobcategory'] === '') {
            $errors['jobcategory'] = "Моля изберете Категория";
        }

        if (!isset($_POST['jobcity']) || $_POST['jobcity'] === '') {
            $errors['jobcity'] = "Моля изберете Град";
        }

        if (count($errors) === 0) {
            $expireDate = date('Y-m-d', strtotime('+30 days'));
            $queryS = $DB->selectAll('tb_register_company')->where(array('username' => $DB->str($username)))->execute();
            $results = $DB->query($queryS);
            if (mysqli_num_rows($results) == 1) {
                while ($row = $results->fetch_assoc()) {
                    $companyId = $row["companyid"];
                }
                $insert = $DB->insert('tb_jobs', array(
                    'title'       => $DB->str($jobtitle),
                    'payment'     => $jobpayment,
                    'category'    => $_POST['jobcategory'],
                    'city'        => $_POST['jobcity'],
                    'description' => $DB->str($jobdescription),
                    'company'     => $companyId,
                    'expire_date' =>  $DB->str($expireDate)
                ));
                $query = $DB->query($insert);
                if ($query == 1) {
                    $message = "Успешно добавихте вашата обява!";
                }
            }
        }
    } else {

        $email = $rowS[0]['email'];
        $token = $rowS[0]['token'];
        sendVerificationEmail($email, $token);
        header('location: /DR/src/messages/verifyUser.php');
    }
}
