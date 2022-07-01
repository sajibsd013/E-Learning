<?php
session_start();
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
        include '../db/_db.php';
        include '../partials/_header.php';

        $UserID = $_SESSION['userId'];
        $CourseID = $_GET['course'];

        $db = new DB();
        $sql = "SELECT * FROM `courses` WHERE `CourseID`='$CourseID'";
        $rows = $db->execute($sql);
        foreach ($rows as $row) {
        $course_title = $row['course_title'];

        ?>
            <h5 class="heading_color "><?php echo $course_title ?></h5>
            <small class="text-muted d-block mb-4"><?php echo $row['course_Description'] ?></small>
            <?php include 'partials/_lesson.php' ?>

        <?php
        }

        ?>



    </div>
    <?php include '../partials/_footer.php' ?>

    <!--  JS Files -->
    <?php include '../partials/_js_files.php' ?>



</body>

</html>