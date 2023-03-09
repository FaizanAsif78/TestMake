<?php
include("./Project/include/conn.php");
$book_id_pic = $_SESSION['book_id'];

$book_pic_get = "SELECT * FROM `books` WHERE  book_id='$book_id_pic'";
$book_pic_get = mysqli_query($conn, $book_pic_get);
$book_pic_getFet = mysqli_fetch_assoc($book_pic_get);



?>

<!DOCTYPE html>
<html lang="en">

<head>

    <!-- Boostrap Css File -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

    <!-- Css File link -->
    <link rel="stylesheet" href="./style.css">
    <!-- Jquery CDN -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js" integrity="sha512-STof4xm1wgkfm7heWqFJVn58Hm3EtS31XFaagaa8VMReCXAkQnJZ+jEy8PCC/iT18dFy95WcExNHFTqLyp72eQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>


    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Favicon -->
    <link href="assets/img/fa.png" rel="icon">

    <title>Document</title>

    <!-- sweet alert script tag -->
    <link href="https://cdn.jsdelivr.net/npm/@sweetalert2/theme-dark@4/dark.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"></script>

</head>

<body>

    <div class="container-fluid">
        <!-- Navbar Start -->
        <?php
        require_once('./navbar.php')
        ?>
        <!-- Navbar End -->

        <!-- Button Sectsions -->
        <div class="allbuttons">
            <div class="row">
                <div class="col-lg-3 allbutton">
                    <div class="dropdown">
                        <button class="btn dropbtn dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                            Select Question Type
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                            <li>
                                <div class="col-lg-3  col-md-3 col-sm-3   btn  quesbtn" data-bs-toggle="modal" data-bs-target="#MCQ">
                                    <a href="#">MCQS</a>
                                </div>
                            </li>
                            <li>
                                <div class="col-lg-3  col-md-3 col-sm-3  btn  quesbtn" data-bs-toggle="modal" data-bs-target="#Shortquestion">
                                    <a href="#">Short Question</a>
                                </div>
                            </li>
                            <li>
                                <div class="col-lg-3  col-md-3 col-sm-3  btn  quesbtn" data-bs-toggle="modal" data-bs-target="#Longquestion">
                                    <a href="#">Long Question</a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3  col-md-3 col-sm-3 allbutton">
                    <a href="#" class="">Print Paper </a>
                </div>
                <div class="col-lg-3  col-md-3 col-sm-3 allbutton" data-bs-toggle="modal" data-bs-target="#savedpaper">
                    <a href="#" class="">Save Paper</a>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-3  allbutton" id="cancelppr">
                    <a href="#" class="">Cancel Paper</a>
                </div>
            </div>
        </div>

        <!-- main Section Start -->
        <div class="container top-con">



            <div class="mainTable2 mt-5">
                <div class="d-flex contentset2 ">
                    <div class=" papername">

                        <div class="mydivs">

                            <h4>student name : <span></span></h4>
                        </div>
                        <div class="mydivs">

                            <h4>Roll # : <span></span></h4>
                        </div>
                        <div class="mydivs">

                            <h4>Paper time : <span></span></h4>
                        </div>

                    </div>

                    <div class=" papername">
                        <h4>class : <span></span></h4>
                        <h4>subject : <span></span></h4>
                        <h4>total marks : <span></span></h4>

                    </div>
                </div>
            </div>

            <div class="row datatable">
                <table class="table displaytable table-hover table-borderless">

                    <!-------------------------------- Display The MCQS CODE -------------------------------->

                    <?php

                    $users_email = $_SESSION['user_email'];
                    $gets_MCQS = "SELECT * FROM `temp_store` WHERE status_store='MCQS' AND user_email ='$users_email'";
                    $getMCQS_Query = mysqli_query($conn, $gets_MCQS);

                    // $MQCN = 1;
                    $is = 1;
                    if (mysqli_num_rows($getMCQS_Query) == 0) {
                        # code...
                    } else {

                    ?>
                        <tr>
                            <th colspan="12"> <span>Q#1 :</span> Choose The Correct Awanser .</th>
                        </tr>

                        <?php
                        $mcqs_fet = mysqli_fetch_assoc($getMCQS_Query);
                        $mcqsfetID = @json_decode($mcqs_fet['MCQS_SQ_LQ']);
                        foreach ($mcqsfetID as  $MCQSval) {
                            $MCQSmulti = "SELECT * FROM `temp_store` INNER JOIN `mcqs` WHERE mcqs.mcqs_id=$MCQSval AND temp_store.status_store='MCQS'";
                            $multi_MQCS_run = mysqli_query($conn, $MCQSmulti);
                            $mcqsnewfet = mysqli_fetch_assoc($multi_MQCS_run);
                        ?>
                            <tr>
                                <td colspan="4">
                                    <h6> <span>(<?php echo $is ?>)</span> :<?php echo $mcqsnewfet['mcqs_ques_eng'] ?></h6>
                                </td>
                                <td colspan="4" class="text-end urdufont">
                                    <h6><?php echo $mcqsnewfet['mcqs_ques_urdu'] ?></h6>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2">(a) <?php echo $mcqsnewfet['opt_A_eng'] ?></td>
                                <td colspan="2">(b) <?php echo $mcqsnewfet['opt_B_eng'] ?></td>
                                <td colspan="2">(c) <?php echo $mcqsnewfet['opt_C_eng'] ?></td>
                                <td colspan="2">(d) <?php echo $mcqsnewfet['opt_D_eng'] ?></td>

                            </tr>
                    <?php
                            $is++;
                        }
                    }
                    ?>

                    <!-------------------------- Short Question Display CODE -------------------------->

                    <div class="tableboderless">


                        <?php
                        $gets_SQ = "SELECT * FROM `temp_store` WHERE status_store='SQ' AND user_email ='$users_email'";
                        $getSQ_Query = mysqli_query($conn, $gets_SQ);

                        mysqli_num_rows($getSQ_Query);
                        $SQQ = 2;
                        while ($SQ_fet = mysqli_fetch_assoc($getSQ_Query)) {
                            $SQfetID = @json_decode($SQ_fet['MCQS_SQ_LQ']);
                            // print_r($SQfetID)

                        ?>

                            <tr>
                                <th colspan="12"> <span> Q#<?php echo $SQQ ?> :</span> Attemp Any Four Shorts Question .</th>
                            </tr>

                            <?php
                            $SQN = 1;
                            foreach ($SQfetID as  $SQSval) {
                                $SQmulti = "SELECT * FROM `temp_store` INNER JOIN `short_ques` WHERE short_ques.short_ques_id=$SQSval AND temp_store.status_store='SQ'";
                                $multi_SQ_run = mysqli_query($conn, $SQmulti);
                                $SQnewfet = mysqli_fetch_assoc($multi_SQ_run);

                            ?>

                                <tr>
                                    <td colspan="4">
                                        <h6> <span>(<?php echo $SQN ?>)</span> :<?php echo $SQnewfet['short_ques_eng'] ?></h6>
                                    </td>
                                    <td colspan="4" class="text-end urdufont">
                                        <h6><?php echo $SQnewfet['short_ques_urdu'] ?></h6>
                                    </td>
                                </tr>
                                <tr>
                                <?php
                                $SQN++;
                            }
                                ?>

                            <?php
                            $SQQ++;
                        }
                            ?>


                            <!----------------------------- Display Long Question CODE ----------------------------->

                            <?php
                            $gets_lQ = "SELECT * FROM `temp_store` WHERE status_store='LQ' AND user_email ='$users_email'";
                            $getlQ_Query = mysqli_query($conn, $gets_lQ);


                            if (mysqli_num_rows($getlQ_Query) == 0) {
                            } else {

                                $LQQ = $SQQ;
                                while ($LQ_fet = mysqli_fetch_assoc($getlQ_Query)) {
                                    $LQfetID = @json_decode($LQ_fet['MCQS_SQ_LQ']);
                                    // print_r($LQfetID)

                            ?>

                                <tr>
                                    <th colspan="12"> <span> Q#<?php echo $LQQ ?> :</span> Attemp Any Four Long Question Question .</th>
                                </tr>

                                <?php
                                    $LQN = 1;
                                    foreach ($LQfetID as  $LQSval) {
                                        $LQmulti = "SELECT * FROM `temp_store` INNER JOIN `longquestion` WHERE longquestion.longQues_id=$LQSval AND temp_store.status_store='LQ'";
                                        $multi_LQ_run = mysqli_query($conn, $LQmulti);
                                        $SLnewfet = mysqli_fetch_assoc($multi_LQ_run);

                                ?>

                                    <tr>
                                        <td colspan="4">
                                            <h6> <span>(<?php echo $LQN ?>)</span> :<?php echo $SLnewfet['longQuestion_eng'] ?></h6>
                                        </td>
                                        <td colspan="4" class="text-end urdufont">
                                            <h6><?php echo $SLnewfet['longQuestion_urdu'] ?></h6>
                                        </td>
                                    </tr>
                                    <tr>
                                    <?php
                                        $LQN++;
                                    }
                                    ?>

                            <?php
                                    $LQQ++;
                                }
                            }
                            ?>
                    </div>
                </table>
            </div>
        </div>
        <!-- Large modal -->

        <!--MCQS MODEL  Modal -->
        <div class="modal fade" id="MCQ" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="MCQLabel" aria-hidden="true">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="MCQLabel">Select MCQS </h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" id="MCQSclose" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">

                        <!-- Unit Section  -->
                        <div class="row">
                            <div class="col-lg-9 unitsect">
                                <div class="row">

                                    <?php

                                    $chapters_get = $_SESSION['chapter_array'];
                                    $class_id = $_SESSION['class_id'];
                                    $book_id = $_SESSION['book_id'];
                                    foreach ($chapters_get as $key => $chapter) {

                                        $querys = "SELECT * FROM `chapter` WHERE  chp_id='$chapter'";
                                        $run_query = mysqli_query($conn, $querys);
                                        $chp_fet = mysqli_fetch_assoc($run_query);
                                    ?>
                                        <div class="col-lg-5  " id="chpstyle">
                                            <h6><?php echo $chp_fet['chp_num'] ?> : <span><?php echo $chp_fet['chp_name'] ?></span></h6>
                                        </div>
                                    <?php
                                    }
                                    ?>


                                </div>
                            </div>
                            <div class="col-lg-2 bookimg">
                                <img src="./Project/book_imgs/<?php echo $book_pic_getFet['book_pic']; ?>" alt="">
                            </div>
                        </div>

                        <!-- Form section -->

                        <form id="MCQSforms">
                            <div class="row ourform">
                                <div class="col-lg-3">
                                    <label for="">Required Question</label>
                                    <input type="number" class="form-control" name="MCQquestionqty" placeholder="How many Question" id="inputCity">
                                </div>
                                <br>
                                <div class="col-lg-3">
                                    <label for="">Each Question Marks</label>
                                    <input type="number" class="form-control" name="MCQquetionmark" placeholder="Each Marks" id="inputCity">
                                </div>
                                <div class="col-lg-3">
                                    <label for="">Attemp Questions</label>
                                    <input type="number" class="form-control" name="MCQquetionAtemp" placeholder="Attemp No" id="inputCity">
                                </div>
                                <br>
                                <div class="col-lg-12">
                                    <button class="btn btn-primary" id="MCQSsearch">Show MCQS</button>
                                </div>
                                <br>

                            </div>
                        </form>

                        <!-- Mcqs Shows -->
                        <div class="mcqsTabel d-none" id="mcqs_table">
                            <table class="table" id="mcqtable">
                                <?php
                                $get_chapters = $_SESSION['chapter_array'];
                                $MCQN = 1;
                                foreach ($get_chapters as $key => $Chapters) {

                                    $mcqs_query = "SELECT * FROM `mcqs` WHERE chp_m_id='$Chapters'";
                                    $run_query = mysqli_query($conn, $mcqs_query);
                                    while ($fetmcqs = mysqli_fetch_assoc($run_query)) {
                                ?>
                                        <tbody>

                                            <?php

                                            if ($fetmcqs['add_status'] == 1) {
                                            ?>

                                                <tr class='smcq' style="background-color:#99ff99; cursor: pointer;">
                                                    <td colspan='4'>
                                                        <input type='hidden' value='<?php echo $fetmcqs['mcqs_id'] ?>' id='mcqs_id'>

                                                        <h6> <span>(<?php echo $MCQN ?>)</span> : <?php echo $fetmcqs['mcqs_ques_eng'] ?></h6>
                                                    </td>
                                                    <td colspan='4' class='text-end'>
                                                        <h6> <?php echo $fetmcqs['mcqs_ques_urdu'] ?></h6>
                                                    </td>
                                                </tr>

                                            <?php
                                            } elseif ($fetmcqs['add_status'] == 0) {
                                            ?>

                                                <tr class='smcq' style="background-color:white; cursor: pointer;">
                                                    <td colspan='4'>
                                                        <input type='hidden' value='<?php echo $fetmcqs['mcqs_id'] ?>' id='mcqs_id'>

                                                        <h6> <span>(<?php echo $MCQN ?>)</span> : <?php echo $fetmcqs['mcqs_ques_eng'] ?></h6>
                                                    </td>
                                                    <td colspan='4' class='text-end'>
                                                        <h6> <?php echo $fetmcqs['mcqs_ques_urdu'] ?></h6>
                                                    </td>
                                                </tr>
                                            <?php
                                            }
                                            ?>

                                            <tr>
                                                <td colspan='2'>(a) <?php echo $fetmcqs['opt_A_eng'] ?> </td>
                                                <td colspan='2'>(b) <?php echo $fetmcqs['opt_B_eng'] ?> </td>
                                                <td colspan='2'>(c) <?php echo $fetmcqs['opt_C_eng'] ?> </td>
                                                <td colspan='2'>(d) <?php echo $fetmcqs['opt_D_eng'] ?> </td>
                                            </tr>
                                        </tbody>
                                <?php
                                        $MCQN++;
                                    }
                                }

                                ?>
                            </table>
                        </div>



                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" id='save_mcs'>Save MCQS</button>
                    </div>
                </div>
            </div>

        </div>
        <!--SHORT question MODEL  Modal -->
        <div class="modal fade" id="Shortquestion" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="ShortquestionLabel" aria-hidden="true">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="ShortquestionLabel">Select Short Questions</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="SQclose"></button>
                    </div>
                    <div class="modal-body">

                        <!-- Unit Section  -->
                        <div class="row">
                            <div class="col-lg-9 unitsect">
                                <div class="row">

                                    <?php

                                    $chapters_get = $_SESSION['chapter_array'];
                                    foreach ($chapters_get as $key => $chapter) {

                                        $querys = "SELECT * FROM `chapter` WHERE chp_id='$chapter'";
                                        $run_query = mysqli_query($conn, $querys);
                                        $chp_fet = mysqli_fetch_assoc($run_query);
                                    ?>
                                        <div class="col-lg-5" id="chpstyle">
                                            <h6><?php echo $chp_fet['chp_num'] ?> : <span><?php echo $chp_fet['chp_name'] ?></span></h6>
                                        </div>
                                    <?php
                                    }
                                    ?>


                                </div>
                            </div>
                            <div class="col-lg-2 bookimg">
                                <img src="./Project/book_imgs/<?php echo $book_pic_getFet['book_pic']; ?>" alt="">
                            </div>
                        </div>

                        <!-- Form section -->

                        <form id="SQforms">
                            <div class="row ourform">
                                <div class="col-lg-3">
                                    <label for="">Required Question</label>
                                    <input type="number" class="form-control" name=" SQquestionqty" placeholder="How many Question" id="inputCity">
                                </div>
                                <br>
                                <div class="col-lg-3">
                                    <label for="">Each Question Marks</label>
                                    <input type="number" class="form-control" name="SQquetionmark" placeholder="Each Marks" id="inputCity">
                                </div>
                                <div class="col-lg-3">
                                    <label for="">Attemp Questions</label>
                                    <input type="number" class="form-control" name="SQquetionAttemp" placeholder="Question Attemp" id="inputCity">

                                </div>
                                <br>
                                <div class="col-lg-12">
                                    <button class="btn btn-primary" id="SQsearch">Show Short Question</button>
                                </div>
                                <br>

                            </div>
                        </form>

                        <!--  Short question -->
                        <div class="d-none" id="SQtabs">


                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link active" id="excerquestion-tab" data-bs-toggle="tab" data-bs-target="#excerquestion" type="button" role="tab" aria-controls="excerquestion" aria-selected="true">Excersice Question</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="pastpaper-tab" data-bs-toggle="tab" data-bs-target="#pastpaper" type="button" role="tab" aria-controls="pastpaper" aria-selected="false">Pastpaper</button>
                                </li>
                            </ul>
                            <!-- Excersise Question Modal And tab  End-->

                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade show active" id="excerquestion" role="tabpanel" aria-labelledby="excerquestion-tab">
                                    <div class="MCQSTabel">

                                        <table class="table" id="mcqtable">
                                            <?php
                                            $get_chapters = $_SESSION['chapter_array'];
                                            $SQNN = 1;

                                            foreach ($get_chapters as $key => $Chapters) {

                                                $SQ_query = "SELECT * FROM `short_ques` WHERE chp_s_id='$Chapters'";
                                                $run_query = mysqli_query($conn, $SQ_query);
                                                while ($fetSQ = mysqli_fetch_assoc($run_query)) {
                                            ?>
                                                    <tbody>

                                                        <?php

                                                        if ($fetSQ['SQadd_status'] == 1) {
                                                        ?>

                                                            <tr class='shortSQ' style="background-color:#99ff99; cursor: pointer;">
                                                                <td colspan='4'>
                                                                    <input type='hidden' value='<?php echo $fetSQ['short_ques_id'] ?>' id='SQ_id'>

                                                                    <h6> <span>(<?php echo $SQNN ?>)</span> : <?php echo $fetSQ['short_ques_eng'] ?></h6>
                                                                </td>
                                                                <td colspan='4' class='text-end'>
                                                                    <h6> <?php echo $fetSQ['short_ques_urdu'] ?></h6>
                                                                </td>
                                                            </tr>

                                                        <?php
                                                        } elseif ($fetSQ['SQadd_status'] == 0) {
                                                        ?>

                                                            <tr class='shortSQ' style="background-color:white; cursor: pointer;">
                                                                <td colspan='4'>
                                                                    <input type='hidden' value='<?php echo $fetSQ['short_ques_id'] ?>' id='SQ_id'>

                                                                    <h6> <span>(<?php echo $SQNN ?>)</span> : <?php echo $fetSQ['short_ques_eng'] ?></h6>
                                                                </td>
                                                                <td colspan='4' class='text-end'>
                                                                    <h6> <?php echo $fetSQ['short_ques_urdu'] ?></h6>
                                                                </td>
                                                            </tr>
                                                        <?php
                                                        }
                                                        ?>
                                                    </tbody>
                                            <?php
                                                    $SQNN++;
                                                }
                                            }

                                            ?>
                                        </table>

                                    </div>
                                </div>


                                <!-- Past Paper Modal And tab  start-->

                                <div class="tab-pane fade" id="pastpaper" role="tabpanel" aria-labelledby="pastpaper-tab">Past Paper
                                    <div class="mcqsTabel">
                                        <table class="table" id="mcqtable">
                                            <tbody>
                                                <tr>
                                                    <td colspan='4' class='smcq'>
                                                        <input type='checkbox' value='$MCQ_id' id='mcqs_id'>
                                                        <span>($key)</span>
                                                        <h6> $engquestion</h6>
                                                    </td>
                                                    <td colspan='4' class='text-end'>
                                                        <h6> $urduquestion</h6>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td colspan='2'>(a) $opt_A_eng </td>
                                                    <td colspan='2'>(b) $opt_B_eng </td>
                                                    <td colspan='2'>(c) $opt_C_eng </td>
                                                    <td colspan='2'>(d) $opt_D_eng </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <!-- Past Paper Modal And tab  End-->

                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">

                        <button type="button" class="btn btn-primary" id="SQ_save">Save</button>
                    </div>
                </div>
            </div>

        </div>

        <!-- LONG Question Model modal -->
        <div class="modal fade" id="Longquestion" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="LongquestionLabel" aria-hidden="true">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="LongquestionLabel">Select Long Questions</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" id="LQ_Close" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">

                        <!-- Unit Section  -->
                        <div class="row">
                            <div class="col-lg-9 unitsect">
                                <div class="row">

                                    <?php

                                    $chapters_get = $_SESSION['chapter_array'];
                                    foreach ($chapters_get as $key => $chapter) {

                                        $querys = "SELECT * FROM `chapter` WHERE chp_id='$chapter'";
                                        $run_query = mysqli_query($conn, $querys);
                                        $chp_fet = mysqli_fetch_assoc($run_query);
                                    ?>
                                        <div class="col-lg-5" id="chpstyle">
                                            <h6><?php echo $chp_fet['chp_num'] ?> : <span><?php echo $chp_fet['chp_name'] ?></span></h6>
                                        </div>
                                    <?php
                                    }
                                    ?>


                                </div>
                            </div>
                            <div class="col-lg-2 bookimg">
                                <img src="./Project/book_imgs/<?php echo $book_pic_getFet['book_pic']; ?>" alt="">
                            </div>
                        </div>

                        <!-- Form section -->

                        <form id="LQforms">
                            <div class="row ourform">
                                <div class="col-lg-3">
                                    <label for="">Required Question</label>
                                    <input type="number" class="form-control" name=" LQquestionqty" placeholder="How many Question" id="inputCity">
                                </div>
                                <br>
                                <div class="col-lg-3">
                                    <label for="">Each Question Marks</label>
                                    <input type="number" class="form-control" name="LQquetionmark" placeholder="Each Marks" id="inputCity">
                                </div>
                                <div class="col-lg-3">
                                    <label for="">Attemp Questions</label>
                                    <input type="number" class="form-control" name="LQquetionAttemp" placeholder="Each Marks" id="inputCity">
                                </div>
                                <br>
                                <div class="col-lg-12">
                                    <button class="btn btn-primary" id="LQsearch">Show Long Question</button>
                                </div>
                                <br>

                            </div>
                        </form>

                        <!-- Long Question Shows -->
                        <div class="d-none mt-5" id="LQtabs">


                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link active" id="excerquestion2-tab" data-bs-toggle="tab" data-bs-target="#excerquestion2" type="button" role="tab" aria-controls="excerquestion2" aria-selected="true">Excersice Question</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="pastpaper2-tab" data-bs-toggle="tab" data-bs-target="#pastpaper2" type="button" role="tab" aria-controls="pastpaper2" aria-selected="false">Pastpaper2</button>
                                </li>
                            </ul>
                            <!-- Excersise Question Modal And tab  End-->

                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade show active" id="excerquestion2" role="tabpanel" aria-labelledby="excerquestion2-tab">
                                    <div class="MCQSTabel">

                                        <table class="table">
                                            <?php
                                            $get_chapters = $_SESSION['chapter_array'];

                                            $LQNS = 1;
                                            foreach ($get_chapters as $key => $Chapters) {

                                                $LQ_query = "SELECT * FROM `longquestion` WHERE chapter_l_id='$Chapters'";
                                                $run_query1 = mysqli_query($conn, $LQ_query);
                                                while ($fetLQ = mysqli_fetch_assoc($run_query1)) {



                                            ?>
                                                    <tbody>

                                                        <?php

                                                        if ($fetLQ['LQadd_status'] == 1) {
                                                        ?>

                                                            <tr class='longLQ' style="background-color:#99ff99; cursor: pointer;">
                                                                <td colspan='4'>
                                                                    <input type='hidden' value='<?php echo $fetLQ['longQues_id'] ?>' id='LQ_id'>

                                                                    <h6> <span>(<?php echo $i ?>)</span> : <?php echo $fetLQ['longQuestion_eng'] ?></h6>
                                                                </td>
                                                                <td colspan='4' class='text-end'>
                                                                    <h6> <?php echo $fetLQ['longQuestion_urdu'] ?></h6>
                                                                </td>
                                                            </tr>

                                                        <?php
                                                        } elseif ($fetLQ['LQadd_status'] == 0) {
                                                        ?>

                                                            <tr class='longLQ' style="background-color:white; cursor: pointer;">
                                                                <td colspan='4'>
                                                                    <input type='hidden' value='<?php echo $fetLQ['longQues_id'] ?>' id='LQ_id'>

                                                                    <h6> <span>(<?php echo $LQNS ?>)</span> : <?php echo $fetLQ['longQuestion_eng'] ?></h6>
                                                                </td>
                                                                <td colspan='4' class='text-end'>
                                                                    <h6> <?php echo $fetLQ['longQuestion_urdu'] ?></h6>
                                                                </td>
                                                            </tr>
                                                        <?php
                                                            $LQNS++;
                                                        }
                                                        ?>
                                                    </tbody>
                                            <?php

                                                }
                                            }

                                            ?>
                                        </table>

                                    </div>
                                </div>


                                <!-- Past Paper Modal And tab  start-->

                                <div class="tab-pane fade" id="pastpaper2" role="tabpanel" aria-labelledby="pastpaper2-tab">Past Paper
                                    <div class="mcqsTabel">
                                        <table class="table" id="mcqtable">
                                            <tbody>
                                                <tr>
                                                    <td colspan='4' class='smcq'>
                                                        <input type='checkbox' value='$MCQ_id' id='mcqs_id'>
                                                        <span>($key)</span>
                                                        <h6> $engquestion</h6>
                                                    </td>
                                                    <td colspan='4' class='text-end'>
                                                        <h6> $urduquestion</h6>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td colspan='2'>(a) $opt_A_eng </td>
                                                    <td colspan='2'>(b) $opt_B_eng </td>
                                                    <td colspan='2'>(c) $opt_C_eng </td>
                                                    <td colspan='2'>(d) $opt_D_eng </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <!-- Past Paper Modal And tab  End-->

                            </div>
                        </div>



                    </div>
                    <div class="modal-footer">
                        <button type="button" id="LQ_save" class="btn btn-primary">Save Long Question</button>
                    </div>
                </div>
            </div>

        </div>


        <!-- Save Paper Model  -->
        <!-- Modal -->
        <div class="modal fade " id="savedpaper" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="savedpaperLabel" aria-hidden="true">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="savedpaperLabel">Saved Paper</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form class="row g-3" id="fullSavedPaper" enctype="multipart/form-data">
                            <div class="col-md-6">
                                <label for="inputEmail4" class="form-label">Paper Name *</label>
                                <input type="text" class="form-control" name="papername" id="inputEmail4" placeholder="Enter Paper name" required>
                            </div>

                            <div class="col-6">
                                <label for="inputAddress" class="form-label">Total Marks *</label>
                                <input type="number" class="form-control" name="totalmarks" id="inputAddress" placeholder="Total marks" required>
                            </div>
                            <div class="col-6">
                                <label for="inputAddress2" class="form-label">Time *</label>
                                <input type="text" class="form-control" name="time" id="inputAddress2" placeholder="Total Time" required>
                            </div>
                            <div class="col-6">
                                <label for="inputAddress2" class="form-label">Academy / School Name</label>
                                <input type="text" class="form-control" name="acsname" id="inputAddress2" placeholder="Enter Acadeny & School name">
                            </div>
                            <div class="col-12">
                                <label for="inputAddress2" class="form-label">Address</label>
                                <input type="text" class="form-control" name="address" id="inputAddress2" placeholder="Enter School Address">
                            </div>
                            <div class="col-12">
                                <button type="submit" id="savePaper" class="btn btn-primary">Saved Paper</button>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>

        <!-- main Section End -->
    </div>


    <!-- Boostrap JS File -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js" integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous"></script>


    <!-- Jquery CND -->






    <!-- Mcqs Work with Ajax  Start---
