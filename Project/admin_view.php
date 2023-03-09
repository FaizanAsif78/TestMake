<?php
     include('./include/conn.php');
    include ('./include/header.php');
    include ('./include/sidebar.php');
?>

<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-body">
            <div class="row">
                <a href="admin_form.php " class="btn btn-primary mb-4 "
                    style="margin-left:90%;">Add Admin</a>
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Admin Table</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-hover" id="tableExport" style="width:100%;">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Password</th>
                                            <th>Confirm Password</th>
                                            <th>Role</th>
                                            <th>Update</th>
                                            <th>Delete</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                                        $sql="SELECT * FROM `admin`";
                                                        $run=mysqli_query($conn,$sql);
                                                        while($fet=mysqli_fetch_assoc($run)){
                                                    ?>
                                        <tr>
                                            <td><?php echo $fet['admin_id'];?></td>
                                            <td><?php echo $fet['name'];?></td>
                                            <td><?php echo $fet['email'];?></td>
                                            <td><?php echo $fet['password'];?></td>
                                            <td><?php echo $fet['cpassword'];?></td>
                                            <td><?php echo $fet['role'];?></td>

                                            <td class="td"><a class="btn btn-primary"
                                                    href="./admin_update.php?uid=<?php echo $fet['admin_id'] ?>">Update</a></td>
                                            <td class="td"><button type="button" class="btn btn-danger delete"
                                                    data-del="<?php echo $fet['admin_id']; ?>">Delete</button></td>
                                        </tr>
                                        <?php
                                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
</div>
</div>

<?php 
    include ('./include/footer.php');
?>
<script>
$(document).ready(function() {
    $(document).on("click", ".delete", function() {
        var del = $(this).data("del");
        var msg = this;
        $.ajax({
            url: "./files/admin_del.php",
            method: "GET",
            data: {
                mydel: del
            },
            success: function(res) {
                // alert(res);
                if (res == 1) {
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
                            const Toast = Swal.mixin({
                                toast: true,
                                position: 'top-end',
                                showConfirmButton: false,
                                timer: 2000,
                                timerProgressBar: true,
                                didOpen: (toast) => {
                                    toast.addEventListener('mouseenter',
                                        Swal.stopTimer)
                                    toast.addEventListener('mouseleave',
                                        Swal.resumeTimer)
                                }
                            })

                            Toast.fire({
                                icon: 'success',
                                title: 'Data Has Been Deleted'
                            })
                            $(msg).closest("tr").fadeOut();
                        }
                    })

                    //  alert("Data HAS BEEN DELETED");

                } else {
                    // alert("Data HAS NOT BEEN DELETED");
                    const Toast = Swal.mixin({
                                toast: true,
                                position: 'top-end',
                                showConfirmButton: false,
                                timer: 2000,
                                timerProgressBar: true,
                                didOpen: (toast) => {
                                    toast.addEventListener('mouseenter',
                                        Swal.stopTimer)
                                    toast.addEventListener('mouseleave',
                                        Swal.resumeTimer)
                                }
                            })

                            Toast.fire({
                                icon: 'error',
                                title: 'Data Has Not Been Deleted'
                            })
                }
            }
        })
    })
})
</script>