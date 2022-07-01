<?php
$db = new DB();
$sql2 = "SELECT * FROM `lessons` WHERE `LessonID`='$LessonID'";
$row2 = $db->getRow($sql2);
$action_url = $root . '/dashboard/config/_update.php';
// $db->close();
?>

<div class="row justify-content-center g-3 my-2">
    <div class="col-lg-10 bg-white shadow-lg rounded p-4">

        <h3 class="heading_color">Update Course lesson</h3>

        <form onsubmit="submitForm(event,'<?php echo $action_url ?>')">
            <div class="row g-2 justify-content-center">
                <input type="text" name="LessonID" class="_form_data d-none" value="<?php echo $row2['LessonID'] ?>"> 
                <input type="text" name="course" class="_form_data d-none" value="<?php echo $row2['CourseID'] ?>"> 

                <div class="form-floating  col-md-12">
                    <input type="text" class="form-control _form_data" id="LessonNo" name="LessonNo" value="<?php echo $row2['LessonNo'] ?>" placeholder=" " required>
                    <label for="LessonNo">Lesson No</label>
                </div>
                <div class="form-floating  col-md-12">
                    <input type="text" class="form-control _form_data" id="title" name="title" value="<?php echo $row2['title'] ?>" placeholder=" " required>
                    <label for="title">Title </label>
                </div>

                <div class="form-group">
                    <label for="course_Description">Content</label>
                    <textarea class="form-control _form_data" id="editor" onfocus="j_editor()" name="content" placeholder=" " rows="3"><?php echo $row2['content'] ?></textarea>
                </div>
                <div class="form-group my-4">
                    <video class="" style="max-width: 200px;" src="<?php echo $root; ?>/assets/video/courses/<?php echo $row2['CourseID']; ?>/<?php echo $row2['video']; ?>" controls></video>
                    <a class="btn btn-sm btn-outline-dark ms-2" onclick="redirectTo(`<?php echo $root ?>/dashboard/update/update-video.php?lesson=<?php echo $row2['LessonID'] ?>`)">Change Video</a>
                </div>
                <button id="submit" type="submit" class="btn btn-dark  w-100 fw-bold btn-sm my-3">Update </button>

            </div>
        </form>


    </div>
</div>