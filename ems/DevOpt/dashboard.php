<?php
session_start();
error_reporting(0);
if(strlen($_SESSION['devlogin'])==0)
    {   
header('location:devlogin.php');
}
else{
    // Developer's dashboard content
    echo "Welcome ".$_SESSION['devlogin'];
}
?>

<!-- copy to all--->

<!DOCTYPE html>

<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8" />
    <title>Developer Option</title>
    
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
        <a href="#" id="ddlmenuItem" data-toggle="dropdown"> <i class="bx bx-grid-alt"></i><span class="links_name">Categories settings</span><i class="fa fa-angle-down"></i></a>
                                <ul class="dropdown-menu">
                                    <li><a href="add-category.php">Add Category</a></li>
                                    <li><a href="manage-categories.php">Manage Categories</a></li>
                                </ul>
        </li>

        <li>
        <a href="#" id="ddlmenuItem" data-toggle="dropdown"> <i class="bx bx-list-ul"></i><span class="links_name">Manufacturer settings</span><i class="fa fa-angle-down"></i></a>
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
        <a href="#" id="ddlmenuItem" data-toggle="dropdown"> <i class="bx bx-book-alt"></i><span class="links_name">Equipment profile settings</span><i class="fa fa-angle-down"></i></a>
                                <ul class="dropdown-menu">
                                    <li><a href="issue-equipment.php">Issue New Equipment</a></li>
                                    <li><a href="manage-issued-equipment.php">Manage Issued Equipment</a></li>
                                </ul>
        </li>

        <li>
        <a href="#" id="ddlmenuItem" data-toggle="dropdown"> <i class="bx bx-book-alt"></i><span class="links_name">Scale settings</span><i class="fa fa-angle-down"></i></a>
                                <ul class="dropdown-menu">
                                    <li><a href="add-scale.php">Upload Scale</a></li>
                                    <li><a href="scale.php">Manage Scale</a></li>
                                </ul>
        </li>

        <li>
        <a href="#" id="ddlmenuItem" data-toggle="dropdown"> <i class="bx bx-book-alt"></i><span class="links_name">Report settings</span><i class="fa fa-angle-down"></i></a>
                                <ul class="dropdown-menu">
                                    <li><a href="add-scale.php">Upload Report</a></li>
                                    <li><a href="scale.php">Download Report</a></li>
                                    <li><a href="scale.php">Publically Available Data</a></li>
                                </ul>
        </li>


        <li>
        <a href="#" id="ddlmenuItem" data-toggle="dropdown"> <i class="bx bx-cog"></i><span class="links_name">Developer Profile Settings</span><i class="fa fa-angle-down"></i></a>
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
          <span class="dashboard">Dashboard</span>
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
        <div class="overview-boxes">
          <!--overvew box start-->
          <div class="box">
            <div class="right-side">
              <a>
              <div class="box-topic">Equipment Not Returned</div>
              <?php 
$sql2 ="SELECT id from tblissuedbookdetails where (RetrunStatus='' || RetrunStatus is null)";
$query2 = $dbh -> prepare($sql2);
$query2->execute();
$results2=$query2->fetchAll(PDO::FETCH_OBJ);
$returnedbooks=$query2->rowCount();
?>
              <div><?php echo htmlentities($returnedbooks);?></div>
              </a>
              <div class="indicator">
                
                <span class="text">Up from yesterday</span>
              </div>
            </div>
            
            
          </div>

          <!--equipment not returned yet section end-->
          <div class="box">
            <div class="right-side">
              <a>
              <div class="box-topic">Registered Users</div>
              <?php 
$sql3 ="SELECT id from tblstudents ";
$query3 = $dbh -> prepare($sql3);
$query3->execute();
$results3=$query3->fetchAll(PDO::FETCH_OBJ);
$regstds=$query3->rowCount();
?>
              <div><?php echo htmlentities($regstds);?></div>
            </a>
              <div class="indicator">
                
                <span class="text">Up from yesterday</span>
              </div>
            </div>
            
          </div>

          <!--regestered user section end-->
          <div class="box">
            <div class="right-side">
              <div class="box-topic">Manufacturer Listed</div>
              <?php 
$sq4 ="SELECT id from tblauthors ";
$query4 = $dbh -> prepare($sq4);
$query4->execute();
$results4=$query4->fetchAll(PDO::FETCH_OBJ);
$listdathrs=$query4->rowCount();
?>
              <div><?php echo htmlentities($listdathrs);?></div>
              <div class="indicator">
                
                <span class="text">Up from yesterday</span>
              </div>
            </div>
            
          </div>

          <!--regestered user section end-->
          <div class="box">
            <div class="right-side">
              <div class="box-topic">Listed Categories</div>
              <?php 
$sql5 ="SELECT id from tblcategory ";
$query5 = $dbh -> prepare($sql5);
$query5->execute();
$results5=$query5->fetchAll(PDO::FETCH_OBJ);
$listdcats=$query5->rowCount();
?>
              <div><?php echo htmlentities($listdcats);?></div>
              <div class="indicator">
                
                <span class="text">Down From Today</span>
              </div>
            </div>
            
          </div>
        </div>

        

        <!--overvew box end-->
  
          
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
    <!-- CORE JQUERY  -->
    <script src="assets/js/jquery-1.10.2.js"></script>
    <!-- BOOTSTRAP SCRIPTS  -->
    <script src="assets/js/bootstrap.js"></script>
      <!-- CUSTOM SCRIPTS  -->
    <script src="assets/js/custom.js"></script>
  </body>
</html>
