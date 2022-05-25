<?php
require_once  $_SERVER['DOCUMENT_ROOT'] . '/DR/src/database/db.php';
require_once  $_SERVER['DOCUMENT_ROOT'] . '/DR/src/database/emailVerification.php';

$errors = array();

if (isset($_POST['btn-forgotten-pass'])) {
    $emailForgotten = $_POST['email-forgotten'];

    if (empty($emailForgotten) || !filter_var($emailForgotten, FILTER_VALIDATE_EMAIL)) {
        $errors['email-forgotten'] = "Имейла е невалиден.";
    }

    if (count($errors) === 0) {

        $emailQuery = $DB->selectAll('tb_register_client')->where(array('email' => $DB->str($emailForgotten)))->execute();
        $user = $DB->query($emailQuery);

        if (mysqli_num_rows($user) > 0) {
            // $table1 = $DB->fetchQuery($emailQuery);
            while ($row = $user->fetch_assoc()) {
                $token = $row["token"];
                $message = "Изпратен е линк. Моля проверете вашата поща!";
                forgottenPass($emailForgotten, $token);
            }
        } else {
            $emailQuery = $DB->selectAll('tb_register_company')->where(array('email' => $DB->str($emailForgotten)))->execute();
            $user = $DB->query($emailQuery);

            if (mysqli_num_rows($user) > 0) {
                // $table1 = $DB->fetchQuery($user);
                while ($row = $user->fetch_assoc()) {
                    $token = $row["token"];
                    $message = "Изпратен е линк. Моля проверете вашата поща!";
                    forgottenPass($emailForgotten, $token);
                }
            }else{
                $errors['email-forgotten'] = "Имейла е невалиден.";
            }
        }
    } 
}
