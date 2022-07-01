<div class="mt-5">
    <?php
    $action_url = '';
    ?>
    <form action="" onsubmit="quizForm(event)">

        <?php
        $db = new DB();
        $sql3 = "SELECT * FROM `quizzes` WHERE `LessonID`=" . $row['LessonID'];

        $rows3 = $db->execute($sql3);
        $count = 0;


        foreach ($rows3 as $row3) {
            $count++;

        ?>
            <div class="border border-muted w-100 p-2 m-1">
                <div class="form-group">
                    <div class="mb-1 h6">
                        <span class=""><?php echo $count;  ?></span>. <span class=" small"> <?php echo $row3['ques'];  ?></span>
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

                    <div id="alert<?php echo $count;  ?>" class="alert  py-1 text-center mt-3 d-none" role="alert">
                        <div class="small">
                            <b>Answer: </b>
                            <?php echo $row3['ans'];  ?>
                        </div>
                    </div>
                </div>
            </div>

        <?php
        }
        $db->close();
        ?>
        <input type="text" name="count" id="count" class="form-control my-3 d-none" value="<?php echo $count;  ?>">
        <input type="text" name="LessonID" id="LessonID" class="form-control my-3 d-none" value="<?php echo $row['LessonID'];  ?>">
        <input type="text" name="next_LessonID" id="next_LessonID" class="form-control my-3 d-none" value="<?php echo $row_lid['LessonID'];  ?>">
        <input type="text" name="CourseID" id="CourseID" class="form-control my-3 d-none" value="<?php echo $row['CourseID'];  ?>">
        <button id="submit" type="submit" class="btn btn-dark  w-100 fw-bold btn-sm my-3">Submit </button>


    </form>

</div>