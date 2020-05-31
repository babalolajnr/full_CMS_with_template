<?php ob_start(); ?>
<?php 
require_once('includes/db.php'); 
require_once('includes/functions.php');
require_once('includes/session.php'); 
require_once('includes/header.php'); 
require_once('includes/sidebar.php'); 
confirmLogin();
$_SESSION['TrackingURL'] = $_SERVER['PHP_SELF'];
$UId = $_SESSION['Userid'];
?>
<!-- code block to update info in the database -->
<?php

if(isset($_POST['Submit'])){
$dbconnection;
$UName  = $_POST['Name'];
$Uusername = $_POST['Username'];
$UHeadline  = $_POST['Headline'];
$UEmail = $_POST['Email'];
$UBio = $_POST['Bio'];
$UImage  = $_FILES['Image']['name'];
$Target = "img/admins/".basename($_FILES['Image']['name']);
$Udatetime = datentime();

if (empty($UName)) {
    $_SESSION['errorMessage'] = "Name cannot be empty";
    Redirect_to('profile.php');
}
elseif (empty($Uusername)) {
 $_SESSION['errorMessage'] = "Username cannot be empty";
 Redirect_to('profile.php');
}
elseif (empty($UHeadline)) {
    $_SESSION['errorMessage'] = "Headline cannot be empty";
    Redirect_to('profile.php');
}
elseif (empty($UEmail)) {
    $_SESSION['errorMessage'] = "Email cannot be empty";
    Redirect_to('profile.php');
}
elseif (empty($UBio)) {
    $_SESSION['errorMessage'] = "Bio cannot be empty";
    Redirect_to('profile.php');
}
else{
 // query to insert the data in to the database when there is an image to upload
 if (!empty($_FILES['Image']['tmp_name'])) {
     $dbconnection;
     $sql = "UPDATE admins SET aname='$UName', username='$Uusername', image='$Image', aemail='$UEmail',
     datetime='$Udatetime', aheadline='$UHeadline', abio='$UBio' WHERE id='$UId'";
       move_uploaded_file($_FILES['Image']['tmp_name'], $Target);
 }else{
     //query when there is no image to upload
     $dbconnection;
     $sql = "UPDATE admins SET aname='$UName', username='$Uusername', aemail='$UEmail',
     datetime='$Udatetime', aheadline='$UHeadline', abio='$UBio' WHERE id='$UId'";
     $Execute= $dbconnection->query($sql);    
 }
 if($Execute){
     $_SESSION['successMessage']= "Profile updated successfully";
     Redirect_to('profile.php');
 }else{
     $_SESSION['errorMessage']= "Something went wrong try again";
     Redirect_to('profile.php');
 }

} } 

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
            <h3 class="page-title">Profile Page</h3>
            <!-- End Page Title --> 
        </div>
        <!-- End Navbar Content Center -->

    </nav>
    <!-- End Header Navigation -->

</header>
<!-- End Header Section -->


<!-- Page Content Wrapper -->
<aside class="content-wrapper sidebarLeft">

<!-- Page Content -->
<div class="content container-fluid sidebarRight animated fadeInUp"> 
<?php
echo errorMessage();
echo successMessage();
?>
    <div class="row">
    <div class="col-sm-8 col-sm-offset-2">
                        <?php 
                            
                            $dbconnection;
                            $sql = "SELECT * FROM admins WHERE id='$UId'";
                            $stmt = $dbconnection->query($sql);
                            while($DataRows = $stmt->fetch()){
                                $AdminName = $DataRows['aname'];
                                $AdminImage = $DataRows['aimage'];
                                $AdminUserName = $DataRows['username'];
                                $AdminEmail = $DataRows['aemail'];
                                $AdminHeadline = $DataRows['aheadline'];
                                $AdminBio = $DataRows['abio'];
                            
                        ?>
                        <div class="panel panel-white profile-widget">
                            <div class="row">
                                
                                <div class="col-sm-12">
                                    <div class="image-container bg2">  
                                        <img src="img/admins/<?php echo $AdminImage; ?>" class="avatar" alt="avatar"> 
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="details">
                                        <h4><?php echo $AdminName; ?> <i class="fa fa-sheild"></i></h4>
                                        <div><?php echo $AdminHeadline; ?></div>
                                        <div>@<?php echo $AdminUserName; ?></div>
                                        
                                    </div>
                                </div>
                                 
                            </div>
                        </div>
                        
                        
                        <div class="row">
                            
                            <div class="col-sm-12">
                            <div class="panel panel-white post">
                                    <div class="post-heading">
                                        
                                        <div class="pull-left meta">
                                            <div class="title h5">
                                                <b>Bio</b></a>
                                                
                                            </div>
                                            
                                        </div>
                                    </div>
                                    
                                    <div class="post-description">
                                        
                                        <p><?php echo $AdminBio ?></p>
                                        
                                    </div>

                                </div>
                            </div>
                            
                        
                            
                        </div>
                        <?php } ?>

                        <div class="row">
                        <div class="panel panel-white">
                <div class="panel-heading">
                    <h3 class="panel-title">Edit Profile</h3>
                </div>
                <div class="panel-body">
                 
                    <form action="profile.php?id=<?php echo $UId; ?>" enctype="multipart/form-data" method="post">
                        <div class="form-group">
                            <label for="PostTitle">Name</label>
                            <input type="text" class="form-control" id="" name="Name" >
                        </div>
                        
                        <div class="form-group">
                            <label for="AuthorName">Username</label>
                            <input type="text" class="form-control" id="" name="Username">
                        </div>
                        <div class="form-group">
                            <label for="AuthorName">Headline</label>
                            <input type="text" class="form-control" id="" name="Headline">
                        </div>
                        <div class="form-group">
                            <label for="AuthorName">Email</label>
                            <input type="text" class="form-control" id="" name="Email">
                        </div>
                        <div class="form-group">
                            <label for="Image Upload">Select Image</label>
                            <div class="fallback">
                                <input name="Image" type="file" multiple />
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="Content">Bio</label>
                            <textarea name="Bio" id="" cols="80" rows="8" class="form-control"></textarea>
                        </div>
                        <button type="submit" name="Submit" class="btn btn-default">Submit</button>
                    </form>
                    </div>
                </div>
            </div>
        </div>
    </div>   
</div>
<!-- End Page Content -->

</aside>
<!-- End Page Content Wrapper -->




<?php require_once('includes/footer.php') ?>
<?php ob_flush(); ?>