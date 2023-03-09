<?php
include("../Project/include/conn.php");

$username = $_POST['username'];
$userEmail = $_POST['userEmail'];
$userPassword = $_POST['userPassword'];
$udate = date('y-m-d');
$userPasswordencode=md5($userPassword);


if ($username == null || $userEmail == null || $userPassword == null) {
    echo 5000;
} else {


    // User check query
    $check_query = "SELECT * FROM `user` WHERE uemail='$userEmail'";
    $checkrun = mysqli_query($conn, $check_query);

    if (mysqli_num_rows($checkrun) > 0) {
        echo 1000;
    } else {
        $insertQuery = "INSERT INTO `user`( `uname`, `upassword`, `uemail`, `udate`)
         VALUES ('$username','$userPasswordencode','$userEmail','$udate')";
        $insertrun = mysqli_query($conn, $insertQuery);
        if ($insertrun) {
            echo 2000;
        }
    }
}
