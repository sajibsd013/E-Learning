<?php
$db = new DB();
$sql2 = "SELECT * FROM `courses` WHERE `CourseID`='$CourseID'";
$row2 = $db->getRow($sql2);
$action_url = $root.'/dashboard/config/_update.php';
$db->close();

?>

<div class="row justify-content-center g-3 my-2">
    <div class="col-lg-10 bg-white shadow-lg rounded p-4">

        <h3 class="heading_color">Update Course Information</h3>
        <small class="mb-4 d-block text-muted ">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Dignissimos, dolore.</small>

        <form onsubmit="submitForm(event,'<?php echo $action_url ?>')">
            <div class="row g-2 justify-content-center">
                <input type="text" name="CourseID" class="_form_data d-none" value="<?php echo $row2['CourseID'] ?>">

                <div class="form-floating  col-md-12">
                    <input type="text" class="form-control _form_data" id="course_title" name="course_title" value="<?php echo $row2['course_title'] ?>" placeholder=" " required>
                    <label for="course_title">Course title </label>
                </div>
                <div class="form-floating  col-md-12">
                    <input type="text" class="form-control _form_data" id="price" name="price" placeholder=" " value="<?php echo $row2['price'] ?>" required>
                    <label for="price">Course price</label>
                </div>
                <div class="form-group">
                    <label for="course_Description">Course Description</label>
                    <textarea class="form-control _form_data" id="editor" onfocus="j_editor()" name="course_Description" placeholder=" " rows="3"><?php echo $row2['course_Description'] ?></textarea>
                </div>
                <div class="form-group my-4">
                    <img src="<?php echo $root; ?>/assets/img/courses/<?php echo $row2['TeacherID']; ?>/<?php echo $row2['image']; ?>" class="border " alt="no image">
                    <a class="btn btn-sm btn-outline-dark ms-2" onclick="redirectTo('/E-learning/dashboard/update/update-image.php?course=<?php echo $row2["CourseID"] ?>')">Change Image</a>
                </div>
                <button id="submit" type="submit" class="btn btn-dark  w-100 fw-bold btn-sm my-3">Update </button>

            </div>
        </form>


    </div>
</div>