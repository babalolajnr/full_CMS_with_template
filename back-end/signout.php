<?php
require_once('includes/functions.php');
require_once('includes/session.php');
?>
<?php
$_SESSION['Userid'] = null;
$_SESSION['Aname'] = null;
$_SESSION['Username'] = null;
$_SESSION['AImage'] = null;

session_destroy();
Redirect_to('login.php');
?>