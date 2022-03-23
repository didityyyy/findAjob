<?php

require_once  $_SERVER['DOCUMENT_ROOT'] . '/DR/src/database/db.php';

// $query = "SELECT * FROM tm_users";

// $db = new Database;

// $result = $db->query($query);

// foreach($result as $row) {
//     echo $row['username'];
// }

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

    if (empty($repeatemailClient)) {
        $errors['repeatemailClient'] = "Моля повторете имейл";
    }

    if (empty($passwordRegisterClient)) {
        $errors['passwordRegisterClient'] = "Моля въведете Парола";
    }

    if (empty($repeatpasswordClient)) {
        $errors['repeatpasswordClient'] = "Моля повторете парола";
    }

    if (!isset($_POST['invalidCheckClient'])) {
        $errors['invalidCheckClient'] = "Необходимо е да сте съгласни с условията за ползване, за да се регистрирате.";
    }

    if (!filter_var($emailClient, FILTER_VALIDATE_EMAIL)) {
        $errors['emailClient'] = "Имейла е невалиден.";
    }

    if ($emailClient !== $repeatemailClient) {
        $errors['emailClient'] = "Двата имейла не съвпадат.";
    }

    if ($passwordRegisterClient !== $repeatpasswordClient) {
        $errors['passwordRegisterClient'] = "Двете пароли не съвпадат.";
    }

    if (strlen($usernameRegisterClient) < 5) {
        $errors['usernameRegisterClient'] = "Дължината на потребителското име трябва да е повече от 5 символа";
    }

    if (!empty($passwordRegisterClient) && strlen($passwordRegisterClient) < 6) {
        $errors['usernameRegisterClient'] = "Дължината на паролата трябва да има поне 6 символа";
    }

    $emailQuery = "SELECT * FROM tb_register_client WHERE email='$emailClient' LIMIT 1";
    $user = $DB->query($emailQuery);

    if (mysqli_num_rows($user) > 0) {
        $errors['email'] = "Имейлът вече съществува";
    }

    $usernameQuery = "SELECT * FROM tm_users WHERE username='$usernameRegisterClient' LIMIT 1";
    $user = $DB->query($usernameQuery);
   
    if (mysqli_num_rows($user) > 0) {
        $errors['username'] = "Потребителското име вече съществува";
    }


    if (count($errors) === 0) {
        $password = md5($passwordRegisterClient);
        $role = 4;

        $insert1 = $DB->insert('tm_users', array(
            'username' => $DB->str($usernameRegisterClient),
            'password' => $DB->str($password),
            'role_id'  => $DB->str($role)
        ));

        $query1 = $DB->query($insert1);

        // $insert1  = "INSERT INTO tm_users (username,password,role_id) VALUES ('$usernameRegisterClient', '$password', $role)";
        // $query1 = mysqli_query($db, $insert1) or die(mysqli_error($db));
        if ($query1 == 1) {

            $insert2 = $DB->insert('tb_register_client', array(
                'username' => $DB->str($usernameRegisterClient),
                'firstname' => $DB->str($firstnameClient),
                'lastname' => $DB->str($lastnameClient),
                'email' => $DB->str($emailClient)
            ));
    
            $query2 = $DB->query($insert2);

            // $insert2 = "INSERT INTO tb_register_client (username,firstname,lastname,email) VALUES ('$usernameRegisterClient', '$firstnameClient', '$lastnameClient','$emailClient')";
            // $query2 = mysqli_query($db, $insert2) or die(mysqli_error($db));
            if ($query2 == 1) {
                $message = "Регистрирахте се успешно!";
            }
        }
    }
}



// Registration for companies

// if (isset($_POST['signup-btn-company'])) {

//     $firstnameCompany        = $_POST['firstnameCompany'];
//     $lastnameCompany         = $_POST['lastnameCompany'];
//     $phoneCompany            = $_POST['phoneCompany'];
//     $usernameRegisterCompany = $_POST['usernameRegisterCompany'];
//     $emailCompany            = $_POST['emailCompany'];
//     $repeatemailCompany      = $_POST['repeatemailCompany'];
//     $passwordRegisterCompany = $_POST['passwordRegisterCompany'];
//     $repeatpasswordCompany   = $_POST['repeatpasswordCompany'];
//     $companyname             = $_POST['companyname'];
//     $companyid               = $_POST['companyid'];
//     //$companylogo             = isset($_POST['companylogo']);

//     if (empty($firstnameCompany)) {
//         $errors['firstnameCompany'] = "Моля въведете Име";
//     }

