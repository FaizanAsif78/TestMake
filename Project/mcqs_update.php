<?php
    include ('./include/conn.php');
    $uid=$_GET['uid'];
    $gsql="SELECT * FROM `mcqs` INNER JOIN `class` ON mcqs.class_m_id=
    class.class_id INNER JOIN `books` ON mcqs.book_m_id=books.book_id INNER JOIN
     `chapter` ON mcqs.chp_m_id = chapter.chp_id WHERE mcqs.mcqs_id='$uid'"; 
    $grun=mysqli_query($conn,$gsql);
    $gfet=mysqli_fetch_array($grun);
    // $gfet['class_name']
    
    include ('./include/header.php');
    include ('./include/sidebar.php');
?>
<div class="main-content">
    <section class="section">
        <div class="section-body">
            <div class="row justify-content-center">
                <div class="col-12 col-md-6 col-lg-6">
                    <div class="card ">
                        <form id="subupdate">
                            <div class="card-header">
                                <h4>MCQS Form</h4>
                            </div>
                            <div class="card-body">
                                <input type="hidden" name="mcqs_id" value="<?php echo $gfet ['mcqs_id'] ?>" required>
                                <label for="">Class</label>
                                <select name="class_m_id" class="form-control" placeholder="Select Category" disabled>
                                    <option value="<?php echo $gfet ['class_m_id']?>"><?php echo $gfet ['class_name']?></option>
                                </select>
                                <div class="form-group">
                                    <label>Book Name</label>
                                    <input type="text" name="book_m_id" value="<?php echo $gfet ['book_name']?>" 
                                    class="form-control" required disabled>
                                </div>
                                <div class="form-group">
                                    <label>Chapter Name</label>
                                    <input type="text" name="chp_m_id" value="<?php echo $gfet ['chp_name']?>" 
                                    class="form-control" required disabled>
                                </div>
                                <div class="form-group">
                                    <label>Mcqs Question English</label>
                                    <input type="text" name="mcqs_ques_eng" value="<?php echo $gfet ['mcqs_ques_eng']?>" 
                                    class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label>Mcqs Question Urdu</label>
                                    <input type="text" name="mcqs_ques_urdu" value="<?php echo $gfet ['mcqs_ques_urdu']?>" 
                                    class="form-control" required>
                                </div>
                                <div class="form-group mb-0">
                                    <div class="row">
                                        <div class="col-lg-3 mt-3">
                                            <label>Option "A"</label>
                                            <input class="form-control" id="srprice" name="opt_A_eng" value="<?php echo $gfet 
                                            ['opt_A_eng']?>" required=""><span id="errorsrpr"></span>
                                        </div>
                                        <div class="col-lg-3 mt-3">
                                            <label>Option "B"</label>
                                            <input class="form-control" id="srprice" name="opt_B_eng" value="<?php echo $gfet 
                                            ['opt_B_eng']?>" required=""><span id="errorsrpr"></span>
                                        </div>
                                        <div class="col-lg-3 mt-3">
                                            <label>Option "C"</label>
                                            <input class="form-control" id="srprice" name="opt_C_eng" value="<?php echo $gfet 
                                            ['opt_C_eng']?>" required=""><span id="errorsrpr"></span>
                                        </div>
                                        <div class="col-lg-3 mt-3">
                                            <label>Option "D"</label>
                                            <input class="form-control" id="srprice" name="opt_D_eng" value="<?php echo $gfet 
                                            ['opt_D_eng']?>" required=""><span id="errorsrpr"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group mb-0">
                                    <div class="row">
                                        <div class="col-lg-3 mt-3">
                                            <label>Option "A"</label>
                                            <input class="form-control" id="srprice" name="opt_A_urdu" value="<?php echo $gfet 
                                            ['opt_A_urdu']?>" required=""><span id="errorsrpr"></span>
                                        </div>
                                        <div class="col-lg-3 mt-3">
                                            <label>Option "B"</label>
                                            <input class="form-control" id="srprice" name="opt_B_urdu" value="<?php echo $gfet 
                                            ['opt_B_urdu']?>" required=""><span id="errorsrpr"></span>
                                        </div>
                                        <div class="col-lg-3 mt-3">
                                            <label>Option "C"</label>
                                            <input class="form-control" id="srprice" name="opt_C_urdu" value="<?php echo $gfet 
                                            ['opt_C_urdu']?>" required=""><span id="errorsrpr"></span>
                                        </div>
                                        <div class="col-lg-3 mt-3">
                                            <label>Option "D"</label>
                                            <input class="form-control" id="srprice" name="opt_D_urdu" value="<?php echo $gfet 
                                            ['opt_D_urdu']?>" required=""><span id="errorsrpr"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Correct Answer</label>
                                    <input type="text" name="mcqs_correct_ans" value="<?php echo $gfet ['mcqs_correct_ans']?>" 
                                    class="form-control" required>
                                </div>
                                <!-- <div class="form-group">
                                    <label>Email</label>
                                    <input type="text" name="user_email" value="<?php echo $gfet ['user_email']?>" 
                                    class="form-control" required>
                                </div> -->
                            </div>
                            <div class="card-footer text-right">
                                <input class="btn" id="btn" style=" background-color:#6f42c1; color:white;" type="submit"
                                    name="update" value="Update"/>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

</div>
<?php
    include ('./include/footer.php');
?>

<!-- <script>
    $(document).ready(function(){
        $('#btn').on("clink",function(e){
            alert ("res");
            e.preventDefault();

        });
    });
</script> -->

<script>
$(document).ready(function() {
    $("#btn").on("click", function(e) {
        // alert("run");
        e.preventDefault();
        var mydata = new FormData(subupdate);
        $.ajax({
            url: "./files/mcqs_update_ajax.php",
            method: "POST",
            data: mydata,
            contentType: false,
            processData: false,
            success: function(res) {
                alert(res);
                if (res == 1) {
                    const Toast = Swal.mixin({
                        toast: true,
                        position: 'top-end',
                        showConfirmButton: false,
                        timer: 1500,
                        timerProgressBar: true,
                        didOpen: (toast) => {
                            toast.addEventListener('mouseenter', Swal.stopTimer)
                            toast.addEventListener('mouseleave', Swal
                                .resumeTimer)
                        }
                    })

                    Toast.fire({
                        icon: 'success',
                        title: 'MCQS Has Been Updated successfully'
                    })
                    //  alert('Sub Category HAS BEEN UPDATED');
                    window.location.href="./viewMCQS.php";
                } else {
                    alert('MCQS HAS NOT BEEN Updated');
                }
            }
        });
    });
});
</script>