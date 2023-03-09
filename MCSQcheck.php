<?php
include("./Project/include/conn.php");

 $QuestionQty=$_POST['MCQquestionqty'];
 $_SESSION['questionQty']=$QuestionQty;
 $EachQuestionMark=$_POST['MCQquetionmark'];
 $_SESSION['eachquestionmark']=$EachQuestionMark;
 $attempquestion=$_POST['MCQquetionAtemp'];
 $_SESSION['MCQquetionAtemp']=$attempquestion;

if ($QuestionQty==null || $EachQuestionMark==null || $attempquestion==null) {
    echo 0;
}else {
    echo 1;
}


?>