----------------------- -->


    <script>
        $('#MCQSsearch').on('click', function(e) {
            e.preventDefault();
            let formsdata = new FormData(MCQSforms);
            // alert(formsdata);
            $.ajax({
                url: "./MCSQcheck.php",
                method: "POST",
                data: formsdata,
                contentType: false,
                processData: false,
                success: function(res) {
                    // alert(res)
                    if (res == 1) {
                        $('#mcqs_table').removeClass('d-none');
                        $('#mcqs_table').addClass('d-block');
                    } else if (res == 0) {
                        const Toast = Swal.mixin({
                            toast: true,
                            position: 'top-end',
                            showConfirmButton: false,
                            timer: 2000,
                            timerProgressBar: true,
                            didOpen: (toast) => {
                                toast.addEventListener('mouseenter', Swal.stopTimer)
                                toast.addEventListener('mouseleave', Swal
                                    .resumeTimer)
                            }
                        })
                        Toast.fire({
                            icon: 'error',
                            title: 'Fill Out All Field'
                        })
                    }


                }
            });
        })
    </script>

    <script>
        $('.smcq').on('click', function() {
            let datas = $(this).closest('tr');

            let mcqs_id = datas.find('#mcqs_id').val()
            let data = {
                mcqs_id: mcqs_id
            }
            // alert(data);

            $.ajax({
                type: "POST",
                url: "./selectMCQS.php",
                data: data,
                success: function(res) {
                    // console.log(res);
                    if (res == 2000) {
                        datas.css('background-color', '#99ff99')
                    } else if (res == 1000) {
                        const Toast = Swal.mixin({
                            toast: true,
                            position: 'top-end',
                            showConfirmButton: false,
                            timer: 2000,
                            timerProgressBar: true,
                            didOpen: (toast) => {
                                toast.addEventListener('mouseenter', Swal.stopTimer)
                                toast.addEventListener('mouseleave', Swal
                                    .resumeTimer)
                            }
                        })
                        Toast.fire({
                            icon: 'error',
                            title: 'Selected the Limited MCQS'
                        })
                    } else if (res == 3000) {
                        datas.css('background-color', 'white')
                    }

                }
            });
        })

        // Save Question Query 

        $('#save_mcs').on('click', function() {

            $.ajax({
                type: "POST",
                url: "./mcqs_store.php",
                data: "data",
                success: function(response) {
                    // alert(response)
                    // console.log(response);
                    if (response == '1000') {
                        const Toast = Swal.mixin({
                            toast: true,
                            position: 'top-end',
                            showConfirmButton: false,
                            timer: 2000,
                            timerProgressBar: true,
                            didOpen: (toast) => {
                                toast.addEventListener('mouseenter', Swal.stopTimer)
                                toast.addEventListener('mouseleave', Swal
                                    .resumeTimer)
                            }
                        })

                        Toast.fire({
                            icon: 'error',
                            title: 'Kindly Selected the MCQS'
                        })
                    } else if (response == 2000) {
                        location.reload();
                    }
                }
            });
            // alert('fghjkl');
        })
    </script>

    <!-- MCQS Model Close -->

    <script>
        $('#MCQSclose').on('click', function() {

            $.ajax({
                type: "post",
                url: "./modalclose.php",
                data: "data",
                success: function(response) {
                    if (response == 1000) {
                        // alert('response');
                        $('.smcq').css('background-color', 'white');
                    }
                }
            });
        })
    </script>

    <!-- Mcqs Work with Ajax  End---
