<?php
        include('../include/conn.php');
            $class_id=mysqli_real_escape_string($conn,$_POST['class_id']);
            $book_name=mysqli_real_escape_string($conn,$_POST['book_name']);
            // $book_pic=mysqli_real_escape_string($conn,$_POST['book_pic']);
            $bdate=date("y-m-d");
            // $sql="SELECT * FROM `books` WHERE `book_name`='$book_name'";
            // $srun=mysqli_query($conn,$sql);
            // if(mysqli_num_rows($srun)>0){
            // // echo "<script>alert('Category already exists')</script>";
            // echo 0;
            // }else{
                $spic=$_FILES['book_pic']['name'];
               move_uploaded_file($_FILES['book_pic']['tmp_name'],"../book_imgs/".$spic);

               $sql="INSERT INTO  `books`(`class_id`,`book_name`,`book_pic`,`bdate`) 
               VALUES ('$class_id','$book_name','$spic','$bdate')";
               $run=mysqli_query($conn,$sql);
               if($run){
                   echo 1;
                   // echo "<script>alert('Sub Category HAS BEEN INSERTED')</script>";
               }else{
                   echo 2;
                   // echo "<script>alert('Sub Category HAS NOT BEEN INSERTED')</script>";
               }
           
        
?>