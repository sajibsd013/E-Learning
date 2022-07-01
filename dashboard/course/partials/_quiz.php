<div class="mt-5">
    <div class=" bg-white my-3 p-3 p-md-2 border-success d-flex justify-content-between align-items-center" style="border-left: 4px solid">
        <h5 class="fw-normal">Quiz </h5>
        <a class="btn btn-sm btn-outline-dark " onclick="redirectTo(` <?php echo $root . '/dashboard/course/create-quiz.php?lessonid=' . $row['LessonID']; ?>`)">Add new Quiz</a>
    </div>


    <?php
    $db = new DB();
    $sql3 = "SELECT * FROM `quizzes` WHERE `LessonID`=" . $row['LessonID'];

    $rows3 = $db->execute($sql3);
    $db->close();
    $count = 0;

    foreach ($rows3 as $row3) {
        $count++;
        $quiz_dlt_url = $root . '/dashboard/config/_delete.php?QuizID='. $row3['QuizID'];
        $quiz_edit_url = $root . '/dashboard/update/?quiz=' . $row3['QuizID'];

    ?>
        <div class="border border-muted w-100 p-2 m-1">
            <div class="form-group">
                <div class="mb-1 d-flex justify-content-between">
                    <h6 class=""><?php echo $count;  ?> . <?php echo $row3['ques'];  ?> </h6>
                    <div class="">
                        <a class="shadow-lg mx-1 p-1 px-2 bg-white rounded" onclick="return confirm(`Are you sure?`) && getFunc(`<?php echo $quiz_dlt_url ?>`)" style="cursor: pointer;" "><i class=" fa fa-trash text-danger" aria-hidden="true"></i></a>
                        <a class="shadow-lg mx-1 p-1 px-2 bg-white rounded pointer" href="<?php echo $quiz_edit_url ?>"><i class="fa fa-edit text-primary" aria-hidden="true"></i></a>
                    </div>
                </div>
                <div class="row ">
                    <div class="col-md-6">
                        <div class="form-check">
                            <input type="radio" name="st_ans<?php echo $count;  ?>" id="a<?php echo $count;  ?>" class="form-check-input pointer _form_data<?php echo $count;  ?>" value="<?php echo $row3['a'];  ?>" required>
                            <label class="pointer form-check-label small" for="a<?php echo $count;  ?>"><?php echo $row3['a'];  ?></label>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-check">
                            <input type="radio" name="st_ans<?php echo $count;  ?>" id="b<?php echo $count;  ?>" class="pointer form-check-input  _form_data<?php echo $count;  ?>" value="<?php echo $row3['b'];  ?>">
                            <label class="pointer form-check-label small" for="b<?php echo $count;  ?>"><?php echo $row3['b'];  ?></label>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-check">
                            <input type="radio" name="st_ans<?php echo $count;  ?>" id="c<?php echo $count;  ?>" class="pointer form-check-input _form_data<?php echo $count;  ?>" value="<?php echo $row3['c'];  ?>">
                            <label class="pointer form-check-label small" for="c<?php echo $count;  ?>"><?php echo $row3['c'];  ?></label>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-check">
                            <input type="radio" name="st_ans<?php echo $count;  ?>" id="d<?php echo $count;  ?>" class="pointer form-check-input  _form_data<?php echo $count;  ?>" value="<?php echo $row3['d'];  ?>">
                            <label class="pointer form-check-label small" for="d<?php echo $count;  ?>"><?php echo $row3['d'];  ?></label>
                        </div>
                    </div>
                </div>
                <input type="text" id="ans<?php echo $count;  ?>" class="form-control my-4 d-none" value="<?php echo $row3['ans'];  ?>">

                <div id="alert<?php echo $count;  ?>" class="alert alert-primary py-1 text-center mt-3 " role="alert">
                    <div class="small">
                        <b>Answer: </b>
                        <?php echo $row3['ans'];  ?>
                    </div>
                </div>
            </div>
        </div>

    <?php
    }
    ?>


</div>