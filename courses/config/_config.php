<?php
session_start();
include '../../db/_db.php';
$UserID = $_SESSION['userId'];
$db = new DB();


if (isset($_GET['lsn_set_atm'])) {
    $LessonID = $_GET['lsn_set_atm'];
    $sql = "INSERT INTO `attempts` (`UserID`, `LessonID`) VALUES ('$UserID','$LessonID')";
    $result = $db->execute($sql);
}

if (isset($_GET['unlock_next'])) {
    $LessonID = $_GET['unlock_next'];
    $sql = "INSERT INTO `lesson_status` (`UserID`, `LessonID`) VALUES ('$UserID','$LessonID')";
    $result = $db->execute($sql);
}


if (isset($_GET['lsn_get_atm'])) {
    $LessonID = $_GET['lsn_get_atm'];
    $sql = "SELECT `id` FROM `attempts` WHERE `UserID`='$UserID' AND `LessonID`='$LessonID'";
    $count = $db->getCount($sql);
    if ($count) {
        echo $count;
    } else {
        echo 0;
    }
}

if (isset($_GET['points'])) {
    $points = $_GET['points'];
    $CourseID = $_GET['CourseID'];

    $sql = "SELECT `points` FROM `enrolls` WHERE `StudentID` = '$UserID' AND `CourseID` = '$CourseID' ";
    $row = $db->getRow($sql);

    $point = $row['points'];
    $total_point = $points + $point;

    $sql = "UPDATE `enrolls` SET `points` = '$total_point' WHERE `StudentID` = '$UserID' AND `CourseID` = '$CourseID' ";
    $result = $db->execute($sql);
    echo $total_point;
}

$db->close();