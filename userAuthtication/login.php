<?php

include('../Project/include/conn.php');

$userEmail = $_POST['uemail'];
$userPassword = $_POST['userPassword'];
$userpassenc=md5($userPassword);
if ($userEmail == null || $userPassword == null) {
    echo 1000;
} else {
    $loginquery = "SELECT * FROM `user` WHERE uemail='$userEmail' AND upassword='$userpassenc'";
    $loginrun=mysqli_query($conn,$loginquery);
    
    if (mysqli_num_rows($loginrun)==1) {
        $_SESSION['user_email']=$userEmail;
        // echo $_SESSION['user_email'];
        echo 2000;

    }else{
        echo 3000;
    }
}