----------------------- -->



    <!-- short question Work with Ajax  Start---
----------------------- -->

    <!-- fill all field script -->

    <script>
        $('#SQsearch').on('click', function(e) {
            e.preventDefault();
            let SQformsdata = new FormData(SQforms);
            $.ajax({
                url: "./SQcheck.php",
                method: "POST",
                data: SQformsdata,
                contentType: false,
                processData: false,
                success: function(res) {
                    // alert(res)
                    if (res == 1) {
                        $('#SQtabs').removeClass('d-none');
                        $('#SQtabs').addClass('d-block');
                    } else if (res == 0) {
                        const Toast = Swal.mixin({
                            toast: true,
                            position: 'top-end',
                            showConfirmButton: false,
                            timer: 2000,
                            timerProgressBar: true,
                            didOpen: (toast) => {
                                toast.addEventListener('mouseenter', Swal.stopTimer)
                                toast.addEventListener('mouseleave', Swal
                                    .resumeTimer)
                            }
                        })
                        Toast.fire({
                            icon: 'error',
                            title: 'Fill out all the field'
                        })
                    }


                }
            });
        })
    </script>

    <!-- Short Question ID Get script -->

    <script>
        $('.shortSQ').on('click', function() {
            let datas = $(this).closest('tr');
            let SQ_id = datas.find('#SQ_id').val()

            let data = {
                SQ_id: SQ_id
            }

            $.ajax({
                type: "POST",
                url: "./selectShortQue.php",
                data: data,
                success: function(res) {
                    if (res == 2000) {
                        datas.css('background-color', '#99ff99')
                    } else if (res == 1000) {
                        const Toast = Swal.mixin({
                            toast: true,
                            position: 'top-end',
                            showConfirmButton: false,
                            timer: 2000,
                            timerProgressBar: true,
                            didOpen: (toast) => {
                                toast.addEventListener('mouseenter', Swal.stopTimer)
                                toast.addEventListener('mouseleave', Swal
                                    .resumeTimer)
                            }
                        })
                        Toast.fire({
                            icon: 'error',
                            title: 'Selected the Limited Short question'
                        })
                    } else if (res == 3000) {
                        datas.css('background-color', 'white')
                    }

                }
            });
        })
    </script>

    <!-- Short Question Save  Script -->
    <script>
        $('#SQ_save').on('click', function() {
            $.ajax({
                type: "POST",
                url: "./SQ_store.php",
                data: "data",
                success: function(response) {
                    // console.log(response);
                    if (response == '1000') {
                        const Toast = Swal.mixin({
                            toast: true,
                            position: 'top-end',
                            showConfirmButton: false,
                            timer: 2000,
                            timerProgressBar: true,
                            didOpen: (toast) => {
                                toast.addEventListener('mouseenter', Swal.stopTimer)
                                toast.addEventListener('mouseleave', Swal
                                    .resumeTimer)
                            }
                        })
                        Toast.fire({
                            icon: 'error',
                            title: 'Kindly Selected the Short Question'
                        })
                    } else if (response == 2000) {
                        location.reload();
                    }
                }
            });
            // alert('fghjkl');
        })
    </script>

    <!-- Short Question Model Close -->
    <script>
        $('#SQclose').on('click', function() {

            $.ajax({
                type: "post",
                url: "./modalclose.php",
                data: "data",
                success: function(response) {
                    if (response == 1000) {
                        // alert('response');
                        $('.shortSQ').css('background-color', 'white');
                    }
                }
            });
        })
    </script>

    <!-- short question with Ajax  End---
