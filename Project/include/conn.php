<?php
@session_start();
$conn=mysqli_connect("localhost","root","","sawal_nama");
if($conn){
//    echo "connected";
}else{
    echo "not connected";
}

?>