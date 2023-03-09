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
            <div class="row justify-content-center">
                <div class="col-12 col-md-6 col-lg-6">
                    <a href="viewuser.php"><button type="btn" class="btn btn-primary mb-5"
                            style="margin-left:85%;">
                            View User</button></a>
                    <div class="card ">
                        <form id="myuser">
                            <div class="card-header">
                                <h4>User Form</h4>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label>First Name</label>
                                    <input type="text" name="sname" id="name" class="form-control" 
                                    placeholder="Enter First Name" required>
                                    <span id="errorname"></span>
                                </div>
                                <div class="form-group">
                                    <label>Last Name</label>
                                    <input type="text" name="sfname" id="lname" class="form-control" 
                                    placeholder="Enter Last Name" required>
                                    <span id="errorlname"></span>
                                </div>
                                <div class="form-group">
                                    <label>Phone Number</label>
                                    <input type="text" name="scontact" id="number" class="form-control" 
                                    placeholder="Enter Phone Number" required>
                                    <span id="errornumber"></span>
                                </div>
                                <div class="form-group">
                                    <label>Address</label>
                                    <input type="text" name="saddress" id="address" class="form-control" 
                                    placeholder="Enter Address" required>
                                    <span id="erroraddress"></span>
                                </div>
                                <div class="form-group">
                                    <label>Address2</label>
                                    <input type="text" name="saddress2" id="address2" class="form-control" 
                                    placeholder="Enter Address 2" 
                                    required>
                                    <span id="erroraddress2"></span>
                                </div>
                                <div class="form-group">
                                    <label>Country</label>
                                    <select name="scountry" class="form-control" id="scountry" required>
                                        <option value="">Select Your Country</option>
                                        <option value="pakistan">Pakistan</option>
                                        <option value="india">India</option>
                                        <option value="united states">United States</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>City</label>
                                    <select name="scity" class="form-control" required>
                                        <option value="">Select Your City</option>
                                        <option value="punjab">Lahore</option>
                                        <option value="sindh">Faisalabad</option>
                                        <option value="delhi">Karachi</option>
                                        <option value="mumbai">Mumbai</option>
                                        <option value="los_angelas">Los Angeles</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Postal_Code</label>
                                    <input type="text" name="postal_code" id="code" class="form-control" placeholder="Enter Postal Code" 
                                    required>
                                    <span id="errorcode"></span>
                                </div>
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="text" name="semail" id="email" class="form-control" placeholder="Enter Your Email" 
                                    required>
                                    <span id="eemail"></span>
                                </div>
                                <div class="form-group">
                                    <label>Password</label>
                                    <input type="text" name="spassword" id="pass" class="form-control" placeholder="Enter Your Password" 
                                    required>
                                    <span id="errorpass"></span>
                                </div>
                                <div class="form-group">
                                    <label>Password Confirm</label>
                                    <input type="text" name="sconfirm" id="confirm" class="form-control" placeholder="Confirm Password" 
                                    required>
                                    <span id="errorconfirm"></span>
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
        var mydata = new FormData(myuser);
        $.ajax({
            url: "./files/user-insert.php",
            method: "POST",
            data: mydata,
            contentType: false,
            processData: false,
            success: function(res) {
                // alert(res);
                if(res==0){
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
                        icon: 'error',
                        title: 'Please Fill out all Filled'
                    })
                    // alert ("fill out all filed");
                }
                 else if (res == 1) {
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
                        icon: 'error',
                        title: 'Email Already Exist'
                    })
                    // alert("Email Has been inserted");
                    // alert("Email ALREADY EXIST");

                } else if (res == 2) {
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
                        title: 'Form Has Been Inserted Successfully'
                    })
                    // window.location.assign("./login.php");
                } else if (res == 3) {
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
                        icon: 'error',
                        title: 'Form Has Been Not Inserted'
                    })
                    // alert("Form HAS BEEN Not INSERTED");
                } else if(res==4){
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
                        icon: 'error',
                        title: 'Check Your Password'
                    })
                    // alert ("Chack your Password");
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
            document.getElementById("errorname").innerHTML="Name must only contain letters.";
        }else{
            document.getElementById("errorname").innerHTML="";
        }
    })

    var tr=document.getElementById("lname");
        tr.addEventListener("input",(e)=>{
        var lname=e.target.value;
        if (!lname.match(/^[A-Za-z ]*$/)) {
            document.getElementById("errorlname").innerHTML="Name must only contain letters.";
        }else{
            document.getElementById("errorlname").innerHTML="";
        }
    })

    var tr=document.getElementById("number");
        tr.addEventListener("input",(e)=>{
        var number=e.target.value;
        if (!number.match(/^[+-09 ]*$/)) {
            document.getElementById("errornumber").innerHTML="Just only number.";
        }else{
            document.getElementById("errornumber").innerHTML="";
        }
    })

    var tr=document.getElementById("address");
        tr.addEventListener("input",(e)=>{
        var address=e.target.value;
        if (!address.match(/^[A-Za-z0-9#-/ ]*$/)) {
            document.getElementById("erroraddress").innerHTML="Just only letter and number.";
        }else{
            document.getElementById("erroraddress").innerHTML="";
        }
    })

    var tr=document.getElementById("address2");
        tr.addEventListener("input",(e)=>{
        var address2=e.target.value;
        if (!address2.match(/^[A-Za-z0-9#-/ ]*$/)) {
            document.getElementById("erroraddress2").innerHTML="Just only number.";
        }else{
            document.getElementById("erroraddress2").innerHTML="";
        }
    })

    var tr=document.getElementById("code");
        tr.addEventListener("input",(e)=>{
        var code=e.target.value;
        if (!code.match(/^[0-9]*$/)) {
            document.getElementById("errorcode").innerHTML="Just only number.";
        }else{
            document.getElementById("errorcode").innerHTML="";
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