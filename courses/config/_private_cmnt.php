<?php
session_start();
include '../../db/_db.php';
$db = new DB();
$UserID = $_SESSION["userId"];
if (isset($_POST['private_comment'])) {
    $comment_content = $_POST['private_comment'];
    $LessonNo = $_POST['LessonNo'];
    $LessonID = $_POST['LessonID'];
    $CourseID = $_POST['CourseID'];
    $sql = "INSERT INTO `comments` (`comment_content`, `LessonID`, `UserID`) VALUES('$comment_content','$LessonID','$UserID')";
    $result = $db->execute($sql);
    if ($result) {
        $sql_b = "SELECT `TeacherID` FROM `courses` WHERE `CourseID`=" . $CourseID;
        $rows = $db->execute($sql_b);
        foreach ($rows as $row) {
            $user_name = $_SESSION['userName'];
            $content = "<b>" . $user_name . "</b> commented on your lesson";
            $path = "/courses/content.php?course=$CourseID&lesson=$LessonNo";
            $n_to = $row['TeacherID'];
            $notification = new Notification($content, $n_to, $path);
        }

        echo "reload";
    }
}
$db->close();
