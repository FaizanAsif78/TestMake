<?php
    include ("./Project/include/conn.php");
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

    <title>Document</title>
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
                <h1 class="mainhead">Our dashboard</h1>
                <div class="row">
                    <div class="col-lg-4 main1">
                        <a href="./classes.php">
                            <div class="box1">

                                <h1>Gernate paper</h1>
                                <h3>Total Paper Generated</h3>
                                <h5>50</h5>
                                <button class="btn btn-md btn-secondary ">Gernate</button>

                            </div>
                        </a>
                    </div>
                    <div class="col-lg-4 main1">
                        <a href="./paperPage.php">
                            <div class="box1">

                                <h1>Saved Paper</h1>
                                <h3>Total Saved Paper</h3>
                                <h5>50</h5>
                                <button class="btn btn-md btn-secondary ">Get Paper</button>

                            </div>
                        </a>
                    </div>
                    <!-- <div class="col-lg-4 main1">
                        <a href="#">
                            <div class="box1">

                                <h1>Teacher</h1>
                                <h3>Total Teacher</h3>
                                <h5>50</h5>
                                <button class="btn btn-md btn-secondary">Check</button>
                            </div>
                        </a>
                    </div> -->
                </div>
                <!-- <div class="row">
                    <div class="col-lg-4 main1">
                        <a href="#">
                            <div class="box1">

                                <h1>Paper History</h1>
                                <h3>Total Paper Created</h3>
                                <h5>50</h5>
                                <button class="btn btn-md btn-secondary ">Check History</button>

                            </div>
                        </a>
                    </div>
                    <div class="col-lg-4 main1">
                        <a href="#">
                            <div class="box1">

                                <h1>Past Paper</h1>
                                <h3>Punjab Boards</h3>
                                <h5>All Subject</h5>
                                <button class="btn btn-md btn-secondary">Check</button>

                            </div>
                        </a>
                    </div>
                    <div class="col-lg-4 main1">
                        <a href="#">
                            <div class="box1">

                                <h1>Logins</h1>
                                <h3>Login History</h3>
                                <h5>50</h5>
                                <button class="btn btn-md btn-secondary ">Check</button>
                            </div>
                        </a>
                    </div>
                </div> -->
            </div>

        </div>
        <!-- main Section End -->
    </div>


    <!-- Boostrap JS File -->
    <script src="./assets/Bootstrap/bootstrap.min.js"></script>
        <script src="./assets/Bootstrap/popper.min.js"></script>

</body>

</html>