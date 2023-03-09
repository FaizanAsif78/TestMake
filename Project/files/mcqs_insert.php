<?php
include('../include/conn.php');


 $class_id=$_POST['class'];
 $book_id=$_POST['book'];
 $chapter_id=$_POST['chapter'];
 $mcqs_ques_eng=$_POST['mcqs_ques_eng'];
 $opt_A_eng=$_POST['opt_A_eng'];
 $opt_B_eng=$_POST['opt_B_eng'];
 $opt_C_eng=$_POST['opt_C_eng'];
 $opt_D_eng=$_POST['opt_D_eng'];
 $mcqs_ques_urdu=$_POST['mcqs_ques_urdu'];
 $opt_A_urdu=$_POST['opt_A_urdu'];
 $opt_B_urdu=$_POST['opt_B_urdu'];
 $opt_C_urdu=$_POST['opt_C_urdu'];
 $opt_D_urdu=$_POST['opt_D_urdu'];
 $mcqs_correct_ans=$_POST['mcqs_correct_ans'];
$mdate=date("y-m-d");

$mcqsInertQuery="INSERT INTO `mcqs`(`class_m_id`, `book_m_id`, `chp_m_id`, `mcqs_ques_eng`, `mcqs_ques_urdu`, 
`opt_A_eng`, `opt_B_eng`, `opt_C_eng`, `opt_D_eng`, `opt_A_urdu`, `opt_B_urdu`, `opt_C_urdu`, `opt_D_urdu`, 
`mcqs_status`, `mcqs_date`, `mcqs_correct_ans`,`user_email`)VALUES
('$class_id','$book_id','$chapter_id','$mcqs_ques_eng','$mcqs_ques_urdu','$opt_A_eng','$opt_B_eng','$opt_C_eng
','$opt_D_eng','$opt_A_urdu','$opt_B_urdu','$opt_C_urdu','$opt_D_urdu','MCQS','$mdate','$mcqs_correct_ans','0')";

$runQuery=mysqli_query($conn,$mcqsInertQuery);
if ($runQuery) {
    echo 1;
}else{
    echo 2;
}



?>