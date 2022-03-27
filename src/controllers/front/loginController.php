<?php

session_start();

require_once  $_SERVER['DOCUMENT_ROOT'] . '/DR/src/database/db.php';

$errors = array();

// logout from system
if (isset($_GET['logout'])) {
    echo "Logout Successfully ";
    session_destroy();
    unset($_SESSION['role_id']);
    unset($_SESSION['username']);
    header('location: /DR/view/front/login.php');
    exit();
}

// verify user by token
if (isset($_GET['token'])) {
    $token = $_GET['token'];
    function verifyUser($token)
    {
        global $DB;

        $queryToken = $DB->selectAll('tb_register_client')->where(array('token' => $DB->str($token)))->execute();
        $result = $DB->query($queryToken);
        if (mysqli_num_rows($result) > 0) {
            $queryUpdate = $DB->update('tb_register_client', array('verified' => 1))->where(array('token' => $DB->str($token)))->execute();
            if ($DB->query($queryUpdate) == 1) {
                header('location: /DR/src/messages/verifySuccess.php');
            } else {
                echo "Потребителят не е открит.";
            }
        }
    }
    verifyUser($token);
}

if (isset($_POST['btn-login'])) {

    $username = $_POST['username-login'];
    $password = $_POST['password-login'];

    if (empty($username)) {
        $errors['username-login'] = "Моля въведете потребителското си име!";
    }
    if (empty($password)) {
        $errors['password-login'] = "Моля въведете парола!";
    }

    if (count($errors) == 0) {
        $password = md5($password);

        $query = $DB->selectAll('tm_users')->where(array('username' => $DB->str($username),'password' => $DB->str($password)))->execute();

        $results = $DB->query($query);
        if (mysqli_num_rows($results) == 1) {
            while ($row = $results->fetch_assoc()) {
                $_SESSION['role'] = $row["role_id"];
            }
            $_SESSION['username'] = $username;
            header('location: /DR/view/front/home.php');
        } else {
            array_push($errors, "Неправилно потребителско име и/или неправилна парола!");
        }
    }
}
