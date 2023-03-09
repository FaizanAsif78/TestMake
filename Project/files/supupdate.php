<?php
    include ('../include/conn.php');
        $uid=mysqli_real_escape_string($conn,$_POST['suid']);
         $supname=mysqli_real_escape_string($conn,$_POST['supname']);
         $supemail=mysqli_real_escape_string($conn,$_POST['supemail']);
         $supcontact=mysqli_real_escape_string($conn,$_POST['supcontact']);
         $supdate=date("Y-m-d");
     
        $sql="UPDATE `supplier` SET `supname`='$supname',`supemail`='$supemail',`supcontact`='$supcontact'
        WHERE `suid`='$uid'";
         $run=mysqli_query($conn,$sql);
         if($run){
            echo 1;
            // echo "<script>alert('Supplier HAS BEEN UPDATED')</script>";
            // header("Refresh:0,url=./viewsupplier.php");
         }else{
            echo 2;
            // echo "<script>alert('Supplier HAS NOT BEEN UPDATED')</script>";
         }
        
?>