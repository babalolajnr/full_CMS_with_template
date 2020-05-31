<?php

//function to count the number of approved comments by post
function approvedCommentsPerPost($PostID){
    global $dbconnection;
    $sql = "SELECT COUNT(*) FROM comments WHERE  post_id='$PostID' AND status='ON'";
    $stmt = $dbconnection->query($sql);
    $TotalRows = $stmt->fetch();
    $TotalApprovedCommentsPerPost = array_shift($TotalRows);
    return $TotalApprovedCommentsPerPost;
}

?>