<?php 
    include('./include/conn.php');
        $id=$_GET['myid'];
        $sql="DELETE FROM `category` WHERE `cid`=$id";
        $run=mysqli_query($conn,$sql);
  if($run){
      echo "<script>alert('CATEGORY HAS BEEN DELETED')</script>";
      header('Refresh:0,url=./viewcategory.php');
      // header('Location:./record.php');
    }
?>