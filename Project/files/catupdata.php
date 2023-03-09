<?php

     include('../include/conn.php');
        $uid=mysqli_real_escape_string($conn,$_POST['cid']);
        $ccate=mysqli_real_escape_string($conn,$_POST['ccate']);
        $cdes=mysqli_real_escape_string($conn,$_POST['cdes']);
        $cdate=date("Y-m-d");
    
       $sql="UPDATE `category` SET `ccate`='$ccate',`cdes`='$cdes'
       WHERE `cid`='$uid'";
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