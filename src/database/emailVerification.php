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
