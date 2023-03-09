
<?php
    include ('../include/conn.php');
         $uid=mysqli_real_escape_string($conn,$_POST['longQues_id']);
         $longQuestion_eng=mysqli_real_escape_string($conn,$_POST['longQuestion_eng']);
         $longQuestion_urdu=mysqli_real_escape_string($conn,$_POST['longQuestion_urdu']);
         // $supemail=mysqli_real_escape_string($conn,$_POST['supemail']);
         // $supcontact=mysqli_real_escape_string($conn,$_POST['supcontact']);
         $ldate=date("Y-m-d");
     
        $sql="UPDATE `longquestion` SET `longQuestion_eng`='$longQuestion_eng',
        `longQuestion_urdu`='$longQuestion_urdu' WHERE `longQues_id`='$uid'";
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