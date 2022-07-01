<div class="container">

    <div class="row justify-content-center justify-content-md-start">
        <h3 class="mb-2 heading_color">Courses</h3>

        <?php

        foreach ($rows as $row) {
            $sql_l = "SELECT * FROM `lessons` WHERE `CourseID`='" . $row['CourseID'] . "'  ORDER BY `LessonNo` ASC";
            $lessons = $db->execute($sql_l);
            $total_lessons = $db->getCount($sql_l);

            $sql = "SELECT `username` FROM `users` WHERE `UserID`=" . $row['TeacherID'];
            $rows2 = $db->execute($sql);

            foreach ($rows2 as $row2) {
                $teacher =  $row2['username'];
            }

            $enroll_url = $root . "/auth/login/";

            if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] == true) {
                $enroll_url = $root . "/courses/enroll.php?p=" . $row['CourseID'];
            }


        ?>

            <div class="col-lg-3  col-md-4 col-11">
                <div class="card h-100">
                    <div style="max-height: 180px;">
                        <img data-bs-toggle="modal" data-bs-target="#modal<?php echo $row['CourseID'] ?>" src="<?php echo $root; ?>/assets/img/courses/<?php echo $row['TeacherID'] ?>/<?php echo $row['image'] ?>" class="card-img-top pointer mx-auto d-block h-100 " alt="...">
                    </div>

                    <div class="card-body">
                        <h5 class="card-title"><?php echo $row['course_title'] ?></h5>

                        <p class="text-success my-0">
                            <i class="fa fa-video-camera me-1" aria-hidden="true"></i>
                            <?php echo $total_lessons ?> lessons
                        </p>
                        <p class="text-muted my-0 ">Created by - <span class="fw-bold text-success"><?php echo $teacher ?></span> </p>
                        <h3 class="text-center "><span>৳</span> <?php echo $row['price'] ?> </h3>

                    </div>
                    <div class="card-footer bg-white">
                        <a href="<?php echo $enroll_url ?>" class="btn btn-sm btn-outline-dark w-100">Enroll Now</a>
                    </div>
                </div>
            </div>

            <div class="modal  fade" id="modal<?php echo $row['CourseID'] ?>" tabindex="-1" aria-labelledby="modal Label" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class=""><?php echo $row['course_title'] ?></h5>

                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="">
                                <p class="small mb-3"><?php echo $row['course_Description'] ?></p>
                                <?php

                                foreach ($lessons as $lesson) {
                                    $count = $lesson['LessonNo'];

                                ?>
                                    <div class="accordion mb-2" id="accordionExample">
                                        <div class="accordion-item ">
                                            <h4 class="accordion-header" id="heading">
                                                <button class="accordion-button collapsed border text-center py-2" type="button" data-bs-toggle="collapse" data-bs-target="#collapse<?php echo $count ?>" aria-expanded="false" aria-controls="collapse<?php echo $count ?>">
                                                    <h6>Lesson <?php echo $count ?> - <?php echo $lesson['title'] ?></h6>
                                                </button>
                                            </h4>
                                            <div id="collapse<?php echo $count ?>" class="accordion-collapse collapse" aria-labelledby="heading" data-bs-parent="#accordionExample">
                                                <div class="accordion-body p-0">
                                                    <div class="card">
                                                        <div class="card-header py-2">
                                                            <h5><?php echo $lesson['title'] ?></h5>
                                                        </div>
                                                        <div class="card-body ">
                                                            <div class="row">
                                                                <div class="col-lg-8 col-md-7">
                                                                    <?php echo $lesson['content'] ?>
                                                                </div>
                                                                <div class="col-lg-4 col-md-5 col-sm-9 mx-auto">
                                                                    <video class="w-100" src="#" controls></video>
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

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>




        <?php
        }



        ?>


    </div>
</div>