<?php
    include('./include/conn.php');
    include ('./include/header.php');
    include ('./include/sidebar.php');
    $uid=$_GET['uid'];
    $gsql="SELECT * FROM `admin` WHERE `admin_id`='$uid'";
    $grun=mysqli_query($conn,$gsql);
    $gfet=mysqli_fetch_array($grun);
?>

<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-body">
            <div class="row justify-content-center">
                <div class="col-8 ">
                    <div class="card ">
                        <form id="mydata">
                            <div class="card-header">
                                <h4>Update Admin</h4>
                            </div>
                            <input type="hidden" name="id" class="form-control" value="<?php echo $gfet['admin_id'] ?>"
                                required>
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Name</label>
                                    <input type="text" name="name" value="<?php echo $gfet['name'] ?>" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="email" name="email" value="<?php echo $gfet['email'] ?>" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label>Password</label>
                                    <input type="password" name="password" value="<?php echo $gfet['password'] ?>" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label>Confirm Password</label>
                                    <input type="password" value="<?php echo $gfet['cpassword'] ?>" name="cpassword" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label>Access</label>
                                    <select name="role" value="<?php echo $gfet['role'] ?>" class="form-control raccess">
                                        <option value="">Select</option>
                                       <option>Subadmin</option>
                                       <option>Casher</option>
                                       <option>Saler</option>
                                    </select>
                            </div>
                            <div class="card-footer text-right">
                                <input class="btn" style=" background-color:#464c45; color:white;"
                                    type="submit" name="update" value="Update" />
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
    $(".btn").on("click", function(e) {
        e.preventDefault();
        var updatedata = new FormData(mydata);
        $.ajax({
            url: "./files/admin_ajax.php",
            method: "POST",
            data: updatedata,
            contentType: false,
            processData: false,
            success: function(res) {
                //  alert(res);
                if (res == 1) {
                    // alert("DATA has been UPDATED");
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
                        title: 'Data HAS  BEEN  Updated'
                    })
                    window.location.href = "./admin_view.php";
                } else {
                    // alert("DATA has not been UPDATED");
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
                        title: 'Data HAS not  BEEN Updated'
                    })
                }
            }
        });
    });
});
</script>