<?php ob_start(); ?>
<?php 
require_once('includes/db.php'); 
require_once('includes/functions.php');
require_once('includes/session.php'); 
require_once('includes/header.php'); 
 ?>
 <?php
 if (isset($_POST['Submit'])) {
     $Name = $_POST['Name'];
     $Username = $_POST['Username'];
     $Email = $_POST['Email'];
     $Password = $_POST['Password'];
     $RePassword = $_POST['RePassword'];
     $DateTime = datentime();
     $Image = $_FILES['Image']['name'];
     $Target = "img\admins/".basename($_FILES['Image']['name']);
     $Admin = "Ironman";
     if(empty($Name)) {
         $_SESSION['errorMessage'] = "Enter your name!";
         Redirect_to('register.php');
     }elseif(empty($Username)){
        $_SESSION['errorMessage'] = "Enter Username!";
        Redirect_to('register.php');
     }elseif(verifyUsername($Username)){
        $_SESSION['errorMessage'] = "Username has been chosen by another User. Try another one!";
        Redirect_to('register.php');
     }elseif(empty($Email)){
        $_SESSION['errorMessage'] = "Enter Email!";
        Redirect_to('register.php');
     }elseif(empty($Password)){
        $_SESSION['errorMessage'] = "Enter password!";
        Redirect_to('register.php');
     }elseif(empty($RePassword)){
        $_SESSION['errorMessage'] = "Re-enter password!";
        Redirect_to('register.php');
     }elseif(empty($Image)){
        $_SESSION['errorMessage'] = "Upload a Profile Picture!";
        Redirect_to('register.php');
     }elseif($Password !== $RePassword){
        $_SESSION['errorMessage'] = "Passwords do not match!";
        Redirect_to('register.php');
     }else{
         $dbconnection;
         $sql ="INSERT INTO admins(aname,aimage,username,aemail,password,datetime,addedby)";
         $sql .="VALUES(:anaMe,:aImage,:usernamE,:aemaIl,:passwoRd,:daTeTime,:addEDby)";
         $stmt = $dbconnection->prepare($sql);
         $stmt->bindValue(':anaMe', $Name);
         $stmt->bindValue(':aImage', $Image);
         $stmt->bindValue(':usernamE', $Username);
         $stmt->bindValue(':aemaIl', $Email);
         $stmt->bindValue(':passwoRd', $Password);
         $stmt->bindValue(':daTeTime', $DateTime);
         $stmt->bindValue(':addEDby', $Admin);
         $Execute = $stmt->execute();
         move_uploaded_file($_FILES['Image']['tmp_name'], $Target);

         if ($Execute) {
            $_SESSION['successMessage'] = "Registration of ".$Name." successful!";
            Redirect_to('login.php');
         }else{
            $_SESSION['errorMessage'] = "Something went wrong. Try again!"; 
            Redirect_to('register.php');
         }
         
         
     }
 }
 ?>
    <body class="register">

        <div class="container">

            <div class="row">  

                <div class="col-sm-6 col-sm-offset-3 col-md-4 col-md-offset-4">

                    <div class="form-container">
                        <div class="top-wrapper">
                            <div class="avatar-container">
                                <img src="img\avatar-png-2.png" id="avatar" class="avatar animated bounceIn" alt="avatar">
                            </div> 
                        </div>
                        <div class="bottom-wrapper">
                            <?php
                            echo errorMessage();
                            echo successMessage();
                            ?>
                            <form id="register-form" class="register-form" role="form" action="register.php" enctype="multipart/form-data" method="post">
                                <div class="form-group has-feedback">
                                    <input type="text" class="form-control" name="Name" placeholder="Enter your name">
                                    <span class="fa fa-user form-control-feedback"></span>
                                </div>
                                <div class="form-group has-feedback">
                                    <input type="text" class="form-control" name="Username" placeholder="Enter Username">
                                    <span class="fa fa-user form-control-feedback"></span>
                                </div>
                               
                                <div class="form-group has-feedback">
                                    <input type="text" class="form-control" name="Email" placeholder="Enter email address">
                                    <span class="fa fa-send form-control-feedback"></span>
                                </div>
                                <div class="form-group">
                                       <label for="exampleInputFile">Upload a Profile Picture</label>
                                       <input type="file" name="Image" id="exampleInputFile">
                                    
                                </div>
                                <div class="form-group has-feedback">
                                    <input type="password" class="form-control" name="Password" placeholder="Enter password">
                                    <span class="fa fa-unlock-alt form-control-feedback"></span>
                                </div>
                                <div class="form-group has-feedback">
                                    <input type="password" class="form-control" name="RePassword" placeholder="Re-enter password">
                                    <span class="fa fa-unlock-alt form-control-feedback"></span>
                                </div> 
                                <div class="form-group">
                                    <button type="submit" name="Submit" class="btn btn-green btn-block">REGISTER</button>
                                </div>
                                <div class="form-group">
                                    <hr>
                                </div>
                                <div class="form-group text-center"> 
                                    <div><a href="#">Forget your password?</a></div>
                                    <div><a href="login.php">Already have an account</a></div>
                                </div>
                                <div class="form-group">
                                    <hr>
                                </div>
                               
                            </form>
                        </div>
                    </div>

                </div>

            </div>

        </div>


<?php require_once('includes/footer.php') ?>
<?php ob_flush(); ?>