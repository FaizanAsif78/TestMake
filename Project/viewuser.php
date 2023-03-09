<?php
    include "./include/conn.php";
?>
<?php
    include ('./include/header.php');
    include ('./include/sidebar.php');
?>

<div class="main-content">
    <section class="section">
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <a href="user.php"><button type="btn" class="btn btn-primary mb-3" style="margin-left:93%;">
                            Add User</button></a>
                    <div class="card">
                        <div class="card-header">
                            <h4>User Table</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-hover" id="tableExport" style="width:100%;">
                                    <thead>
                                        <tr>
                                            <th>First Name</th>
                                            <th>Last Name</th>
                                            <th>Phone Number</th>
                                            <th>Address</th>
                                            <th>Address 2</th>
                                            <th>Country</th>
                                            <th>City</th>
                                            <th>Postal_Code</th>
                                            <th>Email ID</th>
                                            <th>Password</th>
                                            <th>Confirm</th>
                                            <th>Delete</th>
                                        </tr>
                                    </thead>
                                            <tbody>
                                                    <?php
                                                        $sql="SELECT * FROM `signup`";
                                                        $run=mysqli_query($conn,$sql);
                                                        while($fet=mysqli_fetch_assoc($run)){
                                                    ?>
                                                <tr>
                                                    <td><?php echo $fet['sname'];?></td>
                                                    <td><?php echo $fet['sfname'];?></td>
                                                    <td><?php echo $fet['scontact'];?></td>
                                                    <td><?php echo $fet['saddress'];?></td>
                                                    <td><?php echo $fet['saddress2'];?></td>
                                                    <td><?php echo $fet['scountry'];?></td>
                                                    <td><?php echo $fet['scity'];?></td>
                                                    <td><?php echo $fet['postal_code'];?></td>
                                                    <td><?php echo $fet['semail'];?></td>
                                                    <td><?php echo $fet['spassword'];?></td>
                                                    <td><?php echo $fet['sconfirm'];?></td>

                                                    <!-- <td class="td"><a class="btn btn-outline-success"
                                                        href="./update.php?uid=<?php echo $fet['cid'] ?>">Update</a></td> -->
                                                    <td class="td"><button type="button" class="btn btn-danger delete"
                                                        data-del="<?php echo $fet['sid'] ?>">Delete</button></td>
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
        var mydel = $(this).data("del");
        var msg = this;
        $.ajax({
            url: "./files/userdel.php",
            method: "GET",
            data: {
                yourdel: mydel
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
                        timer: 3000,
                        timerProgressBar: true,
                        didOpen: (toast) => {
                            toast.addEventListener('mouseenter', Swal.stopTimer)
                            toast.addEventListener('mouseleave', Swal
                                .resumeTimer)
                        }
                    })

                    Toast.fire({
                        icon: 'success',
                        title: 'Form Has Been Deleted successfully'
                    })
                    $(msg).closest("tr").fadeOut();
                        }
                    })
                } else {
                    alert("Form Has Been Not Deleted");
                }
            }
        });
    });
});
</script>