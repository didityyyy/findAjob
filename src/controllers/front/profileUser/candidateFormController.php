<?php
require_once  $_SERVER['DOCUMENT_ROOT'] . '/DR/src/database/db.php';

//show cities
$queryCity = $DB->selectAll('tb_city')->orderby('title')->execute();
$rowCity = $DB->fetchQuery($queryCity);

$errors = array();
$message = NULL;

$username = $_SESSION['username'];

//profile has candidates?
$queryCandidates = $DB->selectAll('tb_candidates c join tb_register_client u on u.id = c.profileid')->where(array('u.username' => $DB->str($username), 'c.saved' => 1))->execute();
$rowCandidate = $DB->fetchQuery($queryCandidates);

$queryUser = $DB->selectAll('tb_register_client')->where(array('username' => $DB->str($username)))->execute();
$rowUser = $DB->fetchQuery($queryUser);

if (isset($_POST['candidate-btn'])) {

    $firstname              = $_POST['firstname'];
    $lastname               = $_POST['lastname'];
    $address                = $_POST['address'];
    $zipcode                = $_POST['zipcode'];
    $phone                  = $_POST['phone'];
    $dateofbirth            = $_POST['dateofbirth'];
    $workdescription        = $_POST['workdescription'];
    $educationdescription   = $_POST['educationdescription'];
    $personaldescription    = $_POST['personaldescription'];

    if (isset($_POST['savedcandidates'])) {
        if (isset($_GET['id'])) {
            $jobid = $_GET['id'];
        }
        $insertSave = $DB->insert('tb_used_saved_candidates', array(
            'id_cand'    => $_POST['savedcandidates'],
            'id_profile' => $rowUser[0]['id'],
            'status'     => 5,
            'jobid'      => $jobid
        ));

        $querySave = $DB->query($insertSave);

        if ($querySave == 1) {
            $message = "<b> Успешно кандидатсвахте! </b> ";
        }
    } else {
        if (empty($firstname)) {
            $errors['firstname'] = "Моля въведете Име";
        }
        if (empty($lastname)) {
            $errors['lastname'] = "Моля въведете Фамилия";
        }
        if (empty($address)) {
            $errors['address'] = "Моля въведете Адрес";
        }
        if (empty($_POST['city'])) {
            $errors['city'] = "Моля изберете Град";
        }
        if (empty($zipcode)) {
            $errors['zipcode'] = "Моля въведете Пощенски код";
        }
        if (empty($phone)) {
            $errors['phone'] = "Моля въведете Телефон";
        }
        if (empty($dateofbirth)) {
            $errors['dateofbirth'] = "Моля изберете Дата";
        }
        if (empty($workdescription)) {
            $errors['workdescription'] = "Моля въведете Трудов стаж";
        }
        if (empty($educationdescription)) {
            $errors['educationdescription'] = "Моля въведете Образование";
        }
        if (empty($personaldescription)) {
            $errors['personaldescription'] = "Моля въведете Лични умения";
        }
        if (!is_numeric($zipcode)) {
            $errors['zipcode'] = "Невалиден Пощенски код";
        }


        if (count($errors) === 0) {

            if (isset($_GET['id'])) {
                $jobid = $_GET['id'];
            }

            //saved
            if (isset($_POST['savecandidate'])) {
                $insert1 = $DB->insert('tb_candidates', array(
                    'firstname'           => $DB->str($firstname),
                    'lastname'            => $DB->str($lastname),
                    'email'               => $DB->str($rowUser[0]['email']),
                    'address'             => $DB->str($address),
                    'city'                => $_POST['city'],
                    'zipcode'             => $zipcode,
                    'phone'               => $DB->str($phone),
                    'birthdate'           => $DB->str($dateofbirth),
                    'workexperience'      => $DB->str($workdescription),
                    'educationexperience' => $DB->str($educationdescription),
                    'personalexperience'  => $DB->str($personaldescription),
                    'saved'               => 1,
                    'profileid'           => $rowUser[0]['id'],
                    'status'              => 5,
                    'jobid'               => $jobid
                ));

                $query1 = $DB->query($insert1);

                if ($query1 == 1) {
                    $message = "<b> Успешно кандидатсвахте! </b> ";
                }
            } else {

                $insert2 = $DB->insert('tb_candidates', array(
                    'firstname'           => $DB->str($firstname),
                    'lastname'            => $DB->str($lastname),
                    'email'               => $DB->str($rowUser[0]['email']),
                    'address'             => $DB->str($address),
                    'city'                => $_POST['city'],
                    'zipcode'             => $zipcode,
                    'phone'               => $DB->str($phone),
                    'birthdate'           => $DB->str($dateofbirth),
                    'workexperience'      => $DB->str($workdescription),
                    'educationexperience' => $DB->str($educationdescription),
                    'personalexperience'  => $DB->str($personaldescription),
                    'profileid'           => $rowUser[0]['id'],
                    'status'              => 5,
                    'jobid'               => $jobid
                ));

                $query2 = $DB->query($insert2);

                if ($query2 == 1) {
                    $message = "<b> Успешно кандидатсвахте! </b> ";
                }
            }
        }
    }
}
