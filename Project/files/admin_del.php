<?php 
include("../include/conn.php");
    $del=$_GET['mydel'];    
        $SQL="DELETE FROM `admin` WHERE `admin_id`='$del'";
        $run=mysqli_query($conn,$SQL);
        if($run){
               echo 1;
        }else{
            echo 2;
        }
 

?>