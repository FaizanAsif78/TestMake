<?php
     include('./include/conn.php');
    $uid=$_GET['uid'];
    $gsql="SELECT * FROM `class` WHERE `class_id`='$uid'";
    $grun=mysqli_query($conn,$gsql);
    $gfet=mysqli_fetch_array($grun);
    
    include ('./include/header.php');
    include ('./include/sidebar.php');
?>

<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-body">
            <div class="row justify-content-center">
                <div class="col-12 col-md-6 col-lg-6">
                    <div class="card ">
                        <form id="mydata">
                            <div class="card-header">
                                <h4>Class</h4>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <input type="hidden" name="class_id" value="<?php echo $gfet ['class_id'] ?>" required>

                                    <label>Class Name</label>
                                    <input value="<?php echo $gfet ['class_name'] ?>" type="text" name="class_name" class="form-control" required>
                                </div>
                                <div class="form-group mb-0">
                                    <label>Description</label>
                                    <textarea class="form-control" name="class_des" required><?php echo $gfet ['class_des'] ?></textarea>
                                </div>
                            </div>
                            <div class="card-footer text-right">
                                <input class="btn" id="btn" style=" background-color:#6f42c1; color:white;" type="submit"
                                    name="update" value="Update" />
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
        $(document).ready(function(){
            $('#btn').on("click",function(e){
                e.preventDefault();
                var update=new FormData(mydata);
                $.ajax({
                    url:"./files/class_update_ajax.php",
                    method:"POST",
                    data:update,
                    contentType:false,
                    processData:false,
                    success:function(res){
                        //  alert(res);
                        if(res==1){
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
                        title: 'Class Has Been Updated successfully'
                    })
                            // alert("DATA HAS BEEN UPDATED");
                            window.location.href="./viewclass.php";
                        }else{
                            alert("DATA HAS BEEN NOT UPDATED");
                        }
                    }
                });
            });
        });
    </script>