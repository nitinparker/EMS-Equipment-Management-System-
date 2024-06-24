<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['login'])==0)
  { 
header('location:index.php');
}
else{
  $sid=$_SESSION['stdid'];
  $sql="SELECT FullName FROM tblstudents WHERE StudentId=:sid";
  $query = $dbh->prepare($sql);
  $query->bindParam(':sid',$sid,PDO::PARAM_STR);
  $query->execute();
  $student = $query->fetch(PDO::FETCH_ASSOC);
  ?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta charset="UTF-8" />
    <title>Equipment Management System | Dashboard</title>

    <link href="chatbotv1.0/assets/style/core.css" rel="stylesheet" />
    <link href="chatbotv1.0/assets/style/style.css" rel="stylesheet" />
    
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
      <!------MENU SECTION START-->
      <?php include('includes/header.php');?>
<section class="home-section">
      <nav>
        <div class="sidebar-button">
          <i class="bx bx-menu sidebarBtn"></i>
          <span class="dashboard">Welcome, <?php echo $student['FullName']; ?></span>
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
             
             <div class="row">


<a href="listed-equipment.php">
<div class="col-md-4 col-sm-4 col-xs-6">
 <div class="alert alert-success back-widget-set text-center">
 <i class="fa fa-book fa-5x"></i>
<?php 
$sql ="SELECT id from tblbooks ";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$listdbooks=$query->rowCount();
?>
<h3><?php echo htmlentities($listdbooks);?></h3>
Equipment Listed
</div></div></a>
             
               <div class="col-md-4 col-sm-4 col-xs-6">
                      <div class="alert alert-warning back-widget-set text-center">
                            <i class="fa fa-recycle fa-5x"></i>
<?php 
$rsts=0;
 $sid=$_SESSION['stdid'];
$sql2 ="SELECT id from tblissuedbookdetails where StudentID=:sid and (RetrunStatus=:rsts || RetrunStatus is null || RetrunStatus='')";
$query2 = $dbh -> prepare($sql2);
$query2->bindParam(':sid',$sid,PDO::PARAM_STR);
$query2->bindParam(':rsts',$rsts,PDO::PARAM_STR);
$query2->execute();
$results2=$query2->fetchAll(PDO::FETCH_OBJ);
$returnedbooks=$query2->rowCount();
?>

                            <h3><?php echo htmlentities($returnedbooks);?></h3>
                          Equipment Not Returned Yet
                        </div>
                    </div>

<a href="issued-equipment.php">
<div class="col-md-4 col-sm-4 col-xs-6">
 <div class="alert alert-success back-widget-set text-center">
 <i class="fa fa-book fa-5x"></i>
      <h3>&nbsp;</h3>
Issued Equipment
</div></div></a>





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
    <?php include('chatbotv1.0/chatbot.php');?>
     <!-- CONTENT-WRAPPER SECTION END-->
 <?php include('includes/footer.php');?>

 <script src="chatbotv1.0/assets/script/core.js"></script>
 <script src="chatbotv1.0/assets/script/script.js"></script>
      <!-- FOOTER SECTION END-->
    <script src="assets/js/jquery-1.10.2.js"></script>
    <!-- BOOTSTRAP SCRIPTS  -->
    <script src="assets/js/bootstrap.js"></script>
      <!-- CUSTOM SCRIPTS  -->
    <script src="assets/js/custom.js"></script>
</body>
</html>
<?php } ?>
