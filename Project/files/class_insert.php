<?php
    include('../include/conn.php');
        $class_name=mysqli_real_escape_string($conn,$_POST['class_name']);
        $class_des=mysqli_real_escape_string($conn,$_POST['class_des']);
        $cdate=date("y-m-d");
        $ssql="SELECT * FROM `class` WHERE `class_name`='$class_name'";
        $srun=mysqli_query($conn,$ssql);
        if(mysqli_num_rows($srun)>0){
            // echo "<script>alert('DATA ALREADY EXIST')</script>";
            echo 0;
        }else{

        $sql="INSERT INTO  `class`(`class_name`,`class_des`,`cdate`) VALUES ('$class_name','$class_des','$cdate')";
        $run=mysqli_query($conn,$sql);
        if($run){
            // echo "<script>alert('Category HAS BEEN INSERTED')</script>";
            echo 1;
        }else{
            echo 2;
            // echo "<script>alert('Category HAS NOT BEEN INSERTED')</script>";
        }
    }
?>