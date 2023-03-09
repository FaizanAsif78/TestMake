<?php
include("./Project/include/conn.php");

 $SQQuestionQty=$_POST['SQquestionqty'];
 $_SESSION['SQquestionqty']=$SQQuestionQty;
 $SQEachQuestionMark=$_POST['SQquetionmark'];
 $_SESSION['SQeachquetionmark']=$SQEachQuestionMark;
 $SQquetionAttemp=$_POST['SQquetionAttemp'];
 $_SESSION['SQquetionAttemp']=$SQquetionAttemp;

if ($SQQuestionQty==null || $SQEachQuestionMark==null || $SQquetionAttemp==null) {
    echo 0;
}else {
    echo 1;
}


?>
