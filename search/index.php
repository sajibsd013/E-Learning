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

        if (isset($_GET['q'])) {
            $searchTerm = $_GET['q'];
            $db = new DB();
            $sql = "SELECT * FROM courses WHERE (course_title LIKE '%{$searchTerm}%' OR course_Description LIKE '%{$searchTerm}%') ";
            $count = $db->getRow($sql);

            if ($count) {
                $rows = $db->execute($sql);
                include '../courses/partials/_load_course.php';
            }

            $sql1 = "SELECT * FROM blog WHERE (blog_title LIKE '%{$searchTerm}%' OR blog_desc LIKE '%{$searchTerm}%') ";
            $count1 = $db->getRow($sql1);
            if ($count1) {
                $rows = $db->execute($sql1);
        ?>
                <div class="row g-5">
                    <div class="col-md-6 mx-auto">
                        <h4>Blog Content</h4>
                        <?php include '../blog/partials/_load_post.php'; ?>
                    </div>
                </div>



            <?php

            }

            if (!$count && !$count1) {
            ?>
                <div class="mt-2">
                    <div id="" class="alert alert-info text-center py-2 " role="alert">
                        <p class="lead"> No Result Found!</p>
                    </div>
                </div>
        <?php
            }
            $db->close();
        }


        ?>



    </div>
    <?php include '../partials/_footer.php' ?>



    <!--  JS Files -->
    <?php include '../partials/_js_files.php' ?>

</body>

</html>