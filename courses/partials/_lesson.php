<div class="row g-3">

    <div class="col-lg-3 col-md-4">

        <?php include '_lession_list.php' ?>

    </div>

    <div class="col-lg-9 col-md-8">

        <?php
        $db = new DB();
        $LessonNo = $_GET['lesson'];
        $UserID = $_SESSION['userId'];

        $sql = "SELECT * FROM `lessons` WHERE `CourseID`='$CourseID'  AND `LessonNo`='$LessonNo'";
        $count = $db->getCount($sql);
        if ($count) {
            $row = $db->getRow($sql);

            $next_LessonNo = $LessonNo + 1;
            $prev_LessonNo = $LessonNo - 1;

            $next_url  = $root . '/courses/content.php?course=' . $CourseID . '&lesson=' . $next_LessonNo;
            $prev_url  = $root . '/courses/content.php?course=' . $CourseID . '&lesson=' . $prev_LessonNo;

            $sql_lid = "SELECT `LessonID` FROM `lessons` WHERE `CourseID`='$CourseID'  AND `LessonNo`='$next_LessonNo'";
            $row_lid = $db->getRow($sql_lid);
            if ($row_lid) {
                $sql_s = "SELECT `id` FROM `lesson_status` WHERE `LessonID`=" . $row_lid['LessonID'] . " AND `UserID`=" . $UserID;
                $row_s = $db->getCount($sql_s);
            } else {
                $next_url  = $root . '/courses/content.php?course=' . $CourseID . '&lesson=finished';
            }


            $status = "locked";
            if ($row_s) {
                $status = "";
            }

            $sql_p = "SELECT `points` FROM `enrolls` WHERE `StudentID` = '$UserID' AND `CourseID` =  " . $row['CourseID'];
            $row_p = $db->getRow($sql_p);

        ?>

            <div class="card">
                <div class="card-header py-2 d-flex justify-content-between">
                    <h6>Lesson <?php echo $row['LessonNo'] ?> - <span class="text-primary"><?php echo $row['title'] ?></span></h6>
                    <p class="lead fw-bold py-0 my-0"><span class="text-primary" id="points"><?php echo $row_p['points'] ?></span><i class="fa fa-star text-danger" aria-hidden="true"></i></p>

                </div>
                <div class="card-body ">
                    <div class="row g-3">
                        <div class="col-lg-8 col-md-7">
                            <p class="d-block text-muted "><?php echo $row['content'] ?></p>
                        </div>
                        <div class="col-lg-4 col-md-5 col-sm-9 mx-auto">
                            <video class="w-100" src="<?php echo $root ?>/assets/video/courses/<?php echo $CourseID ?>/<?php echo $row['video'] ?>" controls></video>
                        </div>
                        <div class="col-12">
                            <?php include '_quiz.php' ?>
                        </div>
                        <div class="col-12">
                            <?php include '_private_comment.php' ?>
                        </div>
                    </div>
                </div>
                <div class="card-footer d-flex justify-content-between align-items-center">
                    <button id="prev_lsn" class="btn btn-sm btn-outline-secondary" <?php if ($LessonNo == 1) echo "disabled" ?> onclick="redirectTo(`<?php echo $prev_url ?>`)"> <i class="fa fa-arrow-circle-o-left" aria-hidden="true"></i> Previous</button>
                    <button id="next_lsn" class="btn btn-sm btn-outline-secondary" onclick="redirectTo(`<?php echo $next_url ?>`)" <?php if ($status) echo "disabled" ?>> Next <i class="fa fa-arrow-circle-o-right" aria-hidden="true"></i></button>
                </div>
            </div>



        <?php
        } else {
        ?>

            <div class="shadow h-100 w-100 d-flex justify-content-center py-5">
                <div>
                    <?php
                    $get_certificate = $root . '/certificate/_create.php?course=' . $course_title . '&id=' . $CourseID;
                    $url_certificate = $root . '/certificate/certificate' . $_SESSION['userId'] . '-' . $CourseID . '.png';
                    ?>
                    <h4 class="display-6 text-center my-auto"><span class="text-success">Congratulations</span>! Course Finished!</h4>
                    <button class="btn btn-sm btn-outline-dark w-100 mt-5" onclick="getFunc('<?php echo $get_certificate ?>')">
                        Get Your Certificate
                        <i class="fa fa-download ms-3" aria-hidden="true"></i>
                    </button>
                    <a class="my-4 p-2 d-block " href="<?php echo $url_certificate ?>">
                        <img class="mx-auto d-block" src="<?php echo $url_certificate ?>" alt="">
                    </a>
                </div>
            </div>


        <?php


        }

        $db->close();

        ?>
    </div>



</div>