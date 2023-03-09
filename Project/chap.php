<?php
    include ('./include/conn.php');
    include ('./include/header.php');
    include ('./include/sidebar.php');
?>

<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-body">
            <div class="row justify-content-center">
                <div class="col-12 col-md-6 col-lg-6">
                    <a href="viewchap.php"><button type="btn" class="btn btn-primary mb-5"
                            style="margin-left:77%;">
                            View Chapter</button></a>
                    <div class="card ">
                        <form id="chapter">
                            <div class="card-header">
                                <h4>Chapter</h4>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Class</label>
                                    <select name="class_id" id="class" class="form-control">
                                        <option>Select Main Category</option>
                                        <?php 
                                        $sql= "SELECT * FROM `class`";
                                        $run=mysqli_query($conn,$sql);
                                        while($fet=mysqli_fetch_array($run)){
                                            ?>
                                        <option value="<?php echo $fet['class_id'];?>"><?php echo $fet['class_name'];?>
                                            </option>
                                        <?php
                                        }
                                    ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Book</label>
                                    <select name="book_id" id="book" class="form-control">
                                    </select>
                                </div>
                                <div class="form-group mb-0">
                                    <label>Chapter Name</label>
                                    <input class="form-control" id="chpname" name="chp_name" required="">
                                    <span id="errorcode"></span>
                                </div>
                                <div class="form-group mb-0">
                                    <label>Chapter Number</label>
                                    <input class="form-control" id="chpnum" name="chp_num" required="">
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
    include ('./include/footer.php');
?>

<script>

$("#class").on("change", function() {
        var classes = $("#class").val();
        // alert(classes);
        $.ajax({
            url: "./files/getchpbook.php",
            method: "POST",
            data: {
                id: classes
            },
            success: function(data) {

                // alert(data);
                $("#book").html(data);
            }
        });
        
    })


$(document).ready(function() {
    $("#btn").on("click", function(e) {
        // alert(run);
        e.preventDefault();
        var mydata = new FormData(chapter);
        $.ajax({
            url: "./files/chap_insert.php",
            method: "POST",
            data: mydata,
            contentType: false,
            processData: false,
            success: function(res) {
                // alert(res);
                if (res == 0) {
                    alert("Chapter already exists");
                } else if (res == 1) {
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
                        title: 'Chapter Has Been Inserted successfully'
                    })
                    // alert('Sub Category HAS BEEN INSERTED');
                    $('#chapter').trigger('reset');
                } else {
                    alert('Chapter HAS NOT BEEN INSERTED');
                }
            }
        });
    });
});
</script>

<!--================== form validation ==================-->

<script>
   
   var tr=document.getElementById("name");
        tr.addEventListener("input",(e)=>{
        var name=e.target.value;
        if (!name.match(/^[A-Za-z ]*$/)) {
            document.getElementById("errorname").innerHTML="Name must only Contain letters.";
        }else{
            document.getElementById("errorname").innerHTML="";
        }
    })

    var tr=document.getElementById("des");
        tr.addEventListener("input",(e)=>{
        var name=e.target.value;
        if (!name.match(/^[A-Za-z ]*$/)) {
            document.getElementById("errordes").innerHTML="Name must only Contain letters.";
        }else{
            document.getElementById("errordes").innerHTML="";
        }
    })

</script>