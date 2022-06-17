<?php

function sendVerificationEmail($userEmail , $token){

    $email_from = 'findajob341@gmail.com';
    $email_subject = 'Email Verification';

    $email_body = 
    '<p style="font-size: 20px;">Благодарим ви, че се регистрирахте на нашия сайт. Моля натиснете линка отдолу за да потвърдите вашата регистрация.</p>
    <a href="http://localhost/DR/view/front/home.php?token=' . $token . '">
    Потвърдете вашата регистрация!
    </a>';

    $to = $userEmail; //send to

    $headers = "From $email_from \r\n";
    $headers .= "Content-Type: text/html; charset=UTF-8\r\n";
    mail($to, $email_subject, $email_body, $headers);

}

function forgottenPass($userEmail, $token){
    $email_from = 'findajob341@gmail.com';
    $email_subject = 'Reset Password';

    $email_body = 
    '<p style="font-size: 20px;">Натиснете посочения линк за да възстановите вашата парола.</p>
    <a href="http://localhost/DR/view/front/passwordReset/resetPass.php?tokenpass=' . $token . '">
    Смяна на парола
    </a>';

    $to = $userEmail; //send to

    $headers = "From $email_from \r\n";
    $headers .= "Content-Type: text/html; charset=UTF-8\r\n";
    mail($to, $email_subject, $email_body, $headers);
}

function daysLeftJob($userEmail,$job){
    $email_from = 'findajob341@gmail.com';
    $email_subject = 'Job expiring soon';

    $email_body = 
    '<p style="font-size: 20px;">Вашата обява "'.$job.'" изтича след 2 дни. За повече информация, моля свържете се с нашия персонал.</p>';

    $to = $userEmail; //send to

    $headers = "From $email_from \r\n";
    $headers .= "Content-Type: text/html; charset=UTF-8\r\n";
    mail($to, $email_subject, $email_body, $headers);
}