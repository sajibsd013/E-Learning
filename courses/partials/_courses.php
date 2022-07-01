<div class="conatiner">

    <?php
    $db = new DB();
    $sql = "SELECT * FROM `courses` WHERE `status`='approved' ORDER BY 'CourseID' DESC";
    $count = $db->getCount($sql);
    if ($count) {
        $rows = $db->execute($sql);
        include '_load_course.php';
    } else {
    ?>

        <div class="my-5">
            <div id="" class="alert alert-warning text-center py-5 my-5 " role="alert">
                <p class="display-6"> No courses!</p>
            </div>
        </div>

    <?php
    }

    $db->close();
    ?>


    <?php
    if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] == true) {
    ?>
        <h6 class="fw-normal text-center bg-light mt-4 p-4 rounded">
            Beacame a Instructor ? Create your own course...
            <a class=" pointer btn btn-sm btn-outline-primary" onclick="redirectTo('/E-learning/courses/create.php')">
                Click Here
            </a>
        </h6>
    <?php
    }
    ?>
</div>