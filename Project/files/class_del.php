<?php
    include ("../include/conn.php");
    $del=$_GET['yourdel'];
    $SQL="DELETE FROM `class` WHERE `class_id`='$del'";
    $run=mysqli_query($conn,$SQL);
    if($run){
        echo 1;
    }else{
        echo 2;
    }
?>