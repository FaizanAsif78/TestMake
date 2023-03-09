<?php
    include('../include/conn.php');
        $class_s_id=mysqli_real_escape_string($conn,$_POST['class_s_id']);
        $book_s_id=mysqli_real_escape_string($conn,$_POST['book_s_id']);
        $chp_s_id=mysqli_real_escape_string($conn,$_POST['chp_s_id']);
        $short_ques_eng=mysqli_real_escape_string($conn,$_POST['short_ques_eng']);
        $short_ques_urdu=mysqli_real_escape_string($conn,$_POST['short_ques_urdu']);
        // $short_ques_status=mysqli_real_escape_string($conn,$_POST['short_ques_status']);
        $short_ques_date=date("y-m-d");
    
        $sql="INSERT INTO `short_ques`(`class_s_id`, `book_s_id`, `chp_s_id`, `short_ques_eng`, 
        `short_ques_urdu`, `short_ques_date`) VALUES 
        ('$class_s_id','$book_s_id','$chp_s_id','$short_ques_eng','$short_ques_urdu','$short_ques_date')";
        $run=mysqli_query($conn,$sql);
        if($run){
            // echo "<script>alert('Supplier HAS BEEN INSERTED')</script>";
            echo 1;
        }else{
            // echo "<script>alert('Supplier HAS NOT BEEN INSERTED')</script>";
            echo 2;
        }
?>