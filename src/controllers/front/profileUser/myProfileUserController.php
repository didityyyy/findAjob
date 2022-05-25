<?php
require_once  $_SERVER['DOCUMENT_ROOT'] . '/DR/src/database/db.php';

$username = $_SESSION['username'];
$query = $DB->selectAll('tb_register_client')->where(array('username' => $DB->str($username)))->execute();
$results = $DB->query($query);
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

//delete profile
if (isset($_POST['btn-delete-profile'])) {
    // $delete = $DB->selectAll('tm_users')->where(array('username' => $DB->str($username)))->execute();
    //     $results = $DB->query($delete);

        // if (mysqli_num_rows($results) > 0) {
            $deleteUser = $DB->delete('tm_users')->where(array('username' => $DB->str($username)))->execute();
            
            print_r($deleteUser);
            if ($DB->query($deleteUser) == 1) {
                session_destroy();
                unset($_SESSION['role_id']);
                unset($_SESSION['username']);
                header('location: /DR/view/front/login.php');
            } else {
                $errors['user'] = "Неуспешно!";
            }
        // }
        
}