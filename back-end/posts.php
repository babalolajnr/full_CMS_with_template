<?php ob_start(); ?>
<?php 
require_once('includes/db.php'); 
require_once('includes/functions.php');
require_once('includes/session.php'); 
require_once('includes/header.php'); 
require_once('includes/sidebar.php'); 
?>
<?php
confirmLogin();
$_SESSION['TrackingURL'] = $_SERVER['PHP_SELF'];

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
            <h3 class="page-title">Posts</h3>
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
                                <th>Title</th>
                                <th>Category</th>
                                <th>Date&Time</th>
                                <th>Author</th>
                                <th>Image</th>
                                <th>Comments</th>
                                <th>Action</th>
                                <th>Live Preview</th>
                            </tr>
                        </thead>
                        <?php
                            $dbconnection;
                            $sql = "SELECT * FROM posts ORDER BY id DESC";
                            $stmt = $dbconnection->query($sql);
                            $srNo = 0;
                            while($DataRows = $stmt->fetch()){
                                $Id = $DataRows['id'];
                                $Title = $DataRows['title'];
                                $DateTime = $DataRows['datetime'];
                                $Category = $DataRows['category'];
                                $Author = $DataRows['author'];
                                $Image = $DataRows['image'];
                                $Content = $DataRows['content'];
                                $srNo++;
                            
                        ?>
                        <tbody>
                            <tr>
                                <td><?php echo $srNo; ?></td>
                                <td><?php 
                                    if(strlen($Title)>20){
                                        $Title= substr($Title,0,20);
                                    }
                                    echo $Title; ?>
                                </td>
                                <td><?php echo $Category; ?></td>
                                <td><?php 
                                    echo $DateTime; ?>
                                </td>
                                
                                <td><?php echo $Author; ?></td>
                                <td><img src="uploads/<?php echo $Image; ?>" alt=""  width="170px;" height="100px;"></td>
                                <td>Comments</td>
                                <td><a href="editpost.php?id=<?php echo $Id; ?>"><span><button type="button" class="btn btn-warning btn-sm">Edit</button></span></a>
                                   <span><a href="deletepost.php?id=<?php echo $Id; ?>"><span><button type="button" class="btn btn-danger btn-sm">Delete</button></span></a></span> 
                                

                                </td>
                                <td><a href="../front-end/blog-post.php?id=<?php echo $Id; ?>" target="_blank"><button type="button" class="btn btn-info btn-sm">Live Preview</button></td></a>
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
<?php require_once('includes/footer.php') ?>
<?php ob_flush(); ?>