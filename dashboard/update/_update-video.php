<?php
$db = new DB();

if (isset($_POST['LessonID'])) {
    $LessonID =  $_POST['LessonID'];
    $CourseID =  $_POST['CourseID'];
    $video =  $_FILES['video']['name'];
    $tmp_name =  $_FILES['video']['tmp_name'];
    $size =  $_FILES['video']['size'];
    $ext = pathinfo($video, PATHINFO_EXTENSION);


    if ($ext == 'mp4' or $ext == 'mvk') {
        if ($size <= 41943040) {
            $sql = "UPDATE `lessons` SET `video`='$video' WHERE `LessonID`= $LessonID";
            $result = $db->execute($sql);

            if ($result) {
                $path = "../../assets/video/courses/" . $CourseID;
                if (!is_dir($path)) {
                    mkdir($path);
                }
                move_uploaded_file($tmp_name, $path . "/" . $video);
                header("location:" . $root . "/dashboard/update/?lesson=" . $LessonID);
            }
        } else {

            $message = "Image should be or Less or Equal 10 MB!";
            header("location:" . $root . "/dashboard/update/update-video.php?lesson=" . $LessonID . "&msg=" . $message);
        }
    } else {
        $message = "Your file is invalid! Please upload PBG or JPG file";
        header("location:" . $root . "/dashboard/update/update-video.php?lesson=" . $LessonID . "&msg=" . $message);
    }
}

$sql2 = "SELECT * FROM `lessons` WHERE `LessonID`='$LessonID'";
$row2 = $db->getRow($sql2);
$db->close();

?>


<div class="row justify-content-center g-3 my-2">
    <div class="col-lg-6 bg-white shadow-lg rounded p-4">
        <?php
        if (isset($_GET['msg'])) {
            $message = $_GET['msg'];
            echo '
                        <div class="alert alert-danger alert-dismissible fade show text-center" role="alert">
                        ' . $message . '
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>

                        ';
        }

        ?>

        <h3 class="heading_color">Update Course Image</h3>

        <form action="" method="POST" enctype="multipart/form-data">
            <div class="row g-2 justify-content-center">
                <input type="text" name="LessonID" class="_form_data d-none" value="<?php echo $row2['LessonID'] ?>">
                <input type="text" name="CourseID" class="_form_data d-none" value="<?php echo $row2['CourseID'] ?>">

                <div class="form-group ">
                    <video class="" style="max-width: 200px;" src="<?php echo $root; ?>/assets/video/courses/<?php echo $row2['CourseID']; ?>/<?php echo $row2['video']; ?>" controls></video>

                    <input type="file" name="video" class="form-control my-3" id="">
                </div>
                <button id="submit" type="submit" class="btn btn-dark  w-100 fw-bold btn-sm my-3">Update </button>

            </div>
        </form>


    </div>
</div>