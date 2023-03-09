<?php
include("./Project/include/conn.php");


$questionQty = $_SESSION['questionQty'];
$eachquestionmark = $_SESSION['eachquestionmark'];
$Questionattemp = $_SESSION['MCQquetionAtemp'];
$userEmail = $_SESSION['user_email'];
$mcqs_id = $_POST['mcqs_id'];
$book_id = $_SESSION['book_id'];
$_SESSION['mcqs_id']= $mcqs_id;


$mcqcountQuery = "SELECT * FROM `mcqs` WHERE book_m_id='$book_id' AND add_status=1";
$run_query = mysqli_query($conn, $mcqcountQuery);

$mcqaddnumber = mysqli_num_rows($run_query);

if ($mcqaddnumber >= $questionQty) {
    echo 1000;
} else {
    $newcheck = "SELECT * FROM `mcqs` WHERE mcqs_id='$mcqs_id'";
    $fet_run = mysqli_query($conn, $newcheck);
    $fetss = mysqli_fetch_assoc($fet_run);
    $mcqs_status = $fetss['add_status'];

    if ($mcqs_status == 0) {
        $mcqs_update = "UPDATE `mcqs` SET `user_email`='$userEmail',`add_status`='1' WHERE mcqs_id='$mcqs_id' ";
        $update_query = mysqli_query($conn, $mcqs_update);
        if ($update_query) {
            echo 2000;
        }
    } elseif ($mcqs_status == 1) {
        $mcqs_update1 = "UPDATE `mcqs` SET `user_email`='0',`add_status`='0' WHERE mcqs_id='$mcqs_id'";
        $update_query2 = mysqli_query($conn, $mcqs_update1);
        if ($update_query2) {
            echo 3000;
        }
    }
}
?>
