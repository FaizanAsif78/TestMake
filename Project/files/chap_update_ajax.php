
<?php
    include ('../include/conn.php');
         $uid=mysqli_real_escape_string($conn,$_POST['chp_id']);
         $chp_name=mysqli_real_escape_string($conn,$_POST['chp_name']);
         $chp_num=mysqli_real_escape_string($conn,$_POST['chp_num']);
         // $supemail=mysqli_real_escape_string($conn,$_POST['supemail']);
         // $supcontact=mysqli_real_escape_string($conn,$_POST['supcontact']);
         $supdate=date("Y-m-d");
     
        $sql="UPDATE `chapter` SET `chp_name`='$chp_name',`chp_num`='$chp_num' WHERE `chp_id`='$uid'";
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