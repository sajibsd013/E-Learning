<?php
$comment_url = $root . "/courses/config/_private_cmnt.php";

$db = new DB();
$sql_t = "SELECT `TeacherID` FROM `courses` WHERE `CourseID`=" . $row['CourseID'];
$rows_t = $db->execute($sql_t);
foreach ($rows_t as $row_t) {
    $TeacherID = $row_t['TeacherID'];
}
$LessonID = $row['LessonID'];

$sql_c = "SELECT * FROM `comments` WHERE `LessonID` = '$LessonID' AND `UserID`='$UserID' ORDER BY `timestand` DESC";

if ($TeacherID == $UserID) {
    $sql_c = "SELECT * FROM `comments` WHERE `LessonID` ='" . $row['LessonID'] . "' ORDER BY `timestand` DESC";
}

$rows_c = $db->execute($sql_c);
foreach ($rows_c as $row_c) {
    $sql_user = "SELECT `username` FROM `users` WHERE `UserID` =" . $row_c['UserID'];
    $rows_user = $db->execute($sql_user);

    foreach ($rows_user as $row_user) {
        $comment_by = $row_user['username'];
    }

    $time = timeFormat($row_c['timestand']);


?>
    <div class="my-2 border bg-white px-3 py-2 rounded">

        <div class="mb-2">
            <small class="my-1 text-muted d-flex">
                <span class="me-auto">
                    <i class="fa fa-user-circle text-primary me-1"></i>
                    <?php echo $comment_by ?>
                    <span class="text-dark ms-2"><?php echo $time ?></span>
                </span>
            </small>
            <pre class=""><?php echo $row_c['comment_content'] ?></pre>


        </div>
        <?php
        $CommentID = $row_c['CommentID'];
        $sql_r = "SELECT * FROM `reply` WHERE `CommentID` = $CommentID  ORDER BY `timestand` DESC";

        $replyes = $db->execute($sql_r);
        foreach ($replyes as $reply) {
            $sql_user1 = "SELECT `username` FROM `users` WHERE `UserID` =" . $reply['UserID'];
            $rows_user1 = $db->execute($sql_user1);

            foreach ($rows_user1 as $row_user1) {
                $reply_by = $row_user1['username'];
            }
            $time_r = timeFormat($reply['timestand']);


        ?>
            <div class="my-2 border bg-white px-3 py-2 rounded">

                <div class="mb-2">
                    <small class="my-1 text-muted d-flex">
                        <span class="me-auto">
                            <i class="fa fa-user-circle text-primary me-1"></i>
                            <?php echo $reply_by ?>
                            <span class="text-dark ms-2"><?php echo $time_r ?></span>
                        </span>
                    </small>
                    <pre class=""><?php echo $reply['reply_content'] ?></pre>
                </div>
            </div>

        <?php

        }



        ?>


        <form onsubmit="postPrivateReply(event,<?php echo $CommentID ?>)" id="reply_form'<?php echo $CommentID ?>">
            <div class="form-group my-2 ">
                <label for="">Write a Reply</label>
                <textarea class="form-control  my-1" id="reply<?php echo $CommentID ?>" name="reply<?php echo $CommentID ?>" rows="1" required></textarea>
            </div>
            <button type="submit" id="post_reply" class="btn btn-success my-2">Reply</button>
        </form>

    </div>

<?php

}


?>




<form onsubmit="submitForm(event,'<?php echo $comment_url ?>')">
    <h6>Private Comment</h6>

    <input type="text" class="_form_data d-none" name="LessonNo" value="<?php echo $LessonNo ?>">
    <input type="text" class="_form_data d-none" name="LessonID" value="<?php echo $row['LessonID'] ?>">
    <input type="text" class="_form_data d-none" name="CourseID" value="<?php echo $row['CourseID'] ?>">
    <div class="input-group ">
        <textarea class="form-control _form_data" name="private_comment" row="5"></textarea>
        <span class="input-group-text bg-light">
            <button type="submit" id="submit" class="btn btn-primary ">
                <i class="fa fa-send " aria-hidden="true"></i>
            </button>
        </span>
    </div>

</form>