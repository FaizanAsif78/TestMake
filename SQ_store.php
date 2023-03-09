<?php
include("./Project/include/conn.php");


$SQQuestionQty = $_SESSION['SQquestionqty'];
$SQEachQuestionMark = $_SESSION['SQeachquetionmark'];
 $SQquestionno = $_SESSION['SQquetionAttemp'];
// $mcqs_id=$_SESSION['mcqs_id']; 
$book_id=$_SESSION['book_id'];
$userEmail = $_SESSION['user_email'];

//  $time=time();
 $Mdate=date('d-m-y');

    $SQ_count="SELECT * FROM `short_ques` WHERE book_s_id='$book_id' AND SQadd_status=1";
    $SQ_run=mysqli_query($conn,$SQ_count);
    // mysqli_fetch_assoc($SQ_run);

   
    //  mysqli_num_rows($SQ_run);
  if (mysqli_num_rows($SQ_run) ==0) {
    echo 1000;
  }else{
    $SQ_idss=[];
    while ($fets=mysqli_fetch_assoc($SQ_run)) {
        $SQ_idss[]=$fets['short_ques_id'];
    }
   $SQ_idss=json_encode($SQ_idss);

//    Temporialy store queruy
   $temp_store_query="INSERT INTO `temp_store`( `status_store`, `date`, `user_email`, `questionAttemp`, `each_que_mark`, `MCQS_SQ_LQ`) 
   VALUES ('SQ','$Mdate','$userEmail','$SQquestionno','$SQEachQuestionMark','$SQ_idss')";
   $temprun=mysqli_query($conn,$temp_store_query);
   if ($temprun) {
    $mcq_update="UPDATE `short_ques` SET `user_email`='0',`SQadd_status`='0' WHERE book_s_id='$book_id' AND SQadd_status=1";
    $mcqupRun=mysqli_query($conn,$mcq_update);
    if ($mcqupRun) {
        echo 2000;
    }else{
        echo 'no';
    }
   }
  }