----------------------- -->




    <!-- Long question with Ajax  Start---
----------------------- -->
    <!-- fill all field script -->

    <script>
        $('#LQsearch').on('click', function(e) {
            e.preventDefault();
            let LQformsdata = new FormData(LQforms);
            // alert(formsdata);
            $.ajax({
                url: "./LQcheck.php",
                method: "POST",
                data: LQformsdata,
                contentType: false,
                processData: false,
                success: function(res) {
                    // alert(res)
                    if (res == 1) {
                        $('#LQtabs').removeClass('d-none');
                        $('#LQtabs').addClass('d-block');
                    } else if (res == 0) {
                        const Toast = Swal.mixin({
                            toast: true,
                            position: 'top-end',
                            showConfirmButton: false,
                            timer: 2000,
                            timerProgressBar: true,
                            didOpen: (toast) => {
                                toast.addEventListener('mouseenter', Swal.stopTimer)
                                toast.addEventListener('mouseleave', Swal
                                    .resumeTimer)
                            }
                        })
                        Toast.fire({
                            icon: 'error',
                            title: 'Fill Out All Field'
                        })
                    }


                }
            });
        })
    </script>
    <!-- Long Question ID Get script -->

    <script>
        $('.longLQ').on('click', function() {
            let datasLQ = $(this).closest('tr');
            let LQ_id = datasLQ.find('#LQ_id').val()
            let dataLQ = {
                LQ_id: LQ_id
            }
            $.ajax({
                type: "POST",
                url: "./selectLongQue.php",
                data: dataLQ,
                success: function(res) {
                    // alert(res);
                    if (res == 2000) {
                        datasLQ.css('background-color', '#99ff99')
                    } else if (res == 1000) {
                        const Toast = Swal.mixin({
                            toast: true,
                            position: 'top-end',
                            showConfirmButton: false,
                            timer: 5000,
                            timerProgressBar: true,
                            didOpen: (toast) => {
                                toast.addEventListener('mouseenter', Swal.stopTimer)
                                toast.addEventListener('mouseleave', Swal
                                    .resumeTimer)
                            }
                        })

                        Toast.fire({
                            icon: 'error',
                            title: 'Selected Limited Short Question'
                        })
                    } else if (res == 3000) {
                        datasLQ.css('background-color', 'white')
                    }

                }
            });
        })
    </script>


    <!-- Long Question Save  Script -->
    <script>
        $('#LQ_save').on('click', function() {
            // alert("fghjkl;")
            $.ajax({
                type: "POST",
                url: "./LQ_store.php",
                data: "data",
                success: function(response) {
                    // alert(response)
                    // console.log(response);
                    if (response == '1000') {
                        console.log(1000);
                        const Toast = Swal.mixin({
                            toast: true,
                            position: 'top-end',
                            showConfirmButton: false,
                            timer: 2000,
                            timerProgressBar: true,
                            didOpen: (toast) => {
                                toast.addEventListener('mouseenter', Swal.stopTimer)
                                toast.addEventListener('mouseleave', Swal
                                    .resumeTimer)
                            }
                        })
                        Toast.fire({
                            icon: 'error',
                            title: 'Kindly Selected the Long Question'
                        })
                    } else if (response == 2000) {
                        location.reload();
                    }
                }
            });
            // alert('fghjkl');
        })
    </script>

    <!-- Long Question Model Close -->
    <script>
        $('#LQ_Close').on('click', function() {

            $.ajax({
                type: "post",
                url: "./modalclose.php",
                data: "data",
                success: function(response) {
                    if (response == 1000) {
                        // alert('response');
                        $('.longLQ').css('background-color', 'white');
                    }
                }
            });
        })
    </script>
    <!-- Long question with Ajax  End---
