<?php
session_start();

include '../../db/_db.php';

$db = new DB();

$user_id =  $_SESSION['userId'];

if (isset($_POST['name'])) {
    $username = $_POST['name'];
    $birthday = $_POST['birthday'];
    $mobile = $_POST['mobile'];

    $sql = "UPDATE `users` SET `username` = '$username', `dob` = '$birthday', `mobile` = '$mobile'  WHERE `UserID` =$user_id";
    $result = $db->execute($sql);
    if ($result) {
        $_SESSION["userName"] =  $username;
        $_SESSION["birthday"] =   $birthday;
        $_SESSION["mobile"] =   $mobile;
        echo "success";
    }
}

if (isset($_GET['delete'])) {
    $userid = $_GET['delete'];
    $sql = "DELETE FROM `users` WHERE `UserID` = $userid";
    $result = $db->execute($sql);
    session_destroy();
    echo "redirect-home";
}
if (isset($_GET['deactivete'])) {
    $userid = $_GET['deactivete'];
    $sql = "UPDATE `users` SET `status` = 'deactivete' WHERE `UserID` =$userid";
    $result = $db->execute($sql);

    $sql1 = "SELECT * FROM `blog` WHERE `UserID`='$userid' AND `status`='approved'";
    $rows = $db->execute($sql1);
    foreach ($rows2 as $row) {
        $BlogID = $row['BlogID'];
        $sql2 = "UPDATE `blog` SET `status` = 'hidden' WHERE `BlogID`=$BlogID";
        $result2 = $db->execute($sql2);
    }
    session_destroy();
    echo "redirect-home";
}
