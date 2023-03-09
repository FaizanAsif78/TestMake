<?php
include('../include/conn.php');

 $class_id=$_POST['class'];
 $book_id=$_POST['book'];
 $chapter_id=$_POST['chapter'];
 $long_ques_eng=$_POST['long_ques_eng'];
 $long_ques_urdu=$_POST['long_ques_urdu'];
 $ldate=date('y-m-d');

 $longQuestion_query="INSERT INTO `longquestion`( `book_l_id`, `class_l_id`, `chapter_l_id`, `longQuestion_eng`, `longQuestion_urdu`, `ldate`) 
 VALUES ('$book_id','$class_id','$chapter_id','$long_ques_eng','$long_ques_urdu','$ldate')";

 $run_query=mysqli_query($conn,$longQuestion_query);
 if($run_query){
    echo 1;
 }else{
    echo 2;
 }


?>
