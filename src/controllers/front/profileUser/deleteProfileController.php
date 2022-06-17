<?php
require_once  $_SERVER['DOCUMENT_ROOT'] . '/DR/src/database/db.php';
session_start();
$username = $_SESSION['username'];

if (isset($_POST['deleteProfile'])) {

    if (isset($_POST['passCheck'])) {
        $passwordDelete = $_POST['passCheck'];
        if ($passwordDelete != "") {
            $passwordDelete = md5($passwordDelete);
            $passQuery = $DB->selectAll('tm_users')->where(array('username' => $DB->str($username), 'password' => $DB->str($passwordDelete)))->execute();
            $results = $DB->query($passQuery);
            if (mysqli_num_rows($results) > 0) {
                $deleteUser = $DB->delete('tm_users')->where(array('username' => $DB->str($username)))->execute();
                if ($DB->query($deleteUser) == 1) {
                    session_destroy();
                    unset($_SESSION['role_id']);
                    unset($_SESSION['username']);
                    echo "success";
                } else {
                    echo "Неуспешно!";
                }        
            } else {
                echo "Грешна парола!";
            }
        } else {
            echo 'Моля въведете парола';
        }
    }
}
