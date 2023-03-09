<?php
    include('../include/conn.php');
       $book_id=mysqli_real_escape_string($conn,$_POST['book_id']);
       $class_id=mysqli_real_escape_string($conn,$_POST['class_id']);
       $chp_name=mysqli_real_escape_string($conn,$_POST['chp_name']);
       $chp_num=mysqli_real_escape_string($conn,$_POST['chp_num']);
        $chp_date=date("y-m-d");
    
        $sql="INSERT INTO `chapter`(`book_id`, `class_id`, `chp_name`, `chp_num`, `chp_date`) 
        VALUES ('$book_id','$class_id','$chp_name','$chp_num','$chp_date')";
        $run=mysqli_query($conn,$sql);
        if($run){
            // echo "<script>alert('Supplier HAS BEEN INSERTED')</script>";
            echo 1;
        }else{
            // echo "<script>alert('Supplier HAS NOT BEEN INSERTED')</script>";
            echo 2;
        }
?>