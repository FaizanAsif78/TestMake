<?php
    include('./include/conn.php');
    include('./include/header.php');
    include('./include/sidebar.php');
?>

<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-body">
            <div class="row justify-content-center">
                <div class="col-12 col-md-6 col-lg-6">
                    <a href="viewMCQS.php"><button type="btn" class="btn btn-primary mb-5" style="margin-left:82%;">
                            View Mcqs</button></a>
                    <div class="card ">
                        <form id="mymcqs">
                            <div class="card-header">
                                <h4>MCQS</h4>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Class</label>
                                    <select name="class" id="category" class="form-control">
                                        <option>Select Class</option>
                                        <?php
                                        $sql = "SELECT * FROM `class`";
                                        $run = mysqli_query($conn, $sql);
                                        while ($fet = mysqli_fetch_array($run)) {
                                            
                                        ?>
                                            <option value="<?php echo $fet['class_id']; ?>"><?php echo $fet['class_name']; ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Book</label>
                                    <select name="book" id="Books" class="form-control">
                                        <option selected>Select Book</option>

                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Chapter</label>
                                    <select name="chapter" id="Chapter" class="form-control">
                                        <option selected>Select Chapter</option>

                                    </select>
                                </div>


                                <div class="form-group mb-0">
                                    <label>MCQS question English</label>
                                    <input class="form-control" id="code" name="mcqs_ques_eng" required="">
                                    <span id="errorcode"></span>
                                </div>
                                
                                <div class="form-group mb-0">
                                    <div class="row">
                                        <div class="col-lg-3 mt-3">
                                            <label>Option "A"</label>
                                            <input class="form-control" id="srprice" name="opt_A_eng" required="">
                                            <span id="errorsrpr"></span>
                                        </div>
                                        <div class="col-lg-3 mt-3">
                                            <label>Option "B"</label>
                                            <input class="form-control" id="srprice" name="opt_B_eng" required="">
                                            <span id="errorsrpr"></span>
                                        </div>
                                        <div class="col-lg-3 mt-3">
                                            <label>Option "C"</label>
                                            <input class="form-control" id="srprice" name="opt_C_eng" required="">
                                            <span id="errorsrpr"></span>
                                        </div>
                                        <div class="col-lg-3 mt-3">
                                            <label>Option "D"</label>
                                            <input class="form-control" id="srprice" name="opt_D_eng" required="">
                                            <span id="errorsrpr"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group mb-0">
                                    <label>MCQS question Urdu</label>
                                    <input class="form-control" id="proname" name="mcqs_ques_urdu" required="">
                                    <span id="errorproname"></span>
                                </div>
                                <div class="form-group mb-0">
                                    <div class="row">
                                        <div class="col-lg-3 mt-3">
                                            <label>"جواب "اے</label>
                                            <input class="form-control" id="srprice" name="opt_A_urdu" required="">
                                            <span id="errorsrpr"></span>
                                        </div>
                                        <div class="col-lg-3 mt-3">
                                            <label>"جواب "با</label>
                                            <input class="form-control" id="srprice" name="opt_B_urdu" required="">
                                            <span id="errorsrpr"></span>
                                        </div>
                                        <div class="col-lg-3 mt-3">
                                            <label>"جواب ""سی</label>
                                            <input class="form-control" id="srprice" name="opt_C_urdu" required="">
                                            <span id="errorsrpr"></span>
                                        </div>
                                        <div class="col-lg-3 mt-3">
                                            <label>"جواب "ڈی</label>
                                            <input class="form-control" id="srprice" name="opt_D_urdu" required="">
                                            <span id="errorsrpr"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group mb-0">
                                    <label>Correct Answer</label>
                                    <input class="form-control" id="proname" name="mcqs_correct_ans" required="">
                                    <span id="errorproname"></span>
                                </div>
                                
                            </div>
                            <div class="card-footer text-right">
                                <input class="btn btn-primary" type="submit" name="sub" id="btn" value="Submit" />
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

</div>

<?php
    include('./include/footer.php');
?>

<script>

        // Get Class and return Books start

    function localdata(classes) {
        $.ajax({
            url: "./files/classRelateBook.php",
            method: "POST",
            data: {
                id: classes
            },
            success: function(data) {

                // alert(data);
                $("#Books").html(data);
            }
        });
    }
    $("#category").on("change", function() {
        var classes = $("#category").val();
        localdata(classes);
    })
    // Get Class and return Books end
    // Get book and return chapter start

    function bookdata(books) {
        $.ajax({
            url: "./files/bookRelateChp.php",
            method: "POST",
            data: {
                id: books
            },
            success: function(data) {

                // alert(data);
                $("#Chapter").html(data);
            }
        });
    }
    $("#Books").on("change", function() {
        var Books = $("#Books").val();
        // alert(Books);
        bookdata(Books);
    })

    // Get book and return chapter end
    $(document).ready(function() {
        $("#btn").on("click", function(e) {
            // alert ("res");
            e.preventDefault();
            var mydata = new FormData(mymcqs);
            $.ajax({
                url: "./files/mcqs_insert.php",
                method: "POST",
                data: mydata,
                contentType: false,
                processData: false,
                success: function(res) {

                    // alert(res);
                   if (res == 1) {
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
                            icon: 'success',
                            title: 'MCQS Has Been Inserted successfully'
                        })
                        // alert('Product HAS BEEN INSERTED');
                        $('#mymcqs').trigger('reset');
                    } else{
                        alert('MCQS HAS BEEN NOT INSERTED');
                    }
                }
            });
        });
    });
</script>


<!--================== form validation ==================-->

<script>
    var tr = document.getElementById("code");
    tr.addEventListener("input", (e) => {
        var code = e.target.value;
        if (!code.match(/^[0-9]*$/)) {
            document.getElementById("errorcode").innerHTML = "Just Only Number.";
        } else {
            document.getElementById("errorcode").innerHTML = "";
        }
    })

    var tr = document.getElementById("proname");
    tr.addEventListener("input", (e) => {
        var proname = e.target.value;
        if (!proname.match(/^[A-Za-z ]*$/)) {
            document.getElementById("errorproname").innerHTML = "Name must only Contain letters.";
        } else {
            document.getElementById("errorproname").innerHTML = "";
        }
    })

    var tr = document.getElementById("des");
    tr.addEventListener("input", (e) => {
        var des = e.target.value;
        if (!des.match(/^[A-Za-z ]*$/)) {
            document.getElementById("errordes").innerHTML = "Name must only Contain letters.";
        } else {
            document.getElementById("errordes").innerHTML = "";
        }
    })

    var tr = document.getElementById("srprice");
    tr.addEventListener("input", (e) => {
        var srprice = e.target.value;
        if (!srprice.match(/^[0-9]*$/)) {
            document.getElementById("errorsrpr").innerHTML = "Just Only Number.";
        } else {
            document.getElementById("errorsrpr").innerHTML = "";
        }
    })

    var tr = document.getElementById("uprice");
    tr.addEventListener("input", (e) => {
        var uprice = e.target.value;
        if (!uprice.match(/^[0-9]*$/)) {
            document.getElementById("erroruprice").innerHTML = "Just Only Number.";
        } else {
            document.getElementById("erroruprice").innerHTML = "";
        }
    })

    var tr = document.getElementById("stock");
    tr.addEventListener("input", (e) => {
        var stock = e.target.value;
        if (!stock.match(/^[0-9]*$/)) {
            document.getElementById("errorstock").innerHTML = "Just Only Number.";
        } else {
            document.getElementById("errorstock").innerHTML = "";
        }
    })
</script>