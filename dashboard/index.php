<?php
session_start();

include '../db/_db.php';
$db = new DB();
$UserID = $_SESSION["userId"];


if (isset($_POST['course_title'])) {
    $course_title = $_POST['course_title'];
    $course_Description = $_POST['course_Description'];
    $price =$_POST['price'];

    $image =  $_FILES['image']['name'];
    $tmp_name =  $_FILES['image']['tmp_name'];
    $size =  $_FILES['image']['size'];
    $ext = pathinfo($image, PATHINFO_EXTENSION);

    if ($ext == 'jpg' or $ext == 'png' or $ext == 'jpeg') {
        if ($size <= 10485760) {

            $inserquery = "INSERT INTO `courses` (`TeacherID`, `course_title`, `course_Description`, `price`,`image`) 
            VALUES ( '$UserID', '$course_title', '$course_Description', '$price','$image')";

            $result = $db->execute($inserquery);

            if ($result) {
                $path = "../assets/img/courses/" . $UserID;
                if (!is_dir($path)) {
                    mkdir($path);
                }
                move_uploaded_file($tmp_name, $path . "/" . $image);
                $message = "Course created!";
                $url = $root.'/profile/';
                header('location: '.$url);
            }
        } else {
            $message = "Image should be or Less or Equal 10 MB!";
        }
    } else {
        $message = "Your file is invalid! Please upload PBG or JPG file";
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include '../partials/_css_files.php' ?>


    <title>E-learning </title>
</head>

<body class="">
    <div class="admin_root">
        <div class="container">

            <?php
            if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] == true) {
                include 'partials/_header.php';

                include 'partials/_home.php';
            } else {
                include '../partials/_page_not_found.php';
            }
            ?>

        </div>
    </div>



    <!--  JS Files -->
    <?php include '../partials/_js_files.php' ?>



</body>

</html>