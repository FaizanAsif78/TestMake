<?php
    include ("./Project/include/conn.php");


    if (isset($_GET['id'])) {
      $classid=$_GET['id'];
      $_SESSION['class_id']=$classid;
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Our Books</title>
</head>
<body>
    <!DOCTYPE html>
<html lang="en">

<head>

    <!-- Boostrap Css File -->
    <link rel="stylesheet" href="./assets/Bootstrap/bootstrap.min.css">

    <link rel="stylesheet" href="./css & java/aos.css">

    <!-- Css File link -->

    <link rel="stylesheet" href="./style.css" media="all">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Favicon -->
  <link href="assets/img/fa.png" rel="icon">

    <title>Books</title>
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
        //   echo  $_SESSION['user_email'];
                $class_query="SELECT * FROM `class` WHERE class_id='$classid'";
                $run_class=mysqli_query($conn,$class_query);
                $cfet=mysqli_fetch_assoc($run_class);
            ?>
                <h1 class="mainhead"><?php echo $cfet['class_name']?></h1>
                <div class="row">

                <?php

                    
                    $get_book="SELECT * FROM `books` WHERE class_id='$classid'";
                    $get_query=mysqli_query($conn,$get_book);
                    while ($fet=mysqli_fetch_assoc($get_query)) {
                        ?>
                        <div class="col-lg-3 main1">
                        <a href="./chapter.php?book_id=<?php echo $fet['book_id']?>">
                            <img src="./Project/book_imgs/<?php echo $fet['book_pic']?>" alt="not work" width="200px" height="200px">
                        </a>
                    </div>
                        
                        <?php
                    }
                
                ?>
                    
                    
                </div>
              
            </div>

        </div>
        <!-- main Section End -->
    </div>


    <!-- Boostrap JS File -->
    <script src="./assets/Bootstrap/bootstrap.min.js"></script>
    <script src="./assets/Bootstrap/popper.min.js"></script>

</body>

</html>
</body>
</html>