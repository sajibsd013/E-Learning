<?php
session_start();
include '../../db/_db.php';
$db = new DB();


if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] == true) {
    $user_id = $_SESSION["userId"];
    if (isset($_POST['reply'])) {
        $reply = $_POST['reply'];
        $CommentID = $_POST['CommentID'];
        $sql = "INSERT INTO `reply` (`reply_content`, `CommentID`, `UserID`) VALUES('$reply','$CommentID','$user_id')";
        $result = $db->execute($sql);
        if ($result) {
            echo 1;
        }
    }
}

$db->close();
