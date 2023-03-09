<?php
include("./Project/include/conn.php");

$user_email=$_SESSION['user_email'];
$canclepaper="DELETE FROM `temp_store` WHERE user_email='$user_email'";
$cancel_query=mysqli_query($conn,$canclepaper);
if ($cancel_query) {
    echo 'Delete';
}

?>