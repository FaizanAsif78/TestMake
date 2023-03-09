<?php
include("./Project/include/conn.php");
?>

<body>
    <!DOCTYPE html>
    <html lang="en">

    <head>

        <!-- Boostrap Css File -->
        <link rel="stylesheet" href="./assets/Bootstrap/bootstrap.min.css">

        <!-- <link rel="stylesheet" href="./Bootstrap Files/bootstrap.min.css"> -->
        <link rel="stylesheet" href="./css & java/aos.css">

        <!-- Css File link -->
        <link rel="stylesheet" href="./style.css" media="all">


        <!-- Jquery CDN -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js" integrity="sha512-STof4xm1wgkfm7heWqFJVn58Hm3EtS31XFaagaa8VMReCXAkQnJZ+jEy8PCC/iT18dFy95WcExNHFTqLyp72eQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

        <!-- fontawsome cnd -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />

        <!-- sweet alert script tag -->
        <link href="https://cdn.jsdelivr.net/npm/@sweetalert2/theme-dark@4/dark.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"></script>

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

            <div class="mainpaper">
                <div class="row">

                    <!-- This script is get the paper  -->

                    <?php

                    $user_email = $_SESSION['user_email'];
                    $paper_query = "SELECT * FROM `savedpaper` WHERE user_email ='$user_email'";
                    $paper_run = mysqli_query($conn, $paper_query);
                    while ($paperfet = mysqli_fetch_assoc($paper_run)) {
                    ?>

                        <div class="col-lg-3 col-md-3 col-sm-12 papers">

                            <div class="subpaper">
                                <h2><?php echo $paperfet['paper_name'] ?> </h2>
                                <h3>class : <span><?php echo $paperfet['class_name'] ?></span> </h3>
                                <h3>Total Marks : <span><?php echo $paperfet['total_marks'] ?></span> </h3>
                                <h3>Date : <span><?php echo $paperfet['saved_date'] ?></span> </h3>
                                <div class="d-flex icons">
                                    <button class="btn  deleteid" value="<?php echo $paperfet['paper_id'] ?>"><i class="fa-solid fa-trash-can"></i></button>
                                    <a href="./singlepaper.php?id=<?php echo $paperfet['paper_id'] ?>"> <button class="btn"> <i class="fa-solid fa-eye"></i></button> </a>
                                </div>
                            </div>

                        </div>

                    <?php
                    }

                    ?>


                </div>


            </div>
            <!-- main Section End -->
        </div>


        <!-- Boostrap JS File -->
        <script src="./assets/Bootstrap/bootstrap.min.js"></script>
        <script src="./assets/Bootstrap/popper.min.js"></script>



        <!------------------------ delpaper script ------------------------>

        <script>
            $('.deleteid').on('click', function() {
                let delete_id = $(this).val();
                data = {
                    delete_id: delete_id
                }
                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {

                        $.ajax({
                            type: "POST",
                            url: "./deletepaper.php",
                            data: data,
                            success: function (response) {
                                    if (response==1000) {
                                        location.reload()
                                    }
                            }
                        });
                        Swal.fire(
                            'Deleted!',
                            'Your file has been deleted.',
                            'success'
                        )
                    }
                })

            })
        </script>

    </body>

    </html>