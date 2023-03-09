<?php
    include('../include/conn.php');

    // if(isset($_POST['sid'])){
        $sname=mysqli_real_escape_string($conn,$_POST['sname']);
        $sfname=mysqli_real_escape_string($conn,$_POST['sfname']);
        $scontact=mysqli_real_escape_string($conn,$_POST['scontact']);
        $saddress=mysqli_real_escape_string($conn,$_POST['saddress']);
        $saddress2=mysqli_real_escape_string($conn,$_POST['saddress2']);
        $scountry=mysqli_real_escape_string($conn,$_POST['scountry']);
        $scity=mysqli_real_escape_string($conn,$_POST['scity']);
        $postal_code=mysqli_real_escape_string($conn,$_POST['postal_code']);
        $semail=mysqli_real_escape_string($conn,$_POST['semail']);
        $spassword=mysqli_real_escape_string($conn,$_POST['spassword']);
        $sconfirm=mysqli_real_escape_string($conn,$_POST['sconfirm']);
        $sdate=date("y-m-d");
        
        if($sname=="" || $sfname=="" || $scontact=="" || $saddress=="" || $saddress2=="" || $scountry=="" || $scity=="" || $postal_code=="" || $semail=="" || $spassword=="" || $sconfirm==""){
            echo 0;
            // echo "Please fill out all filled";
        }
        else{
            $ssql="SELECT * FROM `signup` WHERE  `semail`='$semail'";
            $srun=mysqli_query($conn,$ssql);
            if(mysqli_num_rows($srun)>0){
                // echo "Email alredy exist";
                echo 1;
            }else{
                if($spassword == $sconfirm){
                    $sql="INSERT INTO `signup`( `sname`, `sfname`, `scontact`, `saddress`, `saddress2`, `scountry`, 
                    `scity`, `postal_code`,`semail`, `spassword`, `sconfirm`, `sdate`) VALUES ('$sname','$sfname',
                    '$scontact','$saddress','$saddress2','$scountry','$scity','$postal_code','$semail','$spassword',
                    '$sconfirm','$sdate')";
                    $run2=mysqli_query($conn,$sql);
                if($run2){
                    echo 2;
                    // echo "Data has been inserted";
                }else{
                    echo 3;
                    // echo "Data has been not inserted";
                }
            }
            else{
                echo 4;
                // echo "Password Does Not Match";
            }
        }
    }
    

?>