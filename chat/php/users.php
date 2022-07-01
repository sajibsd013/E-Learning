<?php
    session_start();
    // include_once "config.php";
    include_once "../../db/_db.php";
    $outgoing_id = $_SESSION['userId'];
    $sql = "SELECT * FROM users WHERE NOT UserID = {$outgoing_id} ORDER BY UserID DESC";
    $query = mysqli_query($con, $sql);
    $output = "";
    if(mysqli_num_rows($query) == 0){
        $output .= "No users are available to chat";
    }elseif(mysqli_num_rows($query) > 0){
        include_once "data.php";
    }
    echo $output;
?>