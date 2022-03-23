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

    $username = mysqli_real_escape_string($db, $_POST['username-login']);
    if ($username == "admin") {
        $password = mysqli_real_escape_string($db, $_POST['password-login']);
    } else {
        $password = md5(mysqli_real_escape_string($db, $_POST['password-login']));
    }

    if (empty($username)) {
        // array_push($errors, "Моля въведете потребителското си име!");
        echo "Моля въведете потребителското си име!";
    }
    if (empty($password)) {
        // array_push($errors, "Моля въведете парола!");
        echo "Моля въведете парола!";
    }

    if (count($errors) == 0) {
        $query = "SELECT * FROM tm_users WHERE username='$username' AND password='$password'";
        $results = mysqli_query($db, $query);
        if (mysqli_num_rows($results) == 1) {
            while ($row = $results->fetch_assoc()) {
                $_SESSION['role'] = $row["role_id"];
            }
            $_SESSION['username'] = $username;
            $_SESSION['success'] = "Успешно влязохте в акаунта си!";
            header('location: /DR/view/front/home.php');
        } else {
            array_push($errors, "Неправилно потребителско име и/или неправилна парола!");
            echo "NO";
        }
    }
}