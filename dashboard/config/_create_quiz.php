<?php
session_start();
$UserID = $_SESSION["userId"];
include '../../db/_db.php';
$db = new DB();

if (isset($_POST['ques'])) {
    $ques = $_POST['ques'];
    $a = $_POST['a'];
    $b = $_POST['b'];
    $c = $_POST['c'];
    $d = $_POST['d'];
    $ans = $_POST['ans'];
    $LessonID  = $_POST['LessonID'];

    $inserquery = "INSERT INTO `quizzes` (`ques`, `a`, `b`, `c`,`d`,`ans`,`LessonID`) 
                        VALUES ( '$ques', '$a', '$b', '$c','$d','$ans','$LessonID')";

    $iquery = $db->execute($inserquery);

    if($iquery){
        echo "back";
    }
}
$db->close();

