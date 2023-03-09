<?php

    include  "../include/conn.php";

    if(isset($_POST['pf_name'])){
        $pf_order=mysqli_real_escape_string($conn,$_POST['pf_order']);
        $pf_name=mysqli_real_escape_string($conn,$_POST['pf_name']);
        $pf_contact=mysqli_real_escape_string($conn,$_POST['pf_contact']);
        $pf_status = mysqli_real_escape_string($conn,$_POST['pf_status']);
        $tcash = mysqli_real_escape_string($conn,$_POST['tcash']);
        $pf_date=date("y-m-d");

        if($pf_order=="" || $pf_name=="" || $pf_contact=="" ||  $pf_status==""){
            echo 0;
            // echo "Please fill out all filled";
        }else{
                $sql="UPDATE `pos_form` SET `pf_order`='$pf_order',`pf_name`='$pf_name',`pf_contact`='$pf_contact',`tcash`='$tcash',`pf_status`='$pf_status',`pf_date`='$pf_date' WHERE `pf_order`='$pf_order'";
                $run=mysqli_query($conn,$sql);
                if($run){
                    echo 1; 
                }else{
                    echo 2;
                }
            }
        
    }

?>