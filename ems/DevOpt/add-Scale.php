<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['alogin'])==0)
    {   
header('location:index.php');
}
else{ 
}



    ?>
<!DOCTYPE html>

<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8" />
    <title>Equipment Management System | Dashboard</title>
    
    <link rel="stylesheet" href="style.css" />
    <!-- Boxicons CDN Link -->
    <link href="https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css" rel="stylesheet" />
     <!-- BOOTSTRAP CORE STYLE  -->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FONT AWESOME STYLE  -->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  </head>
  <body>
    <div class="sidebar">
      <div class="logo-details">
      <img src="assets/img/emslogo.png" />
      </div>
      <ul class="nav-links">

        <li>
          <a href="dashboard.php" class="active">
            <i class="bx bx-grid-alt"></i>
            <span class="links_name">Dashboard</span>
          </a>
        </li>


        <li>
        <a href="#" id="ddlmenuItem" data-toggle="dropdown"> <i class="bx bx-grid-alt"></i><span class="links_name">Categories</span><i class="fa fa-angle-down"></i></a>
                                <ul class="dropdown-menu">
                                    <li><a href="add-category.php">Add Category</a></li>
                                    <li><a href="manage-categories.php">Manage Categories</a></li>
                                </ul>
        </li>

        <li>
        <a href="#" id="ddlmenuItem" data-toggle="dropdown"> <i class="bx bx-list-ul"></i><span class="links_name">Manufacturer</span><i class="fa fa-angle-down"></i></a>
                                <ul class="dropdown-menu">
                                    <li><a href="add-manufacturer.php">Add Manufacturer</a></li>
                                    <li><a href="manage-manufacturer.php">Manage Manufacturer</a></li>
                                </ul>
        </li>

        <li>
        <a href="#" id="ddlmenuItem" data-toggle="dropdown"> <i class="bx bx-coin-stack"></i><span class="links_name">Equipment</span><i class="fa fa-angle-down"></i></a>
                                <ul class="dropdown-menu">
                                    <li><a href="add-equipment.php">Add Equipment</a></li>
                                    <li><a href="manage-equipment.php">Manage Equipment</a></li>
                                </ul>
        </li>


        <li>
        <a href="#" id="ddlmenuItem" data-toggle="dropdown"> <i class="bx bx-book-alt"></i><span class="links_name">Issue Equipment</span><i class="fa fa-angle-down"></i></a>
                                <ul class="dropdown-menu">
                                    <li><a href="issue-equipment.php">Issue New Equipment</a></li>
                                    <li><a href="manage-issued-equipment.php">Manage Issued Equipment</a></li>
                                </ul>
        </li>

        <li>
        <a href="#" id="ddlmenuItem" data-toggle="dropdown"> <i class="bx bx-book-alt"></i><span class="links_name">Scale</span><i class="fa fa-angle-down"></i></a>
                                <ul class="dropdown-menu">
                                    <li><a href="add-scale.php">Upload Scale</a></li>
                                    <li><a href="scale.php">Manage Scale</a></li>
                                </ul>
        </li>

        <li>
        <a href="#" id="ddlmenuItem" data-toggle="dropdown"> <i class="bx bx-book-alt"></i><span class="links_name">Reports</span><i class="fa fa-angle-down"></i></a>
                                <ul class="dropdown-menu">
                                    <li><a href="add-scale.php">Upload Report</a></li>
                                    <li><a href="scale.php">Download Report</a></li>
                                    <li><a href="scale.php">Publically Available Data</a></li>
                                </ul>
        </li>


        <li>
        <a href="#" id="ddlmenuItem" data-toggle="dropdown"> <i class="bx bx-cog"></i><span class="links_name">Setting</span><i class="fa fa-angle-down"></i></a>
                                <ul class="dropdown-menu">
                                    <li><a href="admin-profile.php">Profile</a></li>
                                    <li><a href="reg-employees.php">User List</a></li>
                                    <li><a href="change-password.php">Change Password</a></li>
                                    
                                </ul>
        </li>


        <li class="log_out">
          <a href="logout.php">
            <i class="bx bx-log-out"></i>
            <span class="links_name">Log out</span>
          </a>
        </li>

      </ul>

    </div>

    <section class="home-section">
      <nav>
        <div class="sidebar-button">
          <i class="bx bx-menu sidebarBtn"></i>
          <span class="dashboard">Add Scale</span>
        </div>
        <div>
        <?php
                             $ipaddress = getenv("REMOTE_ADDR") ;
                            Echo "Your IP Address is " . $ipaddress;
                             ?>
        </div>

        <!--   admin profile picture
        <div class="profile-details">
          <img src="images/profile.jpg" alt="" />
          <span class="admin_name">Mh Devlali</span>
          <i class="bx bx-chevron-down"></i>
        </div>
          -->
      </nav>

      <div class="home-content">
            <div class="col-md-12 mt-4">

                <?php
                if(isset($_SESSION['message']))
                {
                    echo "<h4>".$_SESSION['message']."</h4>";
                    unset($_SESSION['message']);
                }
                ?>

                <div class="card">
                    <div class="card-header">
                        <h4>Select Scale Excel File to import into database</h4>
                    </div>
                    <div class="card-body">

                        <form action="code.php" method="POST" enctype="multipart/form-data">

                            <input type="file" name="import_file" class="form-control" />
                            <button type="submit" name="save_excel_data" class="btn btn-primary mt-3">Import</button>

                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
            </div>
            </div>
            </div>
    </section>


    <script>
      let sidebar = document.querySelector(".sidebar");
      let sidebarBtn = document.querySelector(".sidebarBtn");
      sidebarBtn.onclick = function () {
        sidebar.classList.toggle("active");
        if (sidebar.classList.contains("active")) {
          sidebarBtn.classList.replace("bx-menu", "bx-menu-alt-right");
        } else sidebarBtn.classList.replace("bx-menu-alt-right", "bx-menu");
      };
    </script>

     <!-- CONTENT-WRAPPER SECTION END-->
  <?php include('includes/footer.php');?>
      <!-- FOOTER SECTION END-->
    <!-- JAVASCRIPT FILES PLACED AT THE BOTTOM TO REDUCE THE LOADING TIME  -->
    <!-- CORE JQUERY  -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/jquery-1.10.2.js"></script>
    <!-- BOOTSTRAP SCRIPTS  -->
    <script src="assets/js/bootstrap.js"></script>
      <!-- CUSTOM SCRIPTS  -->
    <script src="assets/js/custom.js"></script>
</body>
</html>
