<?php
include("./Project/include/conn.php");

// echo "1";
 $LQQuestionQty=$_POST['LQquestionqty'];
 $_SESSION['LQquestionqty']=$LQQuestionQty;
 $LQEachQuestionMark=$_POST['LQquetionmark'];
 $_SESSION['LQeachquetionmark']=$LQEachQuestionMark;
 $LQquestionattemp=$_POST['LQquetionAttemp'];
 $_SESSION['LQquetionAttemp']=$LQquestionattemp;

if ($LQQuestionQty==null || $LQEachQuestionMark==null || $LQquestionattemp==null) {
    echo 0;
}else {
    echo 1;
}


?>
