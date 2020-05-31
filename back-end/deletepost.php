<?php ob_start(); ?>
<?php 
require_once('includes/db.php'); 
require_once('includes/functions.php');
require_once('includes/session.php'); 
confirmLogin();
$_SESSION['TrackingURL'] = $_SERVER['PHP_SELF'];
?>
<?php 
$dbconnection;
$SQP = $_GET['id'];

$sql = "SELECT * FROM posts WHERE id='$SQP'";
$stmt = $dbconnection->query($sql);
while($DataRows = $stmt->fetch()){
    $Image =$DataRows['image'];
}

$sql = "DELETE FROM posts WHERE id='$SQP'";
$Execute = $dbconnection->query($sql);
if ($Execute) {
    $pathtodeleteimage = "uploads/$Image";
    unlink($pathtodeleteimage);
    $_SESSION['successMessage'] = "Post Deleted successfully!";
    Redirect_to('posts.php');
}else{
    $_SESSION['errorMessage'] = "Something went wrong";
    Redirect_to('posts.php');
}
?>
<?php ob_flush(); ?>