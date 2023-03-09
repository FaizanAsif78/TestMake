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
                <div class="col-12">
                    <a href="class.php"><button type="btn" class="btn btn-primary mb-3" style="margin-left :91%;">
                            Add Class</button></a>
                    <div class="card">
                        <div class="card-header">
                            <h4>Category Table</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-hover" id="tableExport" style="width:100%;">
                                    <thead>
                                        <tr>
                                            <th>Class Name</th>
                                            <th>Description</th>
                                            <th>Date</th>
                                            <th>Update</th>
                                            <th>Delete</th>
                                        </tr>
                                    </thead>
                                            <tbody>
                                                    <?php
                                                        $sql="SELECT * FROM `class` ORDER BY `class`.`class_id`
                                                        ";
                                                        $run=mysqli_query($conn,$sql);
                                                        while($fet=mysqli_fetch_assoc($run)){
                                                    ?>
                                                <tr>
                                                    <td class="d-none"><?php echo $fet['class_id'];?></td>
                                                    <td><?php echo $fet['class_name'];?></td>
                                                    <td><?php echo $fet['class_des'];?></td>
                                                    <td><?php echo $fet['cdate'];?></td>
                                                    <td class="td"><a class="btn btn-primary"
                                                        href="./update.php?uid=<?php echo $fet['class_id'] ?>">Update</a></td>
                                                    <!-- <td class="td"><a class="btn btn-outline-danger" href="./delete.php?myid=">Delete</a></td> -->
                                                    <td class="td"><button type="button" class="btn btn-danger delete"
                                                        data-del="<?php echo $fet['class_id'] ?>">Delete</button></td>
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
            url: "./files/class_del.php",
            method: "GET",
            data: {
                yourdel: mydel
            },
            success: function(res) {
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
                        title: 'Class Has Been Deleted successfully'
                    })
                    $(msg).closest("tr").fadeOut();
                        }
                    })
                    // alert("Class Has Been Deleted");
                } else {
                    alert("Class Has Been Not Deleted");
                }
            }
        });
    });
});
</script>