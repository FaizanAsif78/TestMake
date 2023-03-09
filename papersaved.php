<?php
include("./Project/include/conn.php");
// user email
$user_email = $_SESSION['user_email'];
// check the any one question is created

$check_query = "SELECT * FROM `temp_store` WHERE user_email='$user_email'";
$checkRun = mysqli_query($conn, $check_query);

if (mysqli_num_rows($checkRun) == 0) {
    echo 1000;
} else {
    $book_id = $_SESSION['book_id'];
    $getsubject = "SELECT * FROM `books` WHERE book_id= '$book_id'";
    $getsubject_run = mysqli_query($conn, $getsubject);
    $fetsubject = mysqli_fetch_assoc($getsubject_run);
    $subject =  $fetsubject['book_name'];
    // Get Class Name
    $class_id = $_SESSION['class_id'];
    $getclass = "SELECT * FROM `class` WHERE class_id= '$class_id' ";
    $getclass_run = mysqli_query($conn, $getclass);
    $fetclass = mysqli_fetch_assoc($getclass_run);
    $className =  $fetclass['class_name'];

    $paperNAme = $_POST['papername'];
    $totalMarks = $_POST['totalmarks'];
    $totalTime = $_POST['time'];
    $schoolName = $_POST['acsname'];
    // $schoollogo = $_FILES['schoollogo']['name'];
    $schooladdress = $_POST['address'];
    $savedDate=date('y-m-d');
    $saved_paperQuery = "INSERT INTO `savedpaper`(`paper_name`, `class_name`, `total_marks`, `Time`, `ASname`, `address`, `user_email`, `subject`,`saved_date`)
 VALUES ('$paperNAme','$className','$totalMarks','$totalTime','$schoolName','$schooladdress','$user_email','$subject','$savedDate')";
    $paperRunQuery = mysqli_query($conn, $saved_paperQuery);

    $paper_id = mysqli_insert_id($conn);
    if ($paperRunQuery) {
        $tempstoreupdate1 = "UPDATE `temp_store` SET `user_email`='0',`Savedpaper_id`='$paper_id' WHERE user_email='$user_email'";
        $tempstoreupdate1_run = mysqli_query($conn, $tempstoreupdate1);
        if ($tempstoreupdate1_run) {
            echo 3000;
        }
    } else {
        # code...
    }
}
