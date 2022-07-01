<?php
$UserID = $_SESSION['userId'];
$db = new DB();

$sql = "SELECT * FROM `users` WHERE `status`='active'";
$total_users = $db->getCount($sql);

$sql0 = "SELECT * FROM `courses` WHERE `TeacherID`='$UserID'";
$total_courses = $db->getCount($sql0);

$sql1 = "SELECT * FROM `blog`";
$total_blog_artile = $db->getCount($sql1);

$user_name = $_SESSION["userName"];


?>


<div class=" bg-white p-3 py-4 border-success" style="border-left: 4px solid">
    <h1 class="fw-normal">Welcome, <?php echo $user_name; ?>!</h1>
    <p class="text-muted">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Voluptatum, nemo.</p>
</div>


<div class="row g-4 my-3 justify-content-center">
    <div class="col-lg-4 col-md-6">
        <div class="card mx-auto" style="width:300px">
            <div class="card-body " style="background-color: #5cb85c;">
                <div class="row text-white">
                    <div class="col-3">
                        <i class="fa fa-book fa-5x" aria-hidden="true"></i>

                    </div>
                    <div class="col-9 text-end">
                        <h1 class=""><?php echo $total_courses; ?></h1>
                        <div>Total Courses!</div>
                    </div>
                </div>

            </div>
            <div class="card-footer bg-light">
                <span class="pull-left">View Details</span>
                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
            </div>
        </div>
    </div>
    <div class="col-lg-4 col-md-6">
        <div class="card mx-auto" style="width:300px">
            <div class="card-body " style="background-color: #8e14b3c3;">
                <div class="row text-white">
                    <div class="col-3">
                        <i class="fa fa-user fa-5x" aria-hidden="true"></i>

                    </div>
                    <div class="col-9 text-end">
                        <h1 class=""><?php echo $total_users; ?> </h1>
                        <div>Total active Students!</div>
                    </div>
                </div>

            </div>
            <div class="card-footer bg-light">
                <span class="pull-left">View Details</span>
                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <?php include("../notifications/partials/_notification.php") ?>
    </div>



</div>



<div class="row my-2 g-5">
    <div class="col-md-6">
        <div class="chart-container">
            <canvas id="chart-line"></canvas>
        </div>
    </div>
    <div class="col-md-6">
        <div class="chart-container">
            <canvas id="chart-bar"></canvas>
        </div>
    </div>


</div>