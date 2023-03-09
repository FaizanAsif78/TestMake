<?php
 include("./Project/include/conn.php");
$delete_id = $_POST['delete_id'];
$paper_del="DELETE FROM `savedpaper` WHERE paper_id='$delete_id'";
$paper_run=mysqli_query($conn,$paper_del);
if ($paper_run) {
    $temp_del="DELETE FROM `temp_store` WHERE Savedpaper_id='$delete_id'";
    $temp_run=mysqli_query($conn,$temp_del);
    if ($temp_run) {
        echo 1000;
    }else{
        echo 'not work';
    }
}

?>