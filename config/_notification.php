<?php
session_start();
include '../db/_db.php';
$db = new DB();

if (isset($_GET['clear'])) {
    $UserID = $_SESSION['userId'];
    $sql = "UPDATE `notifications` SET  `status`=1 where `n_to`='$UserID' ";
    $db->execute($sql);
}
if (isset($_GET['delete'])) {
    $UserID = $_SESSION['userId'];
    $sql = "DELETE FROM `notifications` WHERE `n_to` = $UserID";
    $db->execute($sql);
    echo "reload";
}
$db->close();

