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
                                <a href="MCQS.php"><button type="btn" class="btn btn-primary mb-3" style="margin-left:89%;">
                                    Add Mcqs</button></a>
                                <div class="card">
                                    <div class="card-header">
                                        <h4>Mcqs Table</h4>
                                    </div>
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table table-striped table-hover" 
                                            id="tableExport" style="width:100%;">
                                                <thead>
                                                    <tr>
                                                        <th>Class</th>
                                                        <th>Book Name</th>
                                                        <th>Chapter Name</th>
                                                        <th>Chapter Number</th>
                                                        <th>Question</th>
                                                        <th>Correct Answer</th>
                                                        <th>Date</th>
                                                        <th>Update</th>
                                                        <th>Delete</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                        
                                                        $sql = "SELECT * FROM `mcqs` INNER JOIN `class` ON mcqs.class_m_id=class.class_id 
                                                        INNER JOIN `books` ON mcqs.book_m_id=books.book_id INNER JOIN `chapter` ON 
                                                        mcqs.chp_m_id = chapter.chp_id";

                                                        $run=mysqli_query($conn,$sql); 
                                                        while($fet=mysqli_fetch_assoc($run)){
                                                    ?>
                                                    <tr>
                                                        <td><?php echo $fet['class_name'];?></td>
                                                        <td><?php echo $fet['book_name'];?></td>
                                                        <td><?php echo $fet['chp_name'];?></td>
                                                        <td>Chapter # : <?php echo $fet['chp_num'];?></td>
                                                        <td><?php echo $fet['mcqs_ques_eng'];?></td>
                                                        <td><?php echo $fet['mcqs_correct_ans'];?></td>
                                                        <td><?php echo $fet['mcqs_date'];?></td>
                                                        <td class="td"><a class="btn btn-primary" 
                                                        href="./mcqs_update.php?uid=<?php echo $fet['mcqs_id'] ?>">Update</a></td>
                                                        <td class="td"><button type="button" class="btn btn-danger delete"
                                                    data-del="<?php echo $fet['mcqs_id'] ?>">Delete</button></td>
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
            url: "./files/mcqs_del.php",
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
                        title: 'MCQS Has Been Deleted successfully'
                    })
                    $(msg).closest("tr").fadeOut();
                        }
                    })
                    // alert("MCQS Has Been Deleted");
                } else {
                    alert("MCQS Has Been Not Deleted");
                }
            }
        });
    });
});
</script>