<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';



function sendemail_reminder($name, $email, $date)
{
    $mail = new PHPMailer(true);

    //$mail->SMTPDebug = 2;
    $mail->isSMTP();                                                    //Send using SMTP
    $mail->SMTPAuth   = true;                                           //Enable SMTP authentication

    $mail->Host       = 'smtp.gmail.com';                               //Set the SMTP server to send through
    $mail->Username   = 'ashrafamit9227@gmail.com';                         //SMTP username
    $mail->Password   = 'tqjcecrpjpkfonep';                             //SMTP password

    $mail->SMTPSecure = 'tls';                                              //Enable implicit TLS encryption
    $mail->Port       = 587;                                            //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    $mail->setFrom('ashrafamit9227@gmail.com', $name);
    $mail->addAddress($email);                                          //Name is optional
 
    $mail->isHTML(true);                                                    //Set email format to HTML
    $mail->Subject = 'Email Reminder From Birthday Reminder';

    $email_template = "
    <h2>It is $name's birthday (date : $date)</h2>
    ";

    $mail->Body = $email_template;
    $mail->send();
    // echo 'Message has been sent';

}

?>