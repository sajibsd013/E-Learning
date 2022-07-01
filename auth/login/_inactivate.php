<?php
session_start();

include '../../db/_db.php';
// $db = new Database();

if(isset($_GET['email'])){
	$email=$_GET['email'];

    $updatequery="UPDATE `users` SET `status`='inactive' where `email`='$email'";
    $query= mysqli_query($con,$updatequery);

}

?>