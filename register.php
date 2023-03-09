<?php
include("./Project/include/conn.php");
?>

<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from bootstrapdash.com/demo/unplug-ui-kit-pro/demo/register.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 12 Feb 2023 19:00:45 GMT -->

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Swal Nama Sign up</title>
    <link rel="stylesheet" href="./src/css/unplug-ui-kit.css">
    <link rel="stylesheet" href="assets/css/unplug-ui-kit-demo.css">
    <link rel="stylesheet" href="../src/vendors/%40mdi/font/css/materialdesignicons.min.css">
    <!-- boostrap link -->
    <link rel="stylesheet" href="./assets/Bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="./assets/Bootstrap/bootstrap.min.js">
    <link rel="stylesheet" href="./assets/Bootstrap/popper.min.js">
    <!-- sweet alert script tag -->
    <link href="https://cdn.jsdelivr.net/npm/@sweetalert2/theme-dark@4/dark.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"></script>

</head>

<body>
    <main class="auth">
        <div class="container-fluid">
            <div class="row vh-100">
                <div class="col-md-6 text-center d-flex flex-column justify-content-center auth-bg-section text-white" style="background-image: url(assets/img/login-bg.jpg)">
                    <h1 class="text-reset">Welcome to <br> Swal Nama</h1>
                    <p class="font-weight-bold text-reset">Enter your personal details and Enjoy the Self test Make</p>
                </div>
                <div class="col-md-6 text-center d-flex flex-column justify-content-center">
                    <div class="auth-form-section">
                        <div class="logo"><img src="./assets/img/Simple Education.png" class="img-fluid" alt="Unplug UI" width="200"></div>
                        <h2>Sign up</h2>
                        <p>Free access to our dashboard</p>
                        <form class="auth-form" id="mydata">
                            <div class="form-group">
                                <label for="username" class="sr-only">Username</label>
                                <input type="text" name="username" id="username" class="form-control" placeholder="Username">
                            </div>
                            <div class="form-group">
                                <label for="userEmail" class="sr-only">Email</label>
                                <input type="email" name="userEmail" id="userEmail" class="form-control" placeholder="Email" required>
                            </div>
                            <div class="form-group">
                                <label for="userPassword" class="sr-only">Password</label>
                                <input type="password" name="userPassword" id="userPassword" class="form-control" placeholder="Password" required>
                            </div>
                            <button type="submit" class="btn btn-success btn-block mb-3" id="singup">Sign up</button>
                            <div class="form-check text-left">
                                <input type="checkbox" class="form-check-input" name="termsAgriment" id="termsAgriment" value="termsAgreed">
                                <label class="form-check-label" for="termsAgriment">
                                    I agree to terms and conditions of this website
                                </label>
                            </div>
                        </form>
                        <p class="text-left mb-0">Already have an account? <a href="login.php">Sign in here</a> </p>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js" integrity="sha512-STof4xm1wgkfm7heWqFJVn58Hm3EtS31XFaagaa8VMReCXAkQnJZ+jEy8PCC/iT18dFy95WcExNHFTqLyp72eQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script>
        $('#singup').on('click', function(e) {
            e.preventDefault();
            let data = new FormData(mydata)
            // alert(formsdata)
            // let    data =1;
            $.ajax({
                type: "POST",
                url: "./userAuthtication/signup.php",
                data: data,
                processData: false,
                contentType: false,
                success: function(res) {
                    // alert(res)
                    // console.log(res);
                    if (res == 1000) {
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
                            title: 'Email Is already Exist'
                        })
                        $('#mydata').trigger('reset')

                    } else if (res == 2000) {
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
                            title: 'user Has been created successfully',
                        })
                        $('#mydata').trigger('reset')
                    }else if(res==5000){
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
                            title: 'Please Fill out all field'
                        })
                    }

                }
            });
        })
    </script>
</body>

<!-- Mirrored from bootstrapdash.com/demo/unplug-ui-kit-pro/demo/register.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 12 Feb 2023 19:00:47 GMT -->

</html>