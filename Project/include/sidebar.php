
<div class="main-sidebar sidebar-style-2">
    <?php
        include('./include/conn.php');
       
    ?>
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="../../../Sawal Nama/Project//home.php">
                <img alt="image" src="assets/img/Simple Education.png" class="header-logo" /> 
                <span class="logo-name text-danger">Test Make</span>
            </a>
        </div>
        <ul class="sidebar-menu">
           
            <li class="menu-header">Main </li>
                <li class="dropdown">
                    <a href="../../../Sawal Nama/Project//home.php" class="nav-link"><i data-feather="monitor"></i><span>Dashboard</span></a>
                </li>

                <?php
                  $Superemail= $_SESSION['email'];
                $rolequery="SELECT * FROM `admin` WHERE email='$Superemail'";
                $rolerun=mysqli_query($conn,$rolequery);
                $fets=mysqli_fetch_assoc($rolerun);
                if ($fets['role']=='spadmin') {
                    ?>
                    
                    <li class="dropdown">
                        <a href="#" class="menu-toggle nav-link has-dropdown"><i class="fa-regular fa-address-card" style="margin-left:-04px;"></i><span style="margin-left:-4px;">Register Admin Form</span></a>
                        <ul class="dropdown-menu">
                            <li><a class="nav-link" href="admin_form.php">Admin Form</a></li>
                            <li><a class="nav-link" href="admin_view.php">View Admin</a></li>
                        </ul>
                    </li>
                    
                    <?php
                }
                ?>
        
          
                <li class="dropdown">
                    <a href="#" class="menu-toggle nav-link has-dropdown"><i
                        data-feather="briefcase"></i><span>Class</span></a>
                    <ul class="dropdown-menu">
                        <li><a class="nav-link" href="./class.php">Add Class</a></li>
                        <li><a class="nav-link" href="viewclass.php">View Class</a></li>
                    </ul>
                </li>
             
                <li class="dropdown">
                    <a href="#" class="menu-toggle nav-link has-dropdown"><i data-feather="copy"></i><span>Books</span></a>
                    <ul class="dropdown-menu">
                        <li><a class="nav-link" href="books.php">Add Books</a></li>
                        <li><a class="nav-link" href="viewbooks.php">View Books</a></li>
                    </ul>
                </li>
         
            
                <li class="dropdown">
                    <a href="#" class="menu-toggle nav-link has-dropdown"><i
                        data-feather="bar-chart-2"></i><span>Chapter</span></a>
                    <ul class="dropdown-menu">
                        <li><a class="nav-link" href="chap.php">Add Chapter</a></li>
                        <li><a class="nav-link" href="viewchap.php">View Chapter</a></li>
                    </ul>
                </li>
           
                <li class="dropdown">
                    <a href="#" class="menu-toggle nav-link has-dropdown"><i
                        data-feather="shopping-cart"></i><span>MCQS</span></a>
                    <ul class="dropdown-menu">
                        <li><a class="nav-link" href="MCQS.php">Add MCQS</a></li>
                        <li><a class="nav-link" href="./viewMCQS.php">View MCQS</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="menu-toggle nav-link has-dropdown"><i
                        data-feather="shopping-cart"></i><span>Short Quetsion</span></a>
                    <ul class="dropdown-menu">
                        <li><a class="nav-link" href="shortques.php">Add Short Quetsion</a></li>
                        <li><a class="nav-link" href="viewshortques.php">View Short Quetsion</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="menu-toggle nav-link has-dropdown"><i
                        data-feather="shopping-cart"></i><span>Long Quetsion</span></a>
                    <ul class="dropdown-menu">
                        <li><a class="nav-link" href="longQuestion.php">Add Long Quetsion</a></li>
                        <li><a class="nav-link" href="viewlongquestion.php">View Long Quetsionuct</a></li>
                    </ul>
                </li>
        </ul>
    </aside>
</div>