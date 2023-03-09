<?php
    include ("../include/conn.php");
    $del=$_GET['yourdel'];
    $SQL="DELETE FROM `books` WHERE `book_id`='$del'";
    $run=mysqli_query($conn,$SQL);
    if($run){
        echo 1;
    }else{
        echo 2;
    }
?>