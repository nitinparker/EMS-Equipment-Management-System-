<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['alogin'])==0)
    {   
header('location:index.php');
}
else{ 

if(isset($_POST['issue']))
{
$studentid=strtoupper($_POST['studentid']);
$bookid=$_POST['bookid'];
$isissued=1;
$sql="INSERT INTO  tblissuedbookdetails(StudentID,BookId) VALUES(:studentid,:bookid);
update tblbooks set isIssued=:isissued where id=:bookid;";
$query = $dbh->prepare($sql);
$query->bindParam(':studentid',$studentid,PDO::PARAM_STR);
$query->bindParam(':bookid',$bookid,PDO::PARAM_STR);
$query->bindParam(':isissued',$isissued,PDO::PARAM_STR);
$query->execute();
$lastInsertId = $dbh->lastInsertId();
if($lastInsertId)
{
$_SESSION['msg']="Equipment issued successfully";
header('location:manage-issued-equipment.php');
}
else 
{
$_SESSION['error']="Something went wrong. Please try again";
header('location:manage-issued-equipment.php');
}

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
<script>
// function for get student name
function getstudent() {
$("#loaderIcon").show();
jQuery.ajax({
url: "get_employee.php",
data:'studentid='+$("#studentid").val(),
type: "POST",
success:function(data){
$("#get_student_name").html(data);
$("#loaderIcon").hide();
},
error:function (){}
});
}

//function for book details
function getbook() {
$("#loaderIcon").show();
jQuery.ajax({
url: "get_equipment.php",
data:'bookid='+$("#bookid").val(),
type: "POST",
success:function(data){
$("#get_book_name").html(data);
$("#loaderIcon").hide();
},
error:function (){}
});
}

</script> 
<style type="text/css">
  .others{
    color:red;
}

</style>


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
          <span class="dashboard">Issue New Equipment</span>
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
<div class="col-md-10 col-sm-6 col-xs-12 col-md-offset-1">
<div class="panel panel-info">
<div class="panel-heading">
Issue a New Equipment
</div>
<div class="panel-body">
<form role="form" method="post">

<div class="form-group">
<label>Employee id<span style="color:red;">*</span></label>
<input class="form-control" type="text" name="studentid" id="studentid" onBlur="getstudent()" autocomplete="off"  required />
</div>

<div class="form-group">
<span id="get_student_name" style="font-size:16px;"></span> 
</div>





<div class="form-group">
<label>PVMS Number or Equipment Name<span style="color:red;">*</span></label>
<input class="form-control" type="text" name="booikid" id="bookid" onBlur="getbook()"  required="required" />
</div>

 <div class="form-group" id="get_book_name">

 </div>
<button type="submit" name="issue" id="submit" class="btn btn-info">Issue Equipment </button>

                                    </form>
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
    <script src="assets/js/jquery-1.10.2.js"></script>
    <!-- BOOTSTRAP SCRIPTS  -->
    <script src="assets/js/bootstrap.js"></script>
      <!-- CUSTOM SCRIPTS  -->
    <script src="assets/js/custom.js"></script>

</body>
</html>
<?php } ?>
