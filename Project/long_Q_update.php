<?php
    include ('./include/conn.php');
    $uid=$_GET['uid'];
    $gsql="SELECT * FROM `longquestion` INNER JOIN `class` ON longquestion.class_l_id=class.class_id INNER JOIN `books` 
    ON longquestion.book_l_id=books.book_id INNER JOIN `chapter` ON longquestion.chapter_l_id = chapter.chp_id 
    WHERE `longQues_id`='$uid'"; 
    $grun=mysqli_query($conn,$gsql);
    $gfet=mysqli_fetch_array($grun);
    
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
                                <h4>Long Question Form</h4>
                            </div>
                            <div class="card-body">
                                <input type="hidden" name="longQues_id" value="<?php echo $gfet ['longQues_id'] ?>" required>
                                <label for="">Class</label>
                                <select name="class_l_id" class="form-control" placeholder="Select Category" disabled>
                                    <option value="<?php echo $gfet ['class_l_id']?>"><?php echo $gfet ['class_name']?></option>
                                </select>
                                <div class="form-group">
                                    <label>Book Name</label>
                                    <input type="text" name="book_l_id" value="<?php echo $gfet ['book_name']?>" 
                                    class="form-control" required disabled>
                                </div>
                                <div class="form-group">
                                    <label>Chapter Name</label>
                                    <input type="text" name="chapter_l_id" value="<?php echo $gfet ['chp_name']?>" 
                                    class="form-control" required disabled>
                                </div>
                                <div class="form-group">
                                    <label>Long Question English</label>
                                    <input type="text" name="longQuestion_eng" value="<?php echo $gfet ['longQuestion_eng']?>" 
                                    class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label>Long Question Urdu</label>
                                    <input type="text" name="longQuestion_urdu" value="<?php echo $gfet ['longQuestion_urdu']?>" 
                                    class="form-control" required>
                                </div>
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
            url: "./files/long_Q_update_ajax.php",
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
                        title: 'Long Question Has Been Updated successfully'
                    })
                    //  alert('Sub Category HAS BEEN UPDATED');
                    window.location.href="./viewlongquestion.php";
                } else {
                    alert('Long Question HAS NOT BEEN Updated');
                }
            }
        });
    });
});
</script>