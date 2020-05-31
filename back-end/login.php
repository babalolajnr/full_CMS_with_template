<?php 
require_once('includes/db.php'); 
require_once('includes/functions.php');
require_once('includes/session.php'); 
require_once('includes/header.php');  
?>

<?php
// if an account is already logged in
if(isset($_SESSION['Userid'])){
    Redirect_to('Dashboard.php');
}


if(isset($_POST['Submit'])){
    $Username = $_POST['Username'];
    $Password = $_POST['Password'];

    // Verification for when any of the fields is empty
    if(empty($Username||$Password)){
        $_SESSION['errorMessage'] = "All fields must be field out";
        Redirect_to('login.php');
    }else{
        // code for checking username and password existence in database
        $foundAccount = login_attempt($Username,$Password);
        if($foundAccount){
            $_SESSION['Userid'] = $foundAccount['id'];
            $_SESSION['Aname'] = $foundAccount['aname'];
            $_SESSION['Username'] = $foundAccount['username'];
            $_SESSION['AImage'] = $foundAccount['aimage'];
            $_SESSION['successMessage'] = "Welcome ".$_SESSION['Aname'];
            if(isset($_SESSION['TrackingURL'])){
                // when the user has tried to enter a link that requires login before logging in
                 Redirect_to($_SESSION['TrackingURL']);
                
            }else{
                Redirect_to('dashboard.php');
            }
            

        }else{
            $_SESSION['errorMessage'] = "Username/Password does not exist";
        }
    }
}

?>
    <body class="login">
  
        <div class="container">
        
            <div class="row">  
            <?php
                echo errorMessage();
                echo successMessage();
            ?>
                <div class="col-sm-6 col-sm-offset-3 col-md-4 col-md-offset-4">
                
                    <div class="form-container">
                        <div class="top-wrapper">
                            <div class="avatar-container">
                                <img src="assets/img/people/1.jpg" id="avatar" class="avatar animated bounceIn" alt="avatar">
                            </div> 
                        </div>
                        <div class="bottom-wrapper">
                            <form id="login-form" class="login-form" role="form" action="login.php" method="POST">
                                <div class="form-group has-feedback">
                                    <input type="text" class="form-control" name="Username" placeholder="Enter username" autofocus="">
                                    <span class="fa fa-user form-control-feedback"></span>
                                </div>
                                <div class="form-group has-feedback">
                                    <input type="password" name="Password" class="form-control" placeholder="Enter password">
                                    <span class="fa fa-unlock-alt form-control-feedback"></span>
                                </div>
                                <!-- <div class="form-group">
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox"> Remember me
                                        </label>
                                    </div>
                                </div> -->
                                <div class="form-group">
                                    <button type="submit" name="Submit" class="btn btn-green btn-block">LOGIN</button>
                                </div>
                                <div class="form-group">
                                    <hr>
                                </div>
                                <div class="form-group text-center"> 
                                    
                                    <div><a href="register.php">Create an account</a></div>
                                </div>
                                <div class="form-group">
                                    <hr>
                                </div>
                                <!-- <div class="form-group">
                                    <button type="submit" class="btn btn-primary btn-block"><i class="fa fa-facebook"></i> login Facebook</button>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-red btn-block"><i class="fa fa-google"></i> login with Google</button>
                                </div> -->
                            </form>
                        </div>
                    </div>
                    
                </div>
                
            </div>
            
        </div>
<?php require_once('includes/footer.php'); ?>