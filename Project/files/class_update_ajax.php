<?php

     include('../include/conn.php');
        $uid=mysqli_real_escape_string($conn,$_POST['class_id']);
        $class_name=mysqli_real_escape_string($conn,$_POST['class_name']);
        $class_des=mysqli_real_escape_string($conn,$_POST['class_des']);
        $cdate=date("Y-m-d");
    
       $sql="UPDATE `class` SET `class_name`='$class_name',`class_des`='$class_des'
       WHERE `class_id`='$uid'";
        $run=mysqli_query($conn,$sql);
        if($run){
            echo 1;
        //    echo "<script>alert('Category HAS BEEN UPDATED')</script>";
        //    header("Refresh:0,url=./viewcategory.php");
        }else{
            echo 2;
        //    echo "<script>alert('Category HAS NOT BEEN UPDATED')</script>";
        }
       
?>