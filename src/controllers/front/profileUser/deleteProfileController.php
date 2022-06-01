<?php 
require_once  $_SERVER['DOCUMENT_ROOT'] . '/DR/src/database/db.php';
// require_once  $_SERVER['DOCUMENT_ROOT'] . '/DR/src/controllers/front/profileUser/myProfileUserController.php';

//delete profile
// if (isset($_POST['btn-delete-profile'])) {
if (isset($_POST['deleteProfile'])) {

    $passwordDelete = $_POST['passwordDelete'];

    if (empty($passwordDelete)) {
        $errors['password'] = 'Моля въведете парола';
    }

    if (count($errors) === 0) {
        $passwordDelete = md5($passwordDelete);

        $passQuery = $DB->selectAll('tm_users')->where(array('username' => $DB->str($username), 'password' => $DB->str($passwordDelete)))->execute();
        $results = $DB->query($passQuery);

        if (mysqli_num_rows($results) > 0) {
            $deleteUser = $DB->delete('tm_users')->where(array('username' => $DB->str($username)))->execute();

            if ($DB->query($deleteUser) == 1) {
                session_destroy();
                unset($_SESSION['role_id']);
                unset($_SESSION['username']);
                header('location: /DR/view/front/login.php');
            } else {
                $errors['user'] = "Неуспешно!";
            }
        } else {
            $errors['pass'] = "Грешна парола!";
        }
    };
}
// echo "kkk";