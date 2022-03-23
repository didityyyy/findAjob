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
    header('location: /DR/view/front/home.php');
    exit();
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
        $query = "SELECT * FROM tm_users WHERE username='$username' AND password='$password'";
        
        $results = $DB->query($query);
        if (mysqli_num_rows($results) == 1) {
            while ($row = $results->fetch_assoc()) {
                $_SESSION['role'] = $row["role_id"];
            }
            $_SESSION['username'] = $username;
            $_SESSION['success'] = "Успешно влязохте в акаунта си!";
            header('location: /DR/view/front/home.php');
        } else {
            array_push($errors, "Неправилно потребителско име и/или неправилна парола!");
        }
    }
}