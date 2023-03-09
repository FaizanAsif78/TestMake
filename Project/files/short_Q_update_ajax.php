
<?php
    include ('../include/conn.php');
         $uid=mysqli_real_escape_string($conn,$_POST['short_ques_id']);
         $short_ques_eng=mysqli_real_escape_string($conn,$_POST['short_ques_eng']);
         $short_ques_urdu=mysqli_real_escape_string($conn,$_POST['short_ques_urdu']);
         // $supemail=mysqli_real_escape_string($conn,$_POST['supemail']);
         // $supcontact=mysqli_real_escape_string($conn,$_POST['supcontact']);
         $ldate=date("Y-m-d");
     
        $sql="UPDATE `short_ques` SET `short_ques_eng`='$short_ques_eng',
        `short_ques_urdu`='$short_ques_urdu' WHERE `short_ques_id`='$uid'";
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