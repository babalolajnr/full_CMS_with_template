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
            <h3 class="page-title">Comments</h3>
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
        <!-- Live Comments -->
        <div class="col-sm-12">
            <div class="panel panel-white"> 
                <div class="panel-heading">
                    <h3 class="panel-title">Live Comments</h3>
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
                                <th>Name</th>
                                <th>Date&Time</th>
                                
                                <th>Post</th>
                                <th>Comment</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <?php
                            $dbconnection;
                            $sql = "SELECT * FROM comments WHERE status='ON' ORDER BY id DESC";
                            $stmt = $dbconnection->query($sql);
                            $srNo = 0;
                            while($DataRows = $stmt->fetch()){
                                $Id = $DataRows['id'];
                                $Name = $DataRows['name'];
                                $DateTime = $DataRows['datetime'];
                                $Comment = $DataRows['comment'];
                                $Status = $DataRows['status'];
                                $PostId = $DataRows['post_id'];
                                $srNo++;
                            
                                    $dbconnection;
                                    $sqlp = "SELECT * FROM posts WHERE id=$PostId ";
                                    $stmtp = $dbconnection->query($sqlp);
                                    
                                    while($DataRowsp = $stmtp->fetch()){
                                        $PId = $DataRowsp['id'];
                                        $PTitle = $DataRowsp['title'];
                                        
                            
                        ?>
                        <tbody>
                            <tr>
                                <td><?php  echo $srNo; ?></td>
                                <td><?php echo $Name; ?></td>
                                <td><?php echo $DateTime; ?></td>
                                <td><?php echo $PTitle; ?></td>  
                                <td><?php echo $Comment; ?></td> 
                                <td><a href="disapproveComments.php?id=<?php echo $Id; ?>"><span><button type="button" name="Disapprove" class="btn btn-warning btn-sm">Disapprove</button></span></a>
                                <a href="deleteComments.php?id=<?php echo $Id; ?>"><span><span><button type="button" class="btn btn-danger btn-sm">Delete</button></span></span></a>
                                </td>    
                            </tr>
                        </tbody>
                            
                            <?php } }?>
                    </table>
                    
                </div>
            </div> 
               
        </div>

        <!-- Disapproved Comments -->
        <div class="col-sm-12">
            <div class="panel panel-white"> 
                <div class="panel-heading">
                    <h3 class="panel-title">Disapproved Comments</h3>
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
                                <th>Name</th>
                                <th>Date&Time</th>
                                
                                <th>Post</th>
                                <th>Comment</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <?php
                            $dbconnection;
                            $sql = "SELECT * FROM comments WHERE status='OFF' ORDER BY id DESC";
                            $stmt = $dbconnection->query($sql);
                            $srNo = 0;
                            while($DataRows = $stmt->fetch()){
                                $Id = $DataRows['id'];
                                $Name = $DataRows['name'];
                                $DateTime = $DataRows['datetime'];
                                $Comment = $DataRows['comment'];
                                $Status = $DataRows['status'];
                                $PostId = $DataRows['post_id'];
                                $srNo++;
                            
                                    $dbconnection;
                                    $sqlp = "SELECT * FROM posts WHERE id=$PostId ";
                                    $stmtp = $dbconnection->query($sqlp);
                                    
                                    while($DataRowsp = $stmtp->fetch()){
                                        $PId = $DataRowsp['id'];
                                        $PTitle = $DataRowsp['title'];
                                        
                            
                        ?>
                        <tbody>
                            <tr>
                                <td><?php  echo $srNo; ?></td>
                                <td><?php echo $Name; ?></td>
                                <td><?php echo $DateTime; ?></td>
                                <td><?php echo $PTitle; ?></td>  
                                <td><?php echo $Comment; ?></td> 
                                <td><a href="approveComments.php?id=<?php echo $Id; ?>"><span><button type="button" class="btn btn-success btn-sm">Approve</button></span></a>
                                <a href="deleteComments.php?id=<?php echo $Id; ?>"><span><span><button type="button" class="btn btn-danger btn-sm">Delete</button></span></span></a>
                                </td>    
                            </tr>
                        </tbody>
                            
                            <?php } }?>
                    </table>
                    
                </div>
            </div> 
               
        </div>


    </div>    
</div>
</aside>
<?php require_once('includes/footer.php') ?>
<?php ob_flush(); ?>