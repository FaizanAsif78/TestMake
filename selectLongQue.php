<?php
include("./Project/include/conn.php");

// echo "long";

$LQQuestionQty = $_SESSION['LQquestionqty'];
// $LQEachQuestionMark = $_SESSION['LQeachquetionmark'];
$userEmail = $_SESSION['user_email'];
 $book_id = $_SESSION['book_id'];
 $LQ_id = $_POST['LQ_id'];
$_SESSION['mcqs_id']= $LQ_id;


$LQcountQuery = "SELECT * FROM `longquestion` WHERE book_l_id='$book_id' AND LQadd_status=1";
$run_query = mysqli_query($conn, $LQcountQuery);

 $LQaddnumber = mysqli_num_rows($run_query);

if ($LQaddnumber >= $LQQuestionQty) {
    echo 1000;
} else {
    $newcheckLQ = "SELECT * FROM `longquestion` WHERE longQues_id='$LQ_id'";
    $fet_run = mysqli_query($conn, $newcheckLQ);
    $fetss = mysqli_fetch_assoc($fet_run);
    $LQ_status = $fetss['LQadd_status'];

    if ($LQ_status == 0) {
        $SQ_update = "UPDATE `longquestion` SET `user_email`='$userEmail',`LQadd_status`='1' WHERE longQues_id='$LQ_id' ";
        $update_query = mysqli_query($conn, $SQ_update);
        if ($update_query) {
            echo 2000;
        }
    } elseif ($LQ_status == 1) {
        $SQ_update1 = "UPDATE `longquestion` SET `user_email`='0',`LQadd_status`='0' WHERE longQues_id='$LQ_id'";
        $update_query2 = mysqli_query($conn, $SQ_update1);
        if ($update_query2) {
            echo 3000;
        }
    }
}
?>
