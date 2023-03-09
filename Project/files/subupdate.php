<?php
    include ('../include/conn.php');

        $uid=mysqli_real_escape_string($conn,$_POST['sid']);
        $smain=mysqli_real_escape_string($conn,$_POST['smain']);
        $scate=mysqli_real_escape_string($conn,$_POST['scate']);
        $sdes=mysqli_real_escape_string($conn,$_POST['sdes']);
        $sdate=date("Y-m-d");

        $sql="UPDATE `sub category` SET `smain`='$smain',`scate`='$scate',`sdes`='$sdes'
        WHERE `sid`='$uid'";
        $run=mysqli_query($conn,$sql);
        if($run){
            echo 1;
            // echo "<script>alert('Sub Category HAS BEEN UPDATED')</script>";
            // header("Refresh:0,url=./viewsubcate.php");
        }else{
            echo 2;
            // echo "<script>alert('Sub Category HAS BEEN NOT UPDATED')</script>";
        }
    
?>