----------------------- -->
    <!-- Paper Save with Ajax  start---
----------------------- -->


    <script>
        $('#savePaper').on('click', function(ev) {
            ev.preventDefault();
            let getSavePaper = new FormData(fullSavedPaper)
            $.ajax({
                url: "./papersaved.php",
                method: "POST",
                data: getSavePaper,
                contentType: false,
                processData: false,
                success: function(res) {
                    // alert(res)
                    if (res == 3000) {
                        window.location.href = './paperPage.php';
                    } else if (res == 1000) {
                        const Toast = Swal.mixin({
                            toast: true,
                            position: 'top-end',
                            showConfirmButton: false,
                            timer: 2000,
                            timerProgressBar: true,
                            didOpen: (toast) => {
                                toast.addEventListener('mouseenter', Swal.stopTimer)
                                toast.addEventListener('mouseleave', Swal
                                    .resumeTimer)
                            }
                        })
                        Toast.fire({
                            icon: 'error',
                            title: 'Create Atleast 1 Question'
                        })
                    }



                }
            });

        })
    </script>


    <!-- savePaper with Ajax  End---
----------------------- -->
    <!-- CancelPaper with Ajax  start---
----------------------- -->
    <script>
        $('#cancelppr').on('click', function() {
            // alert("tfgyuhjik")

            Swal.fire({
                title: 'Are you sure to Cancel the paper?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        type: "post",
                        url: "./cancelpaper.php",
                        data: "data",
                        success: function(response) {
                            location.reload();
                        }
                    });
                    Swal.fire(
                        'Your Paper has been cancel!',
                        'Your Paper has been cancel.',
                        'success'
                    )
                }
            })
        })
    </script>

    <script>
        // if (location.reload()) {
        //         alert('okokok')
        // }
    </script>
    <!-- CancelPaper with Ajax  End---
----------------------- -->
</body>


</html>