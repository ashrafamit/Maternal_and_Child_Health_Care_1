<?php
include("config.php");
include("phpMailer.php");

date_default_timezone_set("Asia/Dhaka");
// $new_t = date("Y-m-d H:i:s", strtotime('+1 hours'));
// $new_time = date("Y-m-d H:i:s");
//echo strtotime();

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
        sendemail_reminder($frName, $yEmail, $DOB);

        $update_query = "UPDATE record SET active='1' WHERE id='$id' LIMIT 1";
        $update_query_run = mysqli_query($mysqli, $update_query);
    }

    echo '<tr>';
    echo '<td>' . $result['id'] . '</td>';
    echo '<td>' . $result['name'] . '</td>';
    echo '<td>' . $result['email'] . '</td>';
    echo '<td>' . $result['mobile'] . '</td>';
    echo '<td>' . $result['dates'] . '</td>';
    echo '<td>' . $result['active'] . '</td>';
    echo '</tr>';
}
?>