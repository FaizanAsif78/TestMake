<?php
include("./Project/include/conn.php");
$questionQty = $_SESSION['questionQty'];
$eachquestionmark = $_SESSION['eachquestionmark'];
 $Question_no = $_SESSION['MCQquetionAtemp'];
// $mcqs_id=$_SESSION['mcqs_id']; 
$book_id=$_SESSION['book_id'];
$userEmail = $_SESSION['user_email'];

//  $time=time();
 $Mdate=date('d-m-y');

    $mcq_count="SELECT * FROM `mcqs` WHERE book_m_id='$book_id' AND add_status=1";
    $mcqs_run=mysqli_query($conn,$mcq_count);
    // mysqli_fetch_assoc($mcqs_run);

   
    //  mysqli_num_rows($mcqs_run);
  if (mysqli_num_rows($mcqs_run) ==0) {
    echo 1000;
  }else{
    $mcqs_idss=[];
    while ($fets=mysqli_fetch_assoc($mcqs_run)) {
        $mcqs_idss[]=$fets['mcqs_id'];
    }
   $mcqs_idss=json_encode($mcqs_idss);

//    Temporialy store queruy
   $temp_store_query="INSERT INTO `temp_store`( `status_store`, `date`, `user_email`, `questionAttemp`, `each_que_mark`, `MCQS_SQ_LQ`) 
   VALUES ('MCQS','$Mdate','$userEmail','$Question_no','$eachquestionmark','$mcqs_idss')";
   $temprun=mysqli_query($conn,$temp_store_query);
   if ($temprun) {
    $mcq_update="UPDATE `mcqs` SET `user_email`='0',`add_status`='0' WHERE book_m_id='$book_id' AND add_status=1";
    $mcqupRun=mysqli_query($conn,$mcq_update);
    if ($mcqupRun) {
        echo 2000;
    }else{
        echo 'no';
    }
   }
  }
