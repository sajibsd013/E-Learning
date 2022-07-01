<?php
$db = new DB();
$sql = "SELECT * FROM `courses` WHERE `CourseID`='$CourseID'";
// $result = mysqli_query($con, $sql);
$row = $db->getRow($sql);

$action_display = "d-none";
if ($row['TeacherID'] == $_SESSION['userId']) {
    $action_display = "";
}

$db->close();


?>

<div>
    <h3 class="heading_color "><?php echo $row['course_title'] ?></h3>
    <small class="text-muted d-block mb-4"><?php echo $row['course_Description'] ?></small>

    <div class="mt-2">
        <nav class="">
            <div class="nav nav-tabs " id="nav-tab" role="tablist">
                <button class="nav-link <?php if (!isset($_GET['q'])) echo "active"; ?>  " onclick="redirectTo('/e-learning/dashboard/course/?id=<?php echo $CourseID ?>')">
                    Overview
                </button>
                <button class="nav-link <?php if (isset($_GET['q']) and $_GET['q'] == 'lesson') echo "active"; ?>" onclick="redirectTo('/e-learning/dashboard/course/?id=<?php echo $CourseID ?>&q=lesson')">
                    Lessons
                </button>
                <button class="nav-link <?php if (isset($_GET['q']) and $_GET['q'] == 'student') echo "active"; ?>" onclick="redirectTo('/e-learning/dashboard/course/?id=<?php echo $CourseID ?>&q=student')">
                    Students
                </button>
                <button class="nav-link <?php echo $action_display ?>  <?php if (isset($_GET['q']) and $_GET['q'] == 'moderator') echo "active"; ?>" onclick="redirectTo('/e-learning/dashboard/course/?id=<?php echo $CourseID ?>&q=moderator')">
                    Moderators
                </button>
            </div>
        </nav>

        <div class="">
            <div class="mt-4">
                <?php
                if (isset($_GET['q'])) {
                    $q = $_GET['q'];
                    if ($q == 'lesson') {
                        include '_lesson.php';
                    } elseif ($q == 'student') {
                        include '_enroll.php';
                    } elseif ($q == 'moderator') {
                        include '_moderators.php';
                    }
                } else {
                    echo '<h4>Overview</h4>';
                }

                ?>
            </div>

        </div>
    </div>


</div>