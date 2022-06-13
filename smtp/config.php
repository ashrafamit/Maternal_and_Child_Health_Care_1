<?php
$mysqli= mysqli_connect('localhost','root','','bdaywish');     //	MySQL Host Name, MySQL User Name,vpanel password,MySQL DB Name
//$mysqli= mysqli_connect('sql204.unaux.com','unaux_31867220','2rghgg24','unaux_31867220_cronjob');     //	MySQL Host Name, MySQL User Name,vpanel password,MySQL DB Name
//mysqli_query($mysqli,"INSERT INTO demo values(null)");
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    exit();
  }
//   echo("<br>Error description: " . $mysqli -> error);
?>