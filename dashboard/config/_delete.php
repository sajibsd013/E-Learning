<?php
include '../../db/_db.php';
$db = new DB();

if (isset($_GET['CourseID'])) {
    $CourseID = $_GET['CourseID'];
    $sql = "DELETE FROM `courses` WHERE `CourseID` = $CourseID";
    $result = $db->execute($sql);
    if ($result) {
        echo "reload";
    }
}

if (isset($_GET['EnrollID'])) {
    $EnrollID = $_GET['EnrollID'];
    $sql = "DELETE FROM `enrolls` WHERE `EnrollID` = $EnrollID";
    $result = $db->execute($sql);

    if ($result) {
        echo "reload";
    }
}

if (isset($_GET['ModeratorID'])) {
    $ModeratorID = $_GET['ModeratorID'];
    $sql = "DELETE FROM `moderators` WHERE `ModeratorID` = $ModeratorID";
    $result = $db->execute($sql);

    if ($result) {
        echo "reload";
    }
}


if (isset($_GET['LessonID'])) {
    $LessonID = $_GET['LessonID'];
    $sql = "DELETE FROM `lessons` WHERE `LessonID` = $LessonID";
    $result = $db->execute($sql);

    if ($result) {
        echo "reload";
    }
}
if (isset($_GET['QuizID'])) {
    $QuizID = $_GET['QuizID'];
    $sql = "DELETE FROM `quizzes` WHERE `QuizID` = $QuizID";
    $result = $db->execute($sql);

    if ($result) {
        echo "reload";
    }
}
$db->close();
