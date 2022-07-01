<?php
session_start();

$UserID = $_SESSION["userId"];

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include '../../partials/_css_files.php' ?>


    <title>E-learning </title>
</head>

<body class="">
    <div class="admin_root ">

        <div class="container">

            <?php
            if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] == true) {
                include '../../db/_db.php';
                include '../partials/_header.php';
                $CourseID = $_GET['id'];
                include 'partials/_course.php';
            } else {
                include '../../partials/_page_not_found.php';
            }
            ?>

        </div>
    </div>



    <!--  JS Files -->
    <?php include '../../partials/_js_files.php' ?>


</body>

</html>