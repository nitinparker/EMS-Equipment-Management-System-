<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['login'])==0)
{   
    header('location:index.php');
}
else
{ 
    if(isset($_GET['query'])) {
        $searchTerm = $_GET['query'];
        $sql = "SELECT tblbooks.BookName,tblcategory.CategoryName,tblauthors.AuthorName,tblbooks.ISBNNumber,tblbooks.BookPrice,tblbooks.id as bookid,tblbooks.bookImage,tblbooks.isIssued FROM tblbooks JOIN tblcategory ON tblcategory.id=tblbooks.CatId JOIN tblauthors ON tblauthors.id=tblbooks.AuthorId WHERE tblbooks.BookName LIKE '%$searchTerm%' OR tblcategory.CategoryName LIKE '%$searchTerm%' OR tblauthors.AuthorName LIKE '%$searchTerm%'";
    } else {
        $sql = "SELECT tblbooks.BookName,tblcategory.CategoryName,tblauthors.AuthorName,tblbooks.ISBNNumber,tblbooks.BookPrice,tblbooks.id as bookid,tblbooks.bookImage,tblbooks.isIssued FROM tblbooks JOIN tblcategory ON tblcategory.id=tblbooks.CatId JOIN tblauthors ON tblauthors.id=tblbooks.AuthorId";
    }
    $query = $dbh->prepare($sql);
    $query->execute();
    $results = $query->fetchAll(PDO::FETCH_OBJ);
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta charset="UTF-8" />
    <title>Equipment Management System | User Profile</title>

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
          <span class="dashboard">Available Equipments</span>
        </div>
        <div class="search-box">
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="GET" id="searchForm">
      
        <input type="text" name="query" placeholder="Browse Equipments..." id="autocomplete-input" />
        <button type="submit"><i class="bx bx-search"></i></button>
      
    </form>
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
<!-- MENU SECTION END-->
    <div class="content-wrapper">
         <div class="container">
        <div class="row pad-botm">
            <div class="col-md-12">
                <h4 class="header-line">Manage Issued Equipments</h4>
    </div>
    

            <div class="row">
                <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                          Issued Equipment 
                        </div>
                        <div class="panel-body">
    <?php
    $cnt = 1;
    if ($query->rowCount() > 0) {
        foreach ($results as $result) {
            ?>  
            <div class="col-md-4" style="float:left; height:300px;">   
                <img src="admin/bookimg/<?php echo htmlentities($result->bookImage);?>" width="100">
                <br /><b><?php echo htmlentities($result->BookName);?></b><br />
                <?php echo htmlentities($result->CategoryName);?><br />
                <?php echo htmlentities($result->AuthorName);?><br />
                <?php echo htmlentities($result->ISBNNumber);?><br />
                <?php if($result->isIssued=='1'): ?>
                    <p style="color:red;">Equipment Already issued</p>
                <?php endif;?>
            </div>
            <?php $cnt = $cnt + 1;
        }
    } else {
        echo "No results found.";
    }
    ?>  
</div>
                    <!--End Advanced Tables -->
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
<?php include('chatbotv1.0/chatbot.php');?>
<!-- CONTENT-WRAPPER SECTION END-->
<?php include('includes/footer.php');?>

<script src="chatbotv1.0/assets/script/core.js"></script>
<script src="chatbotv1.0/assets/script/script.js"></script>
<!-- FOOTER SECTION END-->
<script src="assets/js/jquery-1.10.2.js"></script>
<!-- BOOTSTRAP SCRIPTS  -->
<script src="assets/js/bootstrap.js"></script>
<!-- DATATABLE SCRIPTS  -->
<script src="assets/js/dataTables/jquery.dataTables.js"></script>
<script src="assets/js/dataTables/dataTables.bootstrap.js"></script>
<!-- CUSTOM SCRIPTS  -->
<script src="assets/js/custom.js"></script>

</body>
</html>
<?php } ?>