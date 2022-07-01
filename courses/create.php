<?php
session_start();

include '../db/_db.php';
$UserID = $_SESSION["userId"];

$db = new DB();

if (isset($_POST['course_title'])) {
    $course_title =  $_POST['course_title'];
    $course_Description =  $_POST['course_Description'];
    $price =  $_POST['price'];

    $image =  $_FILES['image']['name'];
    $tmp_name =  $_FILES['image']['tmp_name'];
    $size =  $_FILES['image']['size'];
    $ext = pathinfo($image, PATHINFO_EXTENSION);

    if ($ext == 'jpg' or $ext == 'png' or $ext == 'jpeg') {
        if ($size <= 10485760) {
            $image_title = $course_title . "." . $ext;


            $inserquery = "INSERT INTO `courses` (`TeacherID`, `course_title`, `course_Description`, `price`,`image`) 
            VALUES ( '$UserID', '$course_title', '$course_Description', '$price','$image_title')";

            $result = $db->execute($inserquery);
            $db->close();


            if ($result) {
                $path = "../assets/img/courses/" . $UserID;
                if (!is_dir($path)) {
                    mkdir($path);
                }
                move_uploaded_file($tmp_name, $path . "/" . $image_title);
                $message = "Course created!";
                header('location: /e-learning/dashboard/courses/');
            }
        } else {

            $message = "Image should be or Less or Equal 10 MB!";
            header('location: /e-learning/courses/create.php?msg=' . $message);
        }
    } else {
        $message = "Your file is invalid! Please upload PBG or JPG file";
        header('location: /e-learning/courses/create.php?msg=' . $message);
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


    <title>E-learning</title>
</head>

<body>
    <div class="container">
        <?php

        include '../partials/_header.php';

        $message = '';

        ?>
        <div class="row justify-content-center g-3 my-2">
            <div class="col-lg-10 bg-white shadow-lg rounded p-4">

                <h3 class="heading_color">Create Course</h3>
                <small class="mb-4 d-block text-muted ">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Dignissimos, dolore.</small>

                <form action="" method="POST" enctype="multipart/form-data">
                    <div class="row g-2 justify-content-center">
                        <?php
                        if ($message) {
                            echo '
                            <div class="alert alert-success alert-dismissible fade show text-center" role="alert">
                            ' . $message . '
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>

                            ';
                        }

                        if (isset($_GET['msg'])) {
                            $message = $_GET['msg'];
                            echo '
                            <div class="alert alert-success alert-dismissible fade show text-center" role="alert">
                            ' . $message . '
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>

                            ';
                        }

                        ?>


                        <div class="form-floating  col-md-12">
                            <input type="text" class="form-control _form_data" id="course_title" name="course_title" placeholder=" " required>
                            <label for="course_title">Course title </label>
                        </div>
                        <div class="form-floating  col-md-12">
                            <input type="text" class="form-control _form_data" id="price" name="price" placeholder=" " required>
                            <label for="price">Course price</label>
                        </div>
                        <div class="form-group">
                            <label for="course_Description">Course Description</label>
                            <textarea class="form-control _form_data" id="editor" onfocus="j_editor()" name="course_Description" placeholder=" " rows="3"></textarea>
                        </div>
                        <div class="form-group">
                            <input type="file" class="form-control  _form_data" id="image" name="image">
                        </div>

                        <button id="submit" type="submit" class="btn btn-dark  w-100 fw-bold btn-sm my-3">Create</button>

                    </div>
                </form>


            </div>
        </div>
    </div>
    <?php include '../partials/_footer.php' ?>



    <!--  JS Files -->
    <?php include '../partials/_js_files.php' ?>



</body>

</html>