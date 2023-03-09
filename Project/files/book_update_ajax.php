<?php
    include ('../include/conn.php');

        $uid=mysqli_real_escape_string($conn,$_POST['book_id']);
        // $class_name=mysqli_real_escape_string($conn,$_POST['class_name']);
        $book_name=mysqli_real_escape_string($conn,$_POST['book_name']);
        // $sdes=mysqli_real_escape_string($conn,$_POST['sdes']);
        $sdate=date("Y-m-d");

        $sql="UPDATE `books` SET `book_name`='$book_name'
        WHERE `book_id`='$uid'";
        $run=mysqli_query($conn,$sql);
        if($run){
            echo 1;
            // echo "<script>alert('Sub Category HAS BEEN UPDATED')</script>";
            // header("Refresh:0,url=./viewsubcate.php");
        }else{
            echo 2;
            // echo "<script>alert('Sub Category HAS BEEN NOT UPDATED')</script>";
        }
    
?>