//     if (empty($lastnameCompany)) {
//         $errors['lastnameCompany'] = "Моля въведете Фамилия";
//     }

//     if (empty($phoneCompany)) {
//         $errors['phoneCompany'] = "Моля въведете Телефон";
//     }

//     if (empty($usernameRegisterCompany)) {
//         $errors['usernameRegisterCompany'] = "Моля въведете потребителско име";
//     }

//     if (empty($emailCompany)) {
//         $errors['emailCompany'] = "Моля въведете Имейл";
//     }

//     if (empty($repeatemailCompany)) {
//         $errors['repeatemailCompany'] = "Моля повторете имейл";
//     }

//     if (empty($passwordRegisterCompany)) {
//         $errors['passwordRegisterCompany'] = "Моля въведете Парола";
//     }

//     if (empty($repeatpasswordCompany)) {
//         $errors['repeatpasswordCompany'] = "Моля повторете парола";
//     }

//     if (empty($companyname)) {
//         $errors['companyname'] = "Моля въведете Юридическо име на фирмата/организацията";
//     }

//     if (empty($companyid)) {
//         $errors['companyid'] = "Моля въведете БУЛСТАТ";
//     }

//     if (!isset($_POST['invalidCheckCompany'])) {
//         $errors['invalidCheckCompany'] = "Необходимо е да сте съгласни с условията за ползване, за да се регистрирате.";
//     }

//     if (!filter_var($emailCompany, FILTER_VALIDATE_EMAIL)) {
//         $errors['emailCompany'] = "Имейла е невалиден.";
//     }

//     if ($emailCompany !== $repeatemailCompany) {
//         $errors['emailCompany'] = "Двата имейла не съвпадат.";
//     }

//     if ($passwordRegisterCompany !== $repeatpasswordCompany) {
//         $errors['passwordRegisterCompany'] = "Двете пароли не съвпадат.";
//     }

//     if (!strlen($usernameRegisterCompany) > 5) {
//         $errors['usernameRegisterCompany'] = "Дължината на потребителското име трябва да е повече от 5 символа";
//     }

//     $emailQuery = "SELECT * FROM tb_register_company WHERE email=? LIMIT 1";
//     $stmt = $db->prepare($emailQuery);
//     $stmt->bind_param('s', $emailCompany);
//     $stmt->execute();
//     $result = $stmt->get_result();
//     $userCount = $result->num_rows;
//     $stmt->close();

//     if ($userCount > 0) {
//         $errors['email'] = "Email already exists";
//     }

//     $usernameQuery = "SELECT * FROM tm_users WHERE username=? LIMIT 1";
//     $stmt = $db->prepare($usernameQuery);
//     $stmt->bind_param('s', $usernameRegisterCompany);
//     $stmt->execute();
//     $result = $stmt->get_result();
//     $userCount = $result->num_rows;
//     $stmt->close();

//     if ($userCount > 0) {
//         $errors['username'] = "Username already exists";
//     }




//     if (count($errors) === 0) {
//         $password = md5($passwordRegisterCompany);
//         $role = 3;
//         //FILE
//         if (isset($_FILES['companylogo'])) {
//             $img_name = $_FILES['companylogo']['name']; //get uploaded img name
//             $tmp_name = $_FILES['companylogo']['tmp_name']; //save/move file in our folder

//             $img_explode = explode('.', $img_name);
//             $img_ext = end($img_explode); //get the extension

//             $time = time();
//             $new_img_name = $time . $img_name;
//             var_dump($new_img_name);
//             move_uploaded_file($tmp_name, $_SERVER['DOCUMENT_ROOT'] . "/FindAJob/images/logos/" . $new_img_name);

//             $insert1  = "INSERT INTO tm_users (username,password,role_id) VALUES ('$usernameRegisterCompany', '$password', $role)";
//             $query1 = mysqli_query($db, $insert1) or die(mysqli_error($db));
//             if ($query1 == 1) {
//                 $insert2 = "INSERT INTO tb_register_company (firstname,lastname,username,phone,email,companyname,companyid,logo) VALUES ('$firstnameCompany', '$lastnameCompany','$usernameRegisterCompany','$phoneCompany','$emailCompany','$companyname',$companyid,'$new_img_name')";
//                 $query2 = mysqli_query($db, $insert2) or die(mysqli_error($db));
//                 if ($query2 == 1) {
//                     $message = "Регистрирахте се успешно!";
//                 }
//             }
//         }
//     }
// }