<?php

include("config.php");
require_once("class.phpmailer.php");
require_once("class.smtp.php");

date_default_timezone_set("Asia/Dhaka");

// $find_dates_to_send_reminder ="SELECT * from record WHERE  CURRENT_TIMESTAMP > DATE_SUB(dates , interval 1 day)  and active = 0";
$find_dates_to_send_reminder = "SELECT * from record WHERE  dates > CURRENT_TIMESTAMP  and active = 0";
$find_dates_to_send_reminder_run = mysqli_query($mysqli, $find_dates_to_send_reminder);


while ($result = mysqli_fetch_array($find_dates_to_send_reminder_run)) {
    
    $frName = $result['name'];
    $yEmail = $result['email'];
    $DOB = $result['dates'];
    $id = $result['id'];

    $unixDate = strtotime($DOB);
    $diff = $unixDate - time();
    //echo $diff."=".$unixDate."-".time();

    if ($diff <= 3600) {
        //sendemail_reminder($frName, $yEmail, $DOB);
            $mail = new PHPMailer();

            $mail->SMTPDebug = 2;
            $mail->isSMTP();                                                    //Send using SMTP
            $mail->SMTPAuth   = true;                                           //Enable SMTP authentication

            $mail->Host       = 'smtp.gmail.com';                               //Set the SMTP server to send through
            $mail->Username   = 'ashrafamit9227@gmail.com';                         //SMTP username
            $mail->Password   = 'tqjcecrpjpkfonep';                             //SMTP password

            $mail->SMTPSecure = 'tls';                                              //Enable implicit TLS encryption
            $mail->Port       = 587;                                            //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

            $mail->setFrom('ashrafamit9227@gmail.com',$frName);
            $mail->addAddress($yEmail);                                          //Name is optional
        
            $mail->isHTML(true);                                                    //Set email format to HTML
            $mail->Subject = 'Email Reminder From Birthday Reminder';

            $email_template = "
            <h2>It is amit's birthday</h2>
            ";

            $mail->Body = $email_template;
            $mail->send();

        $update_query = "UPDATE record SET active='1' WHERE id='$id' LIMIT 1";
        $update_query_run = mysqli_query($mysqli, $update_query);
    }

}
?>
