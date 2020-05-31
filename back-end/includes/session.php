<?php

session_start();

function errorMessage(){
    if(isset($_SESSION['errorMessage'])){
        $Output = "<div class=\"alert alert-block alert-danger fade in mg-btm-0\">";
        $Output .="<button type=\"button\" class=\"close close-sm\" data-dismiss=\"alert\">";
        $Output .= "<i class=\"fa fa-times\"></i></button>"; 
        $Output .= "<strong>";  
        $Output .= htmlentities($_SESSION['errorMessage']);
        $Output .= "</strong></div>";
        $_SESSION['errorMessage'] = null; 
        return $Output;
    }
}

function successMessage(){
    if(isset($_SESSION['successMessage'])){
        $Output = "<div class=\"alert alert-block alert-success fade in \">";
        $Output .="<button type=\"button\" class=\"close close-sm\" data-dismiss=\"alert\">";
        $Output .= "<i class=\"fa fa-times\"></i></button>"; 
        $Output .= "<strong>";  
        $Output .= htmlentities($_SESSION['successMessage']);
        $Output .= "</strong></div>";
        $_SESSION['successMessage'] = null;
        return $Output;
    }
}

?>