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
                    <a href="viewbooks.php"><button type="btn" class="btn btn-primary mb-5"
                            style="margin-left:77%;">
                            View Books</button></a>
                    <div class="card ">
                        <form id="subcate" enctype="multipart/form-data">
                            <div class="card-header">
                                <h4>Books</h4>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="">Select MAin Class</label>
                                    <select name="class_id" class="form-control" placeholder="Select Category">
                                        <option>Select Main class</option>
                                        <?php
                                        $sql="SELECT * FROM `class`";
                                        $run=mysqli_query($conn,$sql);
                                        while ($fet=mysqli_fetch_array($run)){
                                            ?>
                                        <option value="<?php echo $fet['class_id'];?>">
                                            <?php echo $fet['class_name'];?></option>
                                        <?php
                                        }
                                    ?>
                                    </select>
                                    <label>Book Name</label>
                                    <input type="text" name="book_name" id="name" class="form-control" required>
                                    <span id="errorname"></span>

                                    <label>Book Pic</label>
                                    <input type="file" name="book_pic" id="pic" class="form-control" required>
                                    <span id="errorname"></span>


                                </div>
                            </div>
                            <div class="card-footer text-right">
                                <input class="btn btn-primary" type="submit"
                                    name="sub" id="btn" value="Submit" />
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
$(document).ready(function() {
    $("#btn").on("click", function(e) {
        // alert("run");
        e.preventDefault();
        var mydata = new FormData(subcate);
        $.ajax({
            url: "./files/books_insert.php",
            method: "POST",
            data: mydata,
            contentType: false,
            processData: false,
            success: function(res) {
                // alert(res);
                if (res == 0) {
                    alert("Books already exists");
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
                        title: 'Books Has Been Inserted successfully'
                    })
                    // alert('Books HAS BEEN INSERTED');
                    $('#subcate').trigger('reset');
                } else {
                    alert('Books HAS NOT BEEN INSERTED');
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