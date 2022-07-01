<?php
    session_start();
    include_once "../../db/_db.php";

    $outgoing_id = $_SESSION['userId'];
    $searchTerm = mysqli_real_escape_string($con, $_POST['searchTerm']);

    $sql = "SELECT * FROM users WHERE NOT UserID = {$outgoing_id} AND (username LIKE '%{$searchTerm}%' OR username LIKE '%{$searchTerm}%') ";
    $output = "";
    $query = mysqli_query($con, $sql);
    if(mysqli_num_rows($query) > 0){
        include_once "data.php";
    }else{
        $output .= 'No user found related to your search term';
    }
    echo $output;
?>