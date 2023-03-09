<?php
include("./Project/include/conn.php");

if (isset($_GET['book_id'])) {
    $bookid = $_GET['book_id'];
    $_SESSION['book_id'] = $bookid;
    $classid = $_SESSION['class_id'];
}
if (isset($_POST['submit'])) {
  @$getchp=$_POST['chapters'];
  $_SESSION['chapter_array']=$getchp;
  header("location:./papergerpage.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <!-- Boostrap Css File -->
    <link rel="stylesheet" href="./assets/Bootstrap/bootstrap.min.css">

    <!-- <link rel="stylesheet" href="./Bootstrap Files/bootstrap.min.js"> -->
    <link rel="stylesheet" href="./css & java/aos.css">

    <!-- Css File link -->

    <link rel="stylesheet" href="./style.css" media="all">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Favicon -->
  <link href="assets/img/fa.png" rel="icon">

    <title>Chapter</title>
</head>

<body>

    <div class="container-fluid">
        <!-- Navbar Start -->
        <?php
            require_once('./navbar.php')
        ?>
        <!-- Navbar End -->

        <!-- main Section Start -->

        <div class="main">
            <div class="container">

                    <?php
                    
                    
                    $get_name=" SELECT * FROM `books` WHERE book_id='$bookid'";
                    $boo_query=mysqli_query($conn,$get_name);
                    $fetbook=mysqli_fetch_assoc($boo_query);
                    ?>
                <h1 class="mainhead"><?php echo $fetbook['book_name'] ?> Chapters</h1>
                <form method="post">
                <div class="row">

                        <?php

                        $chap_query = "SELECT * FROM `chapter` WHERE book_id='$bookid' AND class_id='$classid'";
                        $Chapter_run = mysqli_query($conn, $chap_query);

                        while ($chpfet = mysqli_fetch_assoc($Chapter_run)) {
                        ?>
                            <div class="col-lg-6 main1">
                                <div class="box3" style="background-color: rgb(234, 234, 234); padding:30px 20px; border-radius:10px;">
                                    <input type="checkbox"  name="chapters[]" value="<?php echo $chpfet['chp_id'] ?>">
                                    <br>
                                    <h6 style="margin: 10px 0px;"><?php echo  $chpfet['chp_num'] ?> </h6>
                                    <br>
                                    <h6>Chapter Name : <?php echo $chpfet['chp_name'] ?></h6>

                                </div>
                            </div>

                        <?php
                        }
                        ?>
                    <button class="btn btn-info" name="submit">Select The Chapters</button>
                    
                </div>
            </form>

            </div>
            <!-- main Section End -->
        </div>


        <!-- Boostrap JS File -->
        <script src="./assets/Bootstrap/bootstrap.min.js"></script>
        <script src="./assets/Bootstrap/popper.min.js"></script>

</body>

</html>