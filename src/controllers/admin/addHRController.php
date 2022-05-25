<?php
require_once  $_SERVER['DOCUMENT_ROOT'] . '/DR/src/database/db.php';

$errors = array();

if (isset($_POST['add-HR-btn'])) {
    $usernameHR = $_POST['usernameHR'];
    $firstnameHR = $_POST['firstnameHR'];
    $lastnameHR = $_POST['lastnameHR'];
    $passwordHR = $_POST['passwordHR'];

    if (empty($usernameHR)) {
        $errors['usernameHR'] = "Моля въведете потребителско име";
    }

    if (empty($firstnameHR)) {
        $errors['firstnameHR'] = "Моля въведете Име";
    }

    if (empty($lastnameHR)) {
        $errors['lastnameHR'] = "Моля въведете Фамилия";
    }

    if (empty($passwordHR)) {
        $errors['passwordHR'] = "Моля въведете парола";
    }

    if (!empty($passwordHR) && !strlen($passwordHR) > 5) {
        $errors['passwordHR'] = "Моля въведете парола с поне 6 символа";
    }

    $usernameQuery = $DB->selectAll('tm_users')->where(array('username' => $DB->str($usernameHR)))->execute();
    $user = $DB->query($usernameQuery);

    if (mysqli_num_rows($user) > 0) {
        $errors['username'] = "Потребителското име вече съществува";
    }

    if (count($errors) === 0) {
        $password = md5($passwordHR);
        $role = 1;

        $insert = $DB->insert('tm_users', array(
            'username'  => $DB->str($usernameHR),
            'password'  => $DB->str($password),
            'role_id'    => $role
        ));
        $query = $DB->query($insert);
        if ($query == 1) {
            $insert2 = $DB->insert('tb_hr', array(
                'username'  => $DB->str($usernameHR),
                'firstname' => $DB->str($firstnameHR),
                'lastname'  => $DB->str($lastnameHR)
            ));
            $query2 = $DB->query($insert2);
            if ($query2 == 1) {
                $message = "Успешно добавихте служител!";
            }
        }
    }
}
