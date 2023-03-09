<?php
    include('./include/conn.php');
    include ('./include/header.php');
    include ('./include/sidebar.php');
?>
<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-body">
            <div class="row justify-content-center">
                <a href="Admin_view.php" class="btn btn-primary mb-4 "
                    style="margin-left:56%;">Veiw Admin</a>
                <div class="col-8">
                    <div class="card ">
                        <form id="formdata">
                            <div class="card-header">
                                <h4>Admin Form</h4>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Name</label>
                                    <input type="text" name="name" id="name" class="form-control" required>
                                    <span id="errorname"></span>
                                </div>
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="email" name="email" id="email" class="form-control" required>
                                    <span id="eemail"></span>
                                </div>
                                <div class="form-group">
                                    <label>Password</label>
                                    <input type="password" name="password" id="pass" class="form-control" required>
                                    <span id="errorpass"></span>
                                </div>
                                <div class="form-group">
                                    <label>Confirm Password</label>
                                    <input type="password" name="cpassword" id="confirm" class="form-control" 
                                    required>
                                    <span id="errorconfirm"></span>
                                </div>
                                <div class="form-group">
                                    <label>Access</label>
                                    <select name="role" class="form-control raccess">
                                        <option value="">Select</option>
                                        <?php
                                        $sql="SELECT * FROM `role`";
                                        $run=mysqli_query($conn,$sql);
                                        while ($fet=mysqli_fetch_array($run)){
                                            ?>
                                        <option value="<?php echo $fet['role_id'];?>">
                                            <?php echo $fet['name'];?></option>
                                        <?php
                                        }
                                    ?>
                                    </select>
                            </div>
                            <div class="card-footer text-right">
                                <input class="btn btn-primary" id="btn "
                                    type="submit" name="sub" value="Submit" />
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
        // alert(e);
        e.preventDefault(); //yah page ko reload hona sy rokta hy
        var mydata = new FormData(formdata);
        // alert(mydata);
        $.ajax({
            url: "./files/admin_insert.php",
            method: "POST",
            data: mydata,
            contentType: false,
            processData: false,
            success: function(res) {
                // alert(res);
                 if (res == 1) {
                    // alert("category HAS  BEEN INSERTED");
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
                        title: 'Data HAS  BEEN INSERTED'
                    })
                    $('#formdata').trigger('reset');
                } else {
                    // alert("Category is not inserted");
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
                        title: 'Data HAS Not BEEN INSERTED'
                    })
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

    var tr=document.getElementById("email");
        tr.addEventListener("input",(e)=>{
        var email=e.target.value;
        if (!email.match(/^\w+([.-]?\w+)*@\w+([.-]?\w+)*(\.\w{2,3})+$/)) {
            document.getElementById("eemail").innerHTML="Email must be in the format 'example12@domain.com'.";
        }else{
            document.getElementById("eemail").innerHTML="";
        }
    })

    var tr=document.getElementById("pass");
        tr.addEventListener("input",(e)=>{
        var pass=e.target.value;
        if (!pass.match(/^[0-9A-Za-z @-_.#]*$/)) {
            document.getElementById("errorpass").innerHTML="Just only number.";
        }else{
            document.getElementById("errorpass").innerHTML="";
        }
    })

    var tr=document.getElementById("confirm");
        tr.addEventListener("input",(e)=>{
        var confirm=e.target.value;
        if (!confirm.match(/^[0-9A-Za-z @-_.#]*$/)) {
            document.getElementById("errorconfirm").innerHTML="Just only number.";
        }else{
            document.getElementById("errorconfirm").innerHTML="";
        }
    })

</script>