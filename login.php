<?php
    include ("./Project/include/conn.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- sweet alert script tag -->
    <link href="https://cdn.jsdelivr.net/npm/@sweetalert2/theme-dark@4/dark.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"></script>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Unplug UI</title>
    <link rel="stylesheet" href="./src/css/unplug-ui-kit.css">
    <link rel="stylesheet" href="./style.css">
    <link rel="stylesheet" href="../src/vendors/%40mdi/font/css/materialdesignicons.min.css">
     <!-- boostrap link -->

     <link rel="stylesheet" href="./assets/Bootstrap/bootstrap.min.css">
     <link rel="stylesheet" href="./assets/Bootstrap/bootstrap.min.js">
     <link rel="stylesheet" href="./assets/Bootstrap/popper.min.js">

     <!-- Jquery CDN -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js" integrity="sha512-STof4xm1wgkfm7heWqFJVn58Hm3EtS31XFaagaa8VMReCXAkQnJZ+jEy8PCC/iT18dFy95WcExNHFTqLyp72eQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

</head>
<body>
    <main class="auth">
        <div class="container-fluid">
            <div class="row vh-100">
                <div class="col-md-6 text-center py-5 d-flex flex-column justify-content-center auth-bg-section text-white" style="background-image: url(./assets/img/login-bg.jpg)">
                    <h1 class="text-reset">Welcome to <br> Swal Nama Test Make</h1>
                    <p class="font-weight-bold text-reset">Enter your personal details and Lets Enjoy the test Maker.</p>
                </div>
                <div class="col-md-6 text-center d-flex flex-column py-5 justify-content-center">
                    <div class="auth-form-section">
                        <div class="logo"><img src="./assets/img/Simple Education.png" class="img-fluid" alt="Unplug UI" width="200"></div>
                        <h2>Login in</h2>
                        <p>Free access to our dashboard</p>
                        <form  class="auth-form" id="mydata">
                            <div class="form-group">
                                <label for="username" class="sr-only">User Email</label>
                                <input type="text" name="uemail" id="userEmail" class="form-control" placeholder="Username">
                            </div>
                            <div class="form-group">
                            <label for="userPassword" class="sr-only">Password</label>
                            <input type="password" name="userPassword" id="userPassword" class="form-control" placeholder="Password">
                            </div>
                            <button type="submit" class="btn btn-success btn-block mb-3 " name="submit" id="signin">Sign in</button>
                            <div class="d-md-flex justify-content-between">
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" name="termsAgriment" id="termsAgriment" value="termsAgreed">
                                    <label class="form-check-label" for="termsAgriment">
                                        Remember Me
                                    </label>
                                </div>
                                <a href="#" class="text-info">Forgot Password?</a>
                            </div>
                            
                        </form>
                        <div class="logilink">
                            <p>Free sign up to Enjoy sawal nama :<span class="mx-2 text-decoration-underline"><a href="./register.php">Login ?</a></span></p> 
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </main>
    <script>
        $('#signin').on('click', function(e) {
            e.preventDefault();
            let data = new FormData(mydata)
            // alert(formsdata)
            // let    data =1;
            $.ajax({
                type: "POST",
                url: "./userAuthtication/login.php",
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
                            title: 'Enter the credetials'
                        })
                    }
                     else if (res == 2000) {
                        // alert('oiuytredfghjkl')
                        window.location.href = './dashboard.php';
                    }
                    else if(res==3000){
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
                            title: 'Your login credential is Invalid'
                        })
                    }

                }
            });
        })
    </script>
</body>

</html>