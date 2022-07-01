<?php
include '../../db/_db.php';

if (isset($_GET['BlogID'])) {
    $BlogID = $_GET['BlogID'];
    $sql = "DELETE FROM `blog` WHERE `BlogID` = $BlogID";
    $result = mysqli_query($con, $sql);
    if ($result) {
        echo "reload";
    }
}

if (isset($_GET['CourseID'])) {
    $CourseID = $_GET['CourseID'];
    $sql = "DELETE FROM `courses` WHERE `CourseID` = $CourseID";
    $result = mysqli_query($con, $sql);
    if ($result) {
        echo "reload";
    }
}
