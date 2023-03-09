<?php
    include ('./include/conn.php');
    include ('./include/header.php');
    include ('./include/sidebar.php');
    // include ('./include/sidebar.php');
?>
<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-body">
            <div class="row justify-content-center">
                <div class="col-12 col-md-6 col-lg-6">
                    <a href="viewclass.php"><button type="btn" class="btn btn-primary mb-5"
                            style="margin-left:80%;">
                            View Class</button></a>
                    <div class="card ">
                        <form id="myclass">
                            <div class="card-header">
                                <h4>Class Form</h4>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Category Name</label>
                                    <input type="text" name="class_name" id="name" class="form-control" required>
                                    <span id="errorname"></span>
                                </div>
                                <div class="form-group mb-0">
                                    <label>Description</label>
                                    <textarea class="form-control" id="des" name="class_des" required></textarea>
                                    <span id="errordes"></span>
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
        var mydata = new FormData(myclass);
        $.ajax({
            url: "./files/class_insert.php",
            method: "POST",
            data: mydata,
            contentType: false,
            processData: false,
            success: function(res) {
                // alert(res);
                if (res == 0){
                    alert("CLASS ALREADY EXIST");
                }else if (res == 1){
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
                        title: 'Class Has Been Inserted successfully'
                    })
                    // alert("CATEGORY HAS BEEN INSERTED");
                    $('#myclass').trigger('reset');
                } else {
                    alert("Class HAS BEEN NOT INSERTED");
                }
            }
        });
    });
});
</script>

<!--================== form validation ==================-->

<script>
    // const form = document.querySelector("form");
      
    // form.addEventListener("submit", (event) => {
    //     event.preventDefault();
    //     const name = document.querySelector("#name").value;
    //     const des = document.querySelector("#des").value;
    //     if (!name.match(/^[A-Za-z]*$/)){
    //         // const Toast = Swal.mixin({
    //         //             toast: true,
    //         //             position: 'top-end',
    //         //             showConfirmButton: false,
    //         //             timer: 2000,
    //         //             timerProgressBar: true,
    //         //             didOpen: (toast) => {
    //         //                 toast.addEventListener('mouseenter', Swal.stopTimer)
    //         //                 toast.addEventListener('mouseleave', Swal
    //         //                     .resumeTimer)
    //         //             }
    //         //         })

    //         //         Toast.fire({
    //         //             icon: 'error',
    //         //             title: 'Name must only contain letters'
    //         //         })
    //         document.querySelector("#errorname").innerHTML="Name must only Contain letters."; 
    //     }else if (!des.match(/^[A-Za-z]*$/)){
    //         document.querySelector("#errordes").innerHTML="Name must only letters.";
    //     }else {
    //         alert("Form submitted successfully!");
    //         document.querySelector("#errorname").innerHTML="";
    //         document.querySelector("#errordes").innerHTML="";
    //     }
    // });



</script>