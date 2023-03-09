<?php
     include('../include/conn.php');
     $uid=mysqli_real_escape_string($conn,$_POST['admin_id']);
     $email=mysqli_real_escape_string($conn,$_POST['email']);
     $password=mysqli_real_escape_string($conn,$_POST['password']);
     $name=mysqli_real_escape_string($conn,$_POST['name']);
    $cpassword=mysqli_real_escape_string($conn,$_POST['cpassword']);
    $role=mysqli_real_escape_string($conn,$_POST['role']);
    
   $sql="UPDATE `admin` SET `admin_id`='$uid',`email`='$email',`password`='$password',`name`='$name',`cpassword`='$cpassword',`role`='$role' WHERE `admin_id`='$uid'";
    $run=mysqli_query($conn,$sql);
    if($run){
    //    echo "<script>alert('DATA HAS BEEN Updated')</script>";
    //    header("Refresh:1,url=./viewcategory.php");
    echo 1;
    }else{
    //    echo "<script>alert('DATA HAS NOT BEEN Updated')</script>";
    echo 2;
    }
 
?>