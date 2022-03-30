<?php

require_once  $_SERVER['DOCUMENT_ROOT'] . '/DR/src/database/db.php';
require_once  $_SERVER['DOCUMENT_ROOT'] . '/DR/src/database/emailVerification.php';

$errors = array();
$message = NULL;


if (isset($_POST['signup-btn-client'])) {

    $firstnameClient        = $_POST['firstnameClient'];
    $lastnameClient         = $_POST['lastnameClient'];
    $usernameRegisterClient = $_POST['usernameRegisterClient'];
    $emailClient            = $_POST['emailClient'];
    $repeatemailClient      = $_POST['repeatemailClient'];
    $passwordRegisterClient = $_POST['passwordRegisterClient'];
    $repeatpasswordClient   = $_POST['repeatpasswordClient'];


    if (empty($firstnameClient)) {
        $errors['firstnameClient'] = "Моля въведете Име";
    }

    if (empty($lastnameClient)) {
        $errors['lastnameClient'] = "Моля въведете Фамилия";
    }

    if (empty($usernameRegisterClient)) {
        $errors['usernameRegisterClient'] = "Моля въведете потребителско име";
    }

    if (empty($emailClient)) {
        $errors['emailClient'] = "Моля въведете Имейл";
    }

    if (!empty($emailClient) && empty($repeatemailClient)) {
        $errors['repeatemailClient'] = "Моля повторете имейл";
    }

    if (empty($passwordRegisterClient)) {
        $errors['passwordRegisterClient'] = "Моля въведете Парола";
    }

    if (!empty($passwordRegisterClient) && empty($repeatpasswordClient)) {
        $errors['repeatpasswordClient'] = "Моля повторете парола";
    }

    if (!isset($_POST['invalidCheckClient'])) {
        $errors['invalidCheckClient'] = "Необходимо е да сте съгласни с условията за ползване, за да се регистрирате.";
    }

    if (!empty($emailClient) && !filter_var($emailClient, FILTER_VALIDATE_EMAIL)) {
        $errors['emailClient'] = "Имейла е невалиден.";
    }

    if (!empty($emailClient) && $emailClient !== $repeatemailClient) {
        $errors['emailClient'] = "Двата имейла не съвпадат.";
    }

    if (!empty($passwordRegisterClient) && $passwordRegisterClient !== $repeatpasswordClient) {
        $errors['passwordRegisterClient'] = "Двете пароли не съвпадат.";
    }

    if (!empty($usernameRegisterClient) && strlen($usernameRegisterClient) < 5) {
        $errors['usernameRegisterClient'] = "Дължината на потребителското име трябва да е повече от 5 символа";
    }

    if (!empty($passwordRegisterClient) && strlen($passwordRegisterClient) < 6) {
        $errors['usernameRegisterClient'] = "Дължината на паролата трябва да има поне 6 символа";
    }

    //Check email
    global $emailCompany;

    $emailQuery = $DB->selectAll('tb_register_client')->where(array('email' => $DB->str($emailClient)))->execute();
    $user = $DB->query($emailQuery);
    $emailQuery2 = $DB->selectAll('tb_register_company')->where(array('email' => $DB->str($emailCompany)))->execute();
    $user1 = $DB->query($emailQuery2);

    if (mysqli_num_rows($user) > 0 || mysqli_num_rows($user1) > 0) {
        $errors['email'] = "Имейлът вече съществува";
    }
    //END Check email

    $usernameQuery = $DB->selectAll('tm_users')->where(array('username' => $DB->str($usernameRegisterClient)))->execute();
    $user = $DB->query($usernameQuery);

    if (mysqli_num_rows($user) > 0) {
        $errors['username'] = "Потребителското име вече съществува";
    }


    if (count($errors) === 0) {
        $password = md5($passwordRegisterClient);
        $role = 4;
        $token = bin2hex(random_bytes(50));

        $insert1 = $DB->insert('tm_users', array(
            'username' => $DB->str($usernameRegisterClient),
            'password' => $DB->str($password),
            'role_id'  => $role
        ));

        $query1 = $DB->query($insert1);

        if ($query1 == 1) {

            $insert2 = $DB->insert('tb_register_client', array(
                'username' => $DB->str($usernameRegisterClient),
                'firstname' => $DB->str($firstnameClient),
                'lastname' => $DB->str($lastnameClient),
                'email' => $DB->str($emailClient),
                'token' => $DB->str($token)
            ));

            $query2 = $DB->query($insert2);

            if ($query2 == 1) {
                $message = "Регистрирахте се успешно! <br> <b>Моля потвърдете вашата регистрация чрез вашата поща! </b> ";
                sendVerificationEmail($emailClient, $token);
            }
        }
    }
}



// Registration for companies

