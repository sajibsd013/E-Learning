<?php
if (isset($_GET["p"])) {
    $UserID = $_GET['p'];
} else {
    $UserID = $_SESSION['userId'];
}

$db = new DB();
$sql = "SELECT * FROM `users` WHERE `UserID`='$UserID'";
$row = $db->getRow($sql);

$sql0 = "SELECT `CourseID` FROM `enrolls` WHERE `StudentID`='$UserID' AND `payment_status`='paid'";
$rows0 = $db->execute($sql0);
$total_course = $db->getCount($sql0);
$total_com = 0;

?>

<div class="container">
    <div class="row g-5 justify-content-center">
        <div class="col-lg-8  bg-white shadow-lg rounded p-4">
            <div class="text-center py-3">
                <i class="fa fa-user-circle fa-5x border border-success rounded-circle" aria-hidden="true"></i>
                <h6 class="my-2 text-muted"><?php echo $row['username']  ?></h6>
                <div class="d-flex justify-content-center my-3">
                    <span class="mx-3">
                        <h4 class="my-0"><?php echo $total_course ?></h4>
                        <small class="text-muted ">Courses</small>
                    </span>
                    <span class="mx-3">
                        <h4 class="my-0"><?php echo $total_com ?></h4>

                        <small class="text-muted ">Completed</small>
                    </span>
                    <span class="mx-3">
                        <h4 class="my-0"><?php echo $total_com ?></h4>
                        <small class="text-muted ">Certificate</small>
                    </span>
                </div>
            </div>
            <?php
            if ($total_course) {
            ?>

                <h5>Your Courses</h5>
                <div class="row my-3 g-3 justify-content-center">
                    <?php

                    foreach ($rows0 as $row0) {
                        $CourseID = $row0['CourseID'];
                        $sql2 = "SELECT * FROM `courses` WHERE `CourseID`='$CourseID'";
                        $rows2 = $db->execute($sql2);

                        foreach ($rows2 as $row2) {


                    ?>
                            <div class="col-lg-4 col-md-6 col-sm-7 col-10">
                                <div class="card h-100">
                                    <div style="max-height: 180px;">
                                        <img src="/e-learning/assets/img/courses/<?php echo $row2['TeacherID'] ?>/<?php echo $row2['image'] ?>" class="card-img-top" alt="...">

                                    </div>
                                    <div class="card-body">
                                        <h6 class="card-title"><?php echo $row2['course_title'] ?></h6>

                                    </div>
                                    <div class="card-footer bg-white">
                                        <a class="btn btn-sm btn-dark w-100 pointer" onclick="redirectTo(`/E-learning/courses/content.php?course=<?php echo $row2['CourseID'] ?>&lesson=1`)">
                                            View Content
                                        </a>
                                    </div>
                                </div>
                            </div>


                    <?php
                        }
                    }


                    ?>


                </div>


            <?php



            } else {
            ?>

                <div class="mt-2">
                    <div id="" class="alert alert-info text-center py-3 " role="alert">
                        <p class="lead"> No Course enrolled!</p>
                    </div>
                </div>

            <?php
            }


            ?>




        </div>

    </div>
    <div class="row my-5">
        <div class="col-lg-5">
            <?php
            include '../blog/partials/_blog_post.php';
            $sql = "SELECT * FROM `blog` WHERE `status`='approved' AND `UserID`='$UserID' ORDER BY `timestand` DESC";
            blogPost($con, $sql);
            ?>
        </div>
    </div>

</div>
<?php



?>