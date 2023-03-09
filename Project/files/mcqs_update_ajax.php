
<?php
    include ('../include/conn.php');
        $uid=mysqli_real_escape_string($conn,$_POST['mcqs_id']);
        $mcqs_ques_eng=mysqli_real_escape_string($conn,$_POST['mcqs_ques_eng']);
        $mcqs_ques_urdu=mysqli_real_escape_string($conn,$_POST['mcqs_ques_urdu']);
        $opt_A_eng=mysqli_real_escape_string($conn,$_POST['opt_A_eng']);
        $opt_B_eng=mysqli_real_escape_string($conn,$_POST['opt_B_eng']);
        $opt_C_eng=mysqli_real_escape_string($conn,$_POST['opt_C_eng']);
        $opt_D_eng=mysqli_real_escape_string($conn,$_POST['opt_D_eng']);
        $opt_A_urdu=mysqli_real_escape_string($conn,$_POST['opt_A_urdu']);
        $opt_B_urdu=mysqli_real_escape_string($conn,$_POST['opt_B_urdu']);
        $opt_C_urdu=mysqli_real_escape_string($conn,$_POST['opt_C_urdu']);
        $opt_D_urdu=mysqli_real_escape_string($conn,$_POST['opt_D_urdu']);
        $mcqs_correct_ans=mysqli_real_escape_string($conn,$_POST['mcqs_correct_ans']);
      //   $user_email=mysqli_real_escape_string($conn,$_POST['user_email']);
        $mcqs_date=date("Y-m-d");
     
        $sql="UPDATE `mcqs` SET `mcqs_ques_eng`='$mcqs_ques_eng',`mcqs_ques_urdu`='$mcqs_ques_urdu',`opt_A_eng`='$opt_A_eng',         
        `opt_B_eng`='$opt_B_eng',`opt_C_eng`='$opt_C_eng',`opt_D_eng`='$opt_D_eng',`opt_A_urdu`='$opt_A_urdu',
        `opt_B_urdu`='$opt_B_urdu',`opt_C_urdu`='$opt_C_urdu',`opt_D_urdu`='$opt_D_urdu',`mcqs_correct_ans`='$mcqs_correct_ans'
         WHERE mcqs_id='$uid'";
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