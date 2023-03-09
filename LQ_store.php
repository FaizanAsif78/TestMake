<?php
include("./Project/include/conn.php");

// echo "store";
// $LQQuestionQty = $_SESSION['LQquestionqty'];
$LQEachQuestionMark = $_SESSION['LQeachquetionmark'];
//  $SQquestionno = $_SESSION['SQquestionno'];
// // $mcqs_id=$_SESSION['mcqs_id']; 
$book_id=$_SESSION['book_id'];
$userEmail = $_SESSION['user_email'];

// //  $time=time();
 $Ldate=date('d-m-y');

    $LQ_count="SELECT * FROM `longquestion` WHERE book_l_id='$book_id' AND LQadd_status=1";
    $LQ_run=mysqli_query($conn,$LQ_count);
    // mysqli_fetch_assoc($LQ_run);

   
    //  mysqli_num_rows($SQ_run);
  if (mysqli_num_rows($LQ_run) ==0) {
    echo 1000;
  }else{
    $LQ_idss=[];
    while ($fets=mysqli_fetch_assoc($LQ_run)) {
        $LQ_idss[]=$fets['longQues_id'];
    }
   $LQ_idss=json_encode($LQ_idss);

//    Temporialy store queruy
   $temp_store_query="INSERT INTO `temp_store`( `status_store`, `date`, `user_email`, `questionAttemp`, `each_que_mark`, `MCQS_SQ_LQ`) 
   VALUES ('LQ','$Ldate','$userEmail','1','$LQEachQuestionMark','$LQ_idss')";
   $temprun=mysqli_query($conn,$temp_store_query);
   if ($temprun) {
    $mcq_update="UPDATE `longquestion` SET `user_email`='0',`LQadd_status`='0' WHERE book_l_id='$book_id' AND LQadd_status=1";
    $mcqupRun=mysqli_query($conn,$mcq_update);
    if ($mcqupRun) {
        echo 2000;
    }else{
        echo 'no';
    }
   }
  }
?>
