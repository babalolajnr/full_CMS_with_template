<?php include('includes/db.php'); ?>
<?php
// Redirection function
function Redirect_to($New_Location){
    header("Location:". $New_Location);
    exit;
}

// Time and Date function
function datentime(){
    date_default_timezone_set("Africa/Lagos");
    $CurrentTime = time();
    $DateTime = strftime("%B-%d-%Y %H:%M:%S", $CurrentTime);
    return $DateTime;
}

//Login processing function
function login_attempt($Username,$Password){
    global $dbconnection;
    $sql = "SELECT * FROM admins WHERE username=:UserNamE AND password=:PaSSword LIMIT 1";
    $stmt = $dbconnection->prepare($sql);
    $stmt->bindValue(':UserNamE', $Username);
    $stmt->bindValue(':PaSSword', $Password);
    $stmt->execute();
    $Result = $stmt->rowCount();
    if($Result==1){
        return $foundAccount = $stmt->fetch();
    }else{
        return null;
    }
     
}

//function to confirm user login
function confirmLogin(){
    if(isset($_SESSION['Userid'])){
        return true;
    }else{
        $_SESSION['errorMessage'] = "Login Required !";
        Redirect_to('login.php');
    }
}

//function to check username existence
function verifyUsername($Username){
    global $dbconnection;
    $sql = "SELECT username FROM admins WHERE username=:UserNaMe";
    $stmt=$dbconnection->prepare($sql);
    $stmt->bindValue(':UserNaMe', $Username);
    $stmt->execute();
    $Verify = $stmt->rowCount();
    if($Verify == 1){
        return true;
    }else{
        return false;
    }
}


?>