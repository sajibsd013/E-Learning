<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include '../../partials/_css_files.php' ?>


    <title>E-learning</title>
</head>

<body class="">

    <div class="admin_root ">
        <div class="container ">
            <?php
            include '../../db/_db.php';
            include '../partials/_header.php';

            if (isset($_GET['course'])) {
                $CourseID = $_GET['course'];
                include '_course.php';
            } 
            elseif (isset($_GET['quiz'])) {
                $QuizID  = $_GET['quiz'];
                include '_quiz.php';
            } 
            elseif (isset($_GET['lesson'])) {
                $LessonID  = $_GET['lesson'];
                include '_lesson.php';
            } 
            else {
                include '../../partials/_page_not_found.php';
            }

            ?>

        </div>
    </div>



    <!--  JS Files -->
    <?php include '../../partials/_js_files.php' ?>



</body>

</html>