<?php

include('../include/conn.php');
// session_start();
if (isset($_POST['email'])) {

    // $_SESSION['email']=$_POST['email'];
    // $pemail=$_SESSION['email'];

    $pemail = mysqli_real_escape_string($conn, $_POST['email']);
    $mypass = mysqli_real_escape_string($conn, $_POST['mypass']);
     $mypassenc=md5($mypass);
    if (($pemail == "") || ($mypass == "")) {
        echo 8;
        // echo "Please fill email and password";
    } else {
        $esql = "SELECT * FROM `admin` WHERE `email`='$pemail' AND `password`='$mypassenc'";
        $erun = mysqli_query($conn, $esql);
        if (mysqli_num_rows($erun) == 1) {
            $gsql = "SELECT * FROM `admin` WHERE `email`='$pemail'";
            $grun = mysqli_query($conn, $gsql);
            $gfet = mysqli_fetch_assoc($grun);

            if (isset($gfet['role'])) {
                $_SESSION['newemail'] = $_POST['email'];
                $_SESSION['role'] = $gfet['role'];

                echo 9;
                // echo "Email and Password Insereted";
            }
        } else {
            echo 10;
            //   echo "Email and Password Not Insereted";
        }
    }
}
