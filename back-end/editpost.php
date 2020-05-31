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
$SQP= $_GET['id'];
if(empty($SQP)){
    Redirect_to('posts.php');
}
if(isset($_POST['Submit'])){
   $PostTitle = $_POST['PostTitle'];
   $Category = $_POST['Category'];
   $Content = $_POST['Content'];
   $AuthorName = $_POST['AuthorName'];
   $Image = $_FILES['Image']['name'];
   $Target = "uploads/".basename($_FILES['Image']['name']);
   $DateTime = datentime();
   if (empty($PostTitle)) {
       $_SESSION['errorMessage'] = "Post Title cannot be empty";
       Redirect_to('editpost.php');
   }
   elseif (empty($Content)) {
    $_SESSION['errorMessage'] = "Content cannot be empty";
    Redirect_to('editpost.php');
   }
    elseif (strlen($Content)<50) {
    $_SESSION['errorMessage'] = "Content should be greater than 50 characters";
    Redirect_to('editpost.php');
   }
 else{
    // query to insert the data in to the database when there is an image to upload
    if (!empty($_FILES['Image']['tmp_name'])) {
        $dbconnection;
        $sql = "UPDATE posts SET title='$PostTitle', category='$Category', image='$Image', author='$AuthorName',
        content='$Content' WHERE id='$SQP'";
          move_uploaded_file($_FILES['Image']['tmp_name'], $Target);
    }else{
        //query when there is no image to upload
        $dbconnection;
        $sql = "UPDATE posts SET title='$PostTitle', category='$Category', author='$AuthorName',
            content='$Content' WHERE id='$SQP'";
        $Execute= $dbconnection->query($sql);    
    }
    if($Execute){
        $_SESSION['successMessage']= "Post updated successfully";
        Redirect_to('posts.php');
    }else{
        $_SESSION['errorMessage']= "Something went wrong try again";
        Redirect_to('editpost.php');
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
            <h3 class="page-title">Edit Post</h3>
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
                    <h3 class="panel-title">Edit Post</h3>
                </div>
                <div class="panel-body">
                  <?php
                  echo errorMessage();
                  echo successMessage();
                  ?>
                  <?php 
                  $dbconnection;
                  $sql = "SELECT * FROM posts where id='$SQP'";
                  $stmt=$dbconnection->query($sql);
                  while($DataRows=$stmt->fetch()){
                    $EPostTitle = $DataRows['title'];
                    $ECategory = $DataRows['category'];
                    $EContent = $DataRows['content'];
                    $EAuthorName = $DataRows['author'];
                    $EImage = $DataRows['image'];
                  }
                  ?>
                    <form action="editpost.php?id=<?php echo $SQP; ?>" enctype="multipart/form-data" method="post">
                        <div class="form-group">
                            <label for="PostTitle">Post Title</label>
                            <input type="text" class="form-control" id="" name="PostTitle" value="<?php echo $EPostTitle; ?>">
                        </div>
                        <div class="form-group">
                            <label for="Category">Category</label>
                            <select class="form-control mg-btm-10" name="Category" value="<?php echo $ECategory; ?>">
                                <option>1</option>
                                <option>2</option>
                                <option>3</option>
                                <option>4</option>
                                <option>5</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <img src="uploads/<?php echo $EImage; ?>" height="150px" width="150px" alt=""><br>
                            <label for="Image Upload">Select Image</label>
                            <div class="fallback">
                                <input name="Image" type="file" multiple />
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="AuthorName">Author's Name</label>
                            <input type="text" class="form-control" id="" name="AuthorName" value="<?php echo $EAuthorName; ?>">
                        </div>
                        <div class="form-group">
                            <label for="Content">Content</label>
                            <textarea name="Content" id="" cols="80" rows="8" class="form-control"><?php echo $EContent; ?></textarea>
                        </div>
                        <button type="submit" name="Submit" class="btn btn-default">Submit</button>
                    </form>
                </div>
            </div>
        </div>

    </div>    
</div>
</aside>
<?php require_once('includes/footer.php') ?>
<?php ob_flush(); ?>