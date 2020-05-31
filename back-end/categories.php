<?php ob_start(); ?>
<?php 
require_once('includes/db.php'); 
require_once('includes/functions.php');
require_once('includes/session.php'); 
require_once('includes/header.php'); 
require_once('includes/sidebar.php'); 
confirmLogin();
$_SESSION['TrackingURL'] = $_SERVER['PHP_SELF']; 
?>
<?php
if(isset($_POST['Submit'])){
   $AuthorName = $_SESSION['Aname'];
   $Category = $_POST['Category'];
   $DateTime = datentime();

   $dbconnection;
   $sql = "INSERT INTO categories(CName,CAuthor,datetime) VALUES(:CAtegory,:CAuthoR,:DATEtime)";
   $stmt = $dbconnection->prepare($sql);
   $stmt->bindValue(':CAtegory',$Category);
   $stmt->bindValue(':CAuthoR',$AuthorName);
   $stmt->bindValue(':DATEtime',$DateTime);
   $Execute= $stmt->execute();
   if($Execute){
       $_SESSION['successMessage'] = $Category." Added Successfully";
       Redirect_to('categories.php');
   }else{
        $_SESSION['errorMessage'] = "Something went wrong Try again!";
        Redirect_to('categories.php');
   }
}
?>

<body class="header-fixed skin-blue">

<!-- Header Section -->
<header>

    <!-- Product Logo -->
    <a href="javascript:void(0);" class="logo hidden-xs">
        <span class="icon">
            <i class="fa fa-cube"></i>
        </span>
        Curo
    </a>
    <!-- End Product Logo -->

    <!-- Header Navigation -->
    <nav class="navbar-main" role="navigation">

        <!-- Left Button Container -->
        <ul class="button-container pull-left">

            <li class="item">
                <!-- Left Sidebar Toggle Button -->
                <a id="sidebarLeftToggle" class="nav-button" data-toggle="collapse" data-target=".sidebarLeft">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="fa fa-bars"></span> 
                </a> 
            </li>

        </ul>
        <!-- End Left Button Container -->

        <!-- Navbar Content Center -->
        <div class="nav-content">
            <!-- Page Title -->
            <h3 class="page-title">Categories</h3>
            <!-- End Page Title --> 
        </div>
        <!-- End Navbar Content Center -->

    </nav>
    <!-- End Header Navigation -->

</header>
<!-- End Header Section -->

 <!-- Page Content Wrapper -->
 <aside class="content-wrapper collapse sidebarLeft">

<!-- Page Content -->
<div class="content container-fluid sidebarRight animated fadeInUp mail message-list-wrapper"> 
    <div class="row">
        <div class="col-sm-12">
        <?php
            echo errorMessage();
            echo successMessage();
        ?>
            <div class="panel panel-white">
                <div class="panel-heading">
                    <h3 class="panel-title">Add New Category</h3>
                </div>
                <div class="panel-body">
                  
                    <form action="categories.php" method="post">
                        <div class="form-group">
                            <label for="PostTitle">Add New Category</label>
                            <input type="text" class="form-control" id="" name="Category" placeholder="Enter New Category">
                        </div>
                        <button type="submit" name="Submit" class="btn btn-default">Submit</button>
                    </form>
                </div>
            </div>
            <div class="panel panel-white"> 
                <div class="panel-heading">
                    <h3 class="panel-title">Posts</h3>
                </div>
                <div class="panel-body">
                <?php
                  echo errorMessage();
                  echo successMessage();
                  ?> 
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Category Name</th>
                                <th>Author</th>
                                <th>Date&Time</th>
                                <th>Action</th>
                                
                            </tr>
                        </thead>
                        <?php
                            $dbconnection;
                            $sql = "SELECT * FROM categories";
                            $stmt = $dbconnection->query($sql);
                            $srNo = 0;
                            while($DataRows = $stmt->fetch()){
                                $Id = $DataRows['Cid'];
                                $CName = $DataRows['CName'];
                                $CAuthor = $DataRows['CAuthor'];
                                $DateTime = $DataRows['datetime'];
                                $srNo++;
                            
                        ?>
                        <tbody>
                            <tr>
                                <td><?php echo $srNo; ?></td>
                                <td><?php echo $CName; ?>
                                </td>
                                <td><?php echo $CAuthor; ?></td>
                                <td><?php 
                                    echo $DateTime; ?>
                                </td>
                                <td><button type="button" class="btn btn-danger btn-sm">Delete</button></td>
                            </tr>
                        </tbody>
                            
                            <?php } ?>
                    </table>
                    
                </div>
            </div> 
            
        </div>

    </div>    
</div>
</aside>
<?php require_once('includes/footer.php'); ?>
<?php ob_flush(); ?>