<?php
require_once  $_SERVER['DOCUMENT_ROOT'] . '/DR/src/database/db.php';

$errors = array();

if (isset($_GET['tokenpass'])) {
    if (isset($_POST['btn-renew-pass'])) {

        $passForgotten = $_POST['pass-forgotten'];
        $passForgottenRepeat = $_POST['pass-forgotten-repeat'];

        if (empty($passForgotten)) {
            $errors['passForgotten'] = "Моля въведете Парола";
        }

        if (!empty($passForgotten) && empty($passForgottenRepeat)) {
            $errors['passForgottenRepeat'] = "Моля повторете парола";
        }

        if (!empty($passForgotten) && !empty($passForgottenRepeat) && $passForgotten !== $passForgottenRepeat) {
            $errors['passForgotten'] = "Двете пароли не съвпадат.";
        }


        if (count($errors) === 0) {
            $password = md5($passForgotten);
            $token = $_GET['tokenpass'];


            $queryRenew = "SELECT * FROM tm_users u INNER JOIN tb_register_client cl ON u.username = cl.username 
            WHERE cl.token = '$token'";
            $result = $DB->query($queryRenew);
            print_r($result);
            if (mysqli_num_rows($result) > 0) {
                $queryUpdate = "UPDATE tm_users u INNER JOIN tb_register_client cl ON u.username = cl.username 
                SET u.password = '$password'
                WHERE cl.token = '$token'";
                print_r($queryUpdate);
                $result = $DB->query($queryUpdate);
                print_r($result);
                if ($DB->query($queryUpdate) == 1) {
                    header('location: /DR/src/messages/renewPassSuccess.php');
                } else {
                    $errors['passForgotten'] = "Неуспешно!";
                }
            } else {
                $queryRenew = "SELECT * FROM tm_users u INNER JOIN tb_register_company cp ON u.username = cp.username 
                WHERE cp.token = '$token'";
                $result = $DB->query($queryRenew);
                print_r($result);

                if (mysqli_num_rows($result) > 0) {
                    $queryUpdate = "UPDATE tm_users u INNER JOIN tb_register_company cp ON u.username = cp.username 
                    SET u.password = '$password'
                    WHERE cp.token = '$token'";
                    if ($DB->query($queryUpdate) == 1) {
                        header('location: /DR/src/messages/renewPassSuccess.php');
                    } else {
                        $errors['passForgotten'] = "Неуспешно!";
                    }
                }
            }
        }
    }
}
