<?php
session_start();
include '../../db/_db.php';
$active_status = "Offline now";
$sql = mysqli_query($con, "UPDATE users SET active_status = '{$active_status}' WHERE UserID={$_SESSION['userId']}");
session_destroy();
echo 1;
