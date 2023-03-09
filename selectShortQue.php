<?php
include("./Project/include/conn.php");


$SQQuestionQty = $_SESSION['SQquestionqty'];
$SQEachQuestionMark = $_SESSION['SQeachquetionmark'];
$userEmail = $_SESSION['user_email'];
 $book_id = $_SESSION['book_id'];
 $SQ_id = $_POST['SQ_id'];
$_SESSION['mcqs_id']= $SQ_id;


$SQcountQuery = "SELECT * FROM `short_ques` WHERE book_s_id='$book_id' AND SQadd_status=1";
$run_query = mysqli_query($conn, $SQcountQuery);

 $mcqaddnumber = mysqli_num_rows($run_query);

if ($mcqaddnumber >= $SQQuestionQty) {
    echo 1000;
} else {
    $newcheck = "SELECT * FROM `short_ques` WHERE short_ques_id='$SQ_id'";
    $fet_run = mysqli_query($conn, $newcheck);
    $fetss = mysqli_fetch_assoc($fet_run);
    $SQ_status = $fetss['SQadd_status'];

    if ($SQ_status == 0) {
        $SQ_update = "UPDATE `short_ques` SET `user_email`='$userEmail',`SQadd_status`='1' WHERE short_ques_id='$SQ_id' ";
        $update_query = mysqli_query($conn, $SQ_update);
        if ($update_query) {
            echo 2000;
        }
    } elseif ($SQ_status == 1) {
        $SQ_update1 = "UPDATE `short_ques` SET `user_email`='0',`SQadd_status`='0' WHERE short_ques_id='$SQ_id'";
        $update_query2 = mysqli_query($conn, $SQ_update1);
        if ($update_query2) {
            echo 3000;
        }
    }
}
?>
