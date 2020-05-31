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
<?php
$SQP = $_GET['id'];
$dbconnection;
$sql = "UPDATE comments SET status='ON' WHERE id='$SQP' ";
$Execute = $dbconnection->query($sql);

if($Execute){
    $_SESSION['successMessage'] = "Comment ".$SQP." Approved";
    Redirect_to('comments.php');
}else{
    $_SESSION['errorMessage'] = "Error occured. Try again";
    Redirect_to('comments.php');
}

?>