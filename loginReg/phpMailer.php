<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';


function sendemail_verify($name, $email, $verify_token)
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

    //Recipients
    $mail->setFrom('ashrafamit9227@gmail.com', $name);
    //$mail->addAddress('joe@example.net', 'Joe User');                 //Add a recipient
    $mail->addAddress($email);                                          //Name is optional
    //$mail->addReplyTo('info@example.com', 'Information');
    //$mail->addCC('cc@example.com');
    //$mail->addBCC('bcc@example.com');

    //Attachments
    //$mail->addAttachment('/var/tmp/file.tar.gz');                     //Add attachments
    //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');                 //Optional name

    //Content
    $mail->isHTML(true);                                                    //Set email format to HTML
    $mail->Subject = 'Email Verification From Funda of Web IT';
    //$mail->Body    = 'This is the HTML message body <b>in bold!</b>';
    //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $email_template = "
    <h2>You have registered with Funda of Web IT</h2>
    <h5>Verify your email address with the link given below to login</h5>
    <br><br>
    <a href='http://localhost/loginReg/verify-email.php?token=$verify_token'>Click Me</a>
    ";

    $mail->Body = $email_template;
    $mail->send();
    // echo 'Message has been sent';

}

?>