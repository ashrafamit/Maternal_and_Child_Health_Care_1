<?php

    include("config.php");
    
    if(isset($_POST['submit'])){
        $name=$_POST['name'];
        $email=$_POST['email'];
        $mobile=$_POST['mobile'];
        $dates=$_POST['dates'];

        $result = mysqli_query($mysqli,"INSERT into record values('','$name','$email','$mobile','$dates','')");
    }


    if($result){
        // echo "success";
        header("location:insert.php");
    }else{
        echo "failed";
    }


    ?>