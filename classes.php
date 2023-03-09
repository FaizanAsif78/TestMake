<?php
include("./Project/include/conn.php");
?>

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
        
        <title>Class</title>
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
                    <h1 class="mainhead">All Classes</h1>
                    <div class="row">

                        <?php

                        $get_class = "SELECT * FROM `class` WHERE 1";
                        $get_query = mysqli_query($conn, $get_class);
                        while ($fet = mysqli_fetch_assoc($get_query)) {
                        ?>
                            <div class="col-lg-3 main1">
                                <a href="./books.php?id=<?php echo $fet['class_id'] ?>">
                                    <div class="book">
                                        <div class="div1"></div>

                                        <h1><?php echo $fet['class_name'] ?></h1>

                                        <button class="btn btn-md btn-secondary">View</button>
                                        <div class="div2"></div>
                                    </div>
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
