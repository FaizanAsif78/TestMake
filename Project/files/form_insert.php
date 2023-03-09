<?php

    include  "../include/conn.php";

    if(isset($_POST['pf_name'])){
        
        $pf_order=mysqli_real_escape_string($conn,$_POST['pf_order']);
        $pf_name=mysqli_real_escape_string($conn,$_POST['pf_name']);
        $pf_contact=mysqli_real_escape_string($conn,$_POST['pf_contact']);
        $pf_status = mysqli_real_escape_string($conn,$_POST['pf_status']);
        $tcash = mysqli_real_escape_string($conn,$_POST['tcash']);
        $pf_date=date("y-m-d");
        // $order=rand(10000,90000);

        if($pf_order=="" || $pf_name=="" || $pf_contact=="" ||  $pf_status==""){
            echo 0;
            // echo "Please fill out all filled";
        }else{
            $isql = "SELECT * FROM `pos_form` WHERE `pf_order`='$pf_order'";
            $irun=mysqli_query($conn,$isql);
            if(mysqli_num_rows($irun)){
                echo 1;
                // echo "Order number already exist";
            }else{
                $sql="INSERT INTO `pos_form`(`pf_order`, `pf_name`, `pf_contact`,`tcash`, `pf_status`,`pf_date`) VALUES ('$pf_order','$pf_name','$pf_contact','$tcash','$pf_status','$pf_date')";
                $run=mysqli_query($conn,$sql);
                if($run){
                    $msg="right";   
                }else{
                    $msg="notright";
                }
            }
        }
    }
  
    if(@$msg=="right"){
        $osql="SELECT * FROM `pos_cart`";
        $orun=mysqli_query($conn,$osql);
        while($ofet=mysqli_fetch_array($orun)){
            $pos_code=$ofet['pos_code'];
            $pos_name=$ofet['pos_name'];
            $pos_price=$ofet['pos_price'];
            $pos_qty=$ofet['pos_qty'];
            $tprice=$ofet['tprice'];
            $pos_stock=$ofet['pos_stock'];

            $prosql="INSERT INTO `sale_cart`(`sale_code`, `sale_name`, `sale_price`, `sale_qty`, `sale_total`, `sale_stock`, `sinvoice`,`sdate`) VALUES('$pos_code','$pos_name','$pos_price','$pos_qty','$tprice','$pos_stock','$pf_order','$pf_date')";
            $prorun=mysqli_query($conn,$prosql);
            if($prorun){
                $msg1="right";
            }else{
                $msg1="not right";
            }
        }
    }

    if(@$msg1=="right"){

        $dsql="DELETE FROM `pos_cart`";
        $drun=mysqli_query($conn,$dsql);
        if($drun){
            echo 2;
        //    echo "mail send";
        }else{
            echo 3;
            // echo "mail not send";
        }
    }

?>