<?php

include '../../db/_db.php';
$db = new DB();

if (isset($_POST['CourseID'])) {
    $CourseID = $_POST['CourseID'];
    $course_title = $_POST['course_title'];
    $course_Description = $_POST['course_Description'];
    $price = $_POST['price'];
    $sql = "UPDATE `courses` SET `course_title` = '$course_title', `course_Description` = '$course_Description', `price` = '$price'  WHERE `CourseID` = $CourseID";
    $result = $db->execute($sql);
    if ($result) {
        $dataset = array("status" => "success", "path" => "/dashboard/courses/");
        $dataJSON = json_encode($dataset);
        echo $dataJSON;
    }
}

if (isset($_POST['LessonID'])) {
    $CourseID = $_POST['course'];
    $LessonID = $_POST['LessonID'];
    $title = $_POST['title'];
    $LessonNo = $_POST['LessonNo'];
    $content = $_POST['content'];
    $sql = "UPDATE `lessons` SET `LessonNo`='$LessonNo', `title` = '$title', `content` = '$content' WHERE `LessonID` = $LessonID";
    $result = $db->execute($sql);
    if ($result) {
        $dataset = array("status" => "success", "path" => "/dashboard/course/?id=" . $CourseID . "&q=lesson");
        $dataJSON = json_encode($dataset);
        echo $dataJSON;
    }
}
if (isset($_POST['QuizID'])) {
    $QuizID = $_POST['QuizID'];
    $ques = $_POST['ques'];
    $a = $_POST['a'];
    $b = $_POST['b'];
    $c = $_POST['c'];
    $d = $_POST['d'];
    $ans = $_POST['ans'];

    $sql = "UPDATE `quizzes` SET `ques`='$ques', `a` = '$a', `b` = '$b',  `c` = '$c' , `d` = '$d',  `ans` = '$ans'  WHERE `QuizID` = $QuizID";
    $result = $db->execute($sql);

    if ($result) {
        echo "back";
    }
}
$db->close();
