<div class="">
    <div class=" bg-white my-3 p-3 p-md-2 border-success d-flex justify-content-between align-items-center" style="border-left: 4px solid">
        <h5 class="fw-normal">Lessons </h5>
        <a class="btn btn-sm btn-outline-dark " href="<?php echo $root . '/dashboard/course/create-lesson.php?courseid=' . $row['CourseID']; ?>">Add new Lesson</a>
    </div>
    <?php
    $db = new DB();

    $sql = "SELECT * FROM `lessons` WHERE `CourseID`='$CourseID'  ORDER BY `LessonNo` ASC";

    $rows = $db->execute($sql);

    $db->close();

    foreach ($rows as $row) {
        $count = $row['LessonNo'];
        $lsn_dlt_url = $root . '/dashboard/config/_delete.php?LessonID=' . $row['LessonID'];
        $lsn_edit_url = $root . '/dashboard/update/?lesson=' . $row['LessonID'];

    ?>
        <div class="accordion mb-2" id="accordionExample">
            <div class="accordion-item ">
                <h4 class="accordion-header" id="heading">
                    <button class="accordion-button collapsed border text-center py-2" type="button" data-bs-toggle="collapse" data-bs-target="#collapse<?php echo $count ?>" aria-expanded="false" aria-controls="collapse<?php echo $count ?>">
                        <h6>Lesson <?php echo $count ?> - <?php echo $row['title'] ?></h6>
                    </button>
                </h4>
                <div id="collapse<?php echo $count ?>" class="accordion-collapse collapse" aria-labelledby="heading" data-bs-parent="#accordionExample">
                    <div class="accordion-body p-0">
                        <div class="card">
                            <div class="card-header py-2">
                                <div class="d-flex justify-content-between align-items-center">
                                    <h5><?php echo $row['title'] ?></h5>
                                    <div class="<?php echo $action_display ?>">
                                        <a class="shadow-lg mx-1 p-1 px-2 bg-white rounded" onclick="return confirm(`Are you sure?`) && getFunc(`<?php echo $lsn_dlt_url ?>`)" style="cursor: pointer;" "><i class=" fa fa-trash text-danger" aria-hidden="true"></i></a>
                                        <a class="shadow-lg mx-1 p-1 px-2 bg-white rounded pointer" href="<?php echo $lsn_edit_url ?>"><i class="fa fa-edit text-primary" aria-hidden="true"></i></a>
                                    </div>
                                </div>

                            </div>
                            <div class="card-body ">
                                <div class="row">
                                    <div class="col-lg-8 col-md-7">
                                        <?php echo $row['content'] ?>
                                    </div>
                                    <div class="col-lg-4 col-md-5 col-sm-9 mx-auto">
                                        <video class="w-100" src="<?php echo $root ?>/assets/video/courses/<?php echo $CourseID ?>/<?php echo $row['video'] ?>" controls></video>
                                    </div>
                                    <div class="col-12">
                                        <?php include '_quiz.php' ?>
                                    </div>
                                </div>
                            </div>

                        </div>


                    </div>
                </div>
            </div>
        </div>


    <?php
    }


    ?>


</div>