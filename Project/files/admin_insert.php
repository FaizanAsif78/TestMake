<?php
     include('../include/conn.php');

$name=strtolower(mysqli_real_escape_string($conn,$_POST['name']));
$email=strtolower(mysqli_real_escape_string($conn,$_POST['email']));
$password=mysqli_real_escape_string($conn,$_POST['password']);
$cpassword=mysqli_real_escape_string($conn,$_POST['cpassword']);
$role=strtolower(mysqli_real_escape_string($conn,$_POST['role']));
$sql="INSERT INTO `admin`( `name`, `email`, `password`, `cpassword`, `role`) VALUES ('$name','$email','$password','$cpassword','$role')";
 $run=mysqli_query($conn,$sql);
         if($run){
            // echo "<script>alert('DATA HAS BEEN INSERTED')</script>";
            echo 1;

         }else{
            // echo "<script>alert('DATA HAS NOT BEEN INSERTED')</script>";
            echo 2;

         }




?>