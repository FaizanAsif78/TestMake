
<?php
include("./Project/include/conn.php");
if (!$_SESSION['user_email']) {
    header('location:./login.php');
}

?>

<nav class="pt-2 mt-1 navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid ">
        <a class="navbar-brand" href="#"><img src="./assets/img/Simple Education.png" alt="" width="50px"></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="./dashboard.php">Dashboard</a>
                    </li>
                    <a class="nav-link active" aria-current="page" href="./index.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="./paperPage.php">Saved Paper</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="./classes.php">Genrate Paper</a>
                </li>



            </ul>
            <form class="d-flex" style="margin-right: 50px;">
                <div class="dropdown">
                    <button class="btn btn-outline-success dropdown-toggle " type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                       Account
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                        <li><a class="dropdown-item" href="#">Profile</a></li>
                        <li><a class="dropdown-item" href="./logout.php">Logout</a></li>
                    </ul>
                </div>
            </form>
        </div>
    </div>
</nav>