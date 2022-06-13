<?php

date_default_timezone_set("Asia/Dhaka");
echo date_default_timezone_get();
echo time();
echo "<br>";
echo  strtotime('22-06-12 20:46:52');
echo "<br>";
echo  strtotime('22-06-12 08:46:52')-time();
echo "<br>";
echo date("y-m-d H:i:s",time()+(3600*12));

?>