if (isset($_POST['signup-btn-company'])) {

    $firstnameCompany        = $_POST['firstnameCompany'];
    $lastnameCompany         = $_POST['lastnameCompany'];
    $phoneCompany            = $_POST['phoneCompany'];
    $usernameRegisterCompany = $_POST['usernameRegisterCompany'];
    $emailCompany            = $_POST['emailCompany'];
    $repeatemailCompany      = $_POST['repeatemailCompany'];
    $passwordRegisterCompany = $_POST['passwordRegisterCompany'];
    $repeatpasswordCompany   = $_POST['repeatpasswordCompany'];
    $companyname             = $_POST['companyname'];
    $companyid               = $_POST['companyid'];
    //$companylogo             = isset($_POST['companylogo']);

    if (empty($firstnameCompany)) {
        $errors['firstnameCompany'] = "Моля въведете Име";
    }

    if (empty($lastnameCompany)) {
        $errors['lastnameCompany'] = "Моля въведете Фамилия";
    }

    if (empty($phoneCompany)) {
        $errors['phoneCompany'] = "Моля въведете Телефон";
    }

    if (empty($usernameRegisterCompany)) {
        $errors['usernameRegisterCompany'] = "Моля въведете потребителско име";
    }

    if (empty($emailCompany)) {
        $errors['emailCompany'] = "Моля въведете Имейл";
    }

    if (!empty($emailCompany) && empty($repeatemailCompany)) {
        $errors['repeatemailCompany'] = "Моля повторете имейл";
    }

    if (empty($passwordRegisterCompany)) {
        $errors['passwordRegisterCompany'] = "Моля въведете Парола";
    }

    if (!empty($passwordRegisterCompany) && empty($repeatpasswordCompany)) {
        $errors['repeatpasswordCompany'] = "Моля повторете парола";
    }

    if (empty($companyname)) {
        $errors['companyname'] = "Моля въведете Юридическо име на фирмата/организацията";
    }

    if (empty($companyid)) {
        $errors['companyid'] = "Моля въведете БУЛСТАТ";
    }

    if (!isset($_POST['invalidCheckCompany'])) {
        $errors['invalidCheckCompany'] = "Необходимо е да сте съгласни с условията за ползване, за да се регистрирате.";
    }

    if (!empty($emailCompany) && !filter_var($emailCompany, FILTER_VALIDATE_EMAIL)) {
        $errors['emailCompany'] = "Имейла е невалиден.";
    }

    if (!empty($emailCompany) && $emailCompany !== $repeatemailCompany) {
        $errors['emailCompany'] = "Двата имейла не съвпадат.";
    }

    if (!empty($passwordRegisterCompany) && $passwordRegisterCompany !== $repeatpasswordCompany) {
        $errors['passwordRegisterCompany'] = "Двете пароли не съвпадат.";
    }

    if (!empty($usernameRegisterCompany) && !strlen($usernameRegisterCompany) > 5) {
        $errors['usernameRegisterCompany'] = "Дължината на потребителското име трябва да е повече от 5 символа";
    }

    //Check email
    global $emailClient;

    $emailQuery = $DB->selectAll('tb_register_client')->where(array('email' => $DB->str($emailClient)))->execute();
    $user = $DB->query($emailQuery);
    $emailQuery2 = $DB->selectAll('tb_register_company')->where(array('email' => $DB->str($emailCompany)))->execute();
    $user1 = $DB->query($emailQuery2);

    if (mysqli_num_rows($user) > 0 || mysqli_num_rows($user1) > 0) {
        $errors['email'] = "Имейлът вече съществува";
    }
    //END Check email

    $usernameQuery = $DB->selectAll('tm_users')->where(array('username' => $DB->str($usernameRegisterCompany)))->execute();
    $user = $DB->query($usernameQuery);

    if (mysqli_num_rows($user) > 0) {
        $errors['username'] = "Потребителското име вече съществува";
    }

    if (count($errors) === 0) {
        $password = md5($passwordRegisterCompany);
        $role = 3;
        $token = bin2hex(random_bytes(50));

        //FILE
        if (isset($_FILES['companylogo'])) {
            $img_name = $_FILES['companylogo']['name']; //get uploaded img name
            $tmp_name = $_FILES['companylogo']['tmp_name']; //save/move file in our folder

            $img_explode = explode('.', $img_name);
            $img_ext = end($img_explode); //get the extension

            $time = time();
            $new_img_name = $time . $img_name;
            move_uploaded_file($tmp_name, $_SERVER['DOCUMENT_ROOT'] . "/DR/assets/images/logos/" . $new_img_name);

            $insert1 = $DB->insert('tm_users', array(
                'username' => $DB->str($usernameRegisterCompany),
                'password' => $DB->str($password),
                'role_id'  => $role
            ));

            $query1 = $DB->query($insert1);
            if ($query1 == 1) {
                $insert2 = $DB->insert('tb_register_company', array(
                    'firstname'     => $DB->str($firstnameCompany),
                    'lastname'      => $DB->str($lastnameCompany),
                    'username'      => $DB->str($usernameRegisterCompany),
                    'phone'         => $DB->str($phoneCompany),
                    'email'         => $DB->str($emailCompany),
                    'companyname'   => $DB->str($companyname),
                    'companyid'     => $companyid,
                    'logo'          => $DB->str($new_img_name),
                    'token'         => $DB->str($token)
                ));
                $query2 = $DB->query($insert2);

                if ($query2 == 1) {
                    $message = "Регистрирахте се успешно! <br> <b>Моля потвърдете вашата регистрация чрез вашата поща! </b> ";
                    sendVerificationEmail($emailCompany, $token);
                }
            }
        }
    }
}

