<?php
include("./Project/include/conn.php");
$userEmail = $_SESSION['user_email'];
$mcqs_query="UPDATE `mcqs` SET `user_email`='0',`add_status`='0' WHERE user_email='$userEmail'";
$mcqs_queryRun=mysqli_query($conn,$mcqs_query);
if ($mcqs_queryRun) {
    $shortQue_query="UPDATE `short_ques` SET `user_email`='0',`SQadd_status`='0' WHERE  user_email='$userEmail'";
    $shortQue_queryRun=mysqli_query($conn,$shortQue_query);
    if ($shortQue_queryRun) {
        $longQue_query="UPDATE `longquestion` SET `user_email`='0',`LQadd_status`='0' WHERE  user_email='$userEmail'";
        $longQue_queryRun=mysqli_query($conn,$longQue_query);
        if ($longQue_queryRun) {
            echo 1000;
        }
    }
}


?>