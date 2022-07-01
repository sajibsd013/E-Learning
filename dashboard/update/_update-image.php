<?php
$db = new DB();
if (isset($_POST['CourseID'])) {
    $CourseID =  $_POST['CourseID'];
    $UserID = $_SESSION['userId'];
    $image =  $_FILES['image']['name'];
    $tmp_name =  $_FILES['image']['tmp_name'];
    $size =  $_FILES['image']['size'];
    $ext = pathinfo($image, PATHINFO_EXTENSION);


    if ($ext == 'jpg' or $ext == 'png' or $ext == 'jpeg') {
        if ($size <= 10485760) {
            $sql = "UPDATE `courses` SET `image`='$image' WHERE `CourseID`= $CourseID";
            $result = $db->execute($sql);
            if ($result) {
                $path = "../../assets/img/courses/" . $UserID;
                if (!is_dir($path)) {
                    mkdir($path);
                }
                move_uploaded_file($tmp_name, $path . "/" . $image);
                header("location:" . $root . "/dashboard/update/?course=" . $CourseID);
            }
        } else {

            $message = "Image should be or Less or Equal 10 MB!";
            header("location:" . $root . "/dashboard/update/update-image.php?course=" . $CourseID . "&msg=" . $message);
        }
    } else {
        $message = "Your file is invalid! Please upload PBG or JPG file";
        header("location:" . $root . "/dashboard/update/update-image.php?course=" . $CourseID . "&msg=" . $message);
    }
}

$sql2 = "SELECT * FROM `courses` WHERE `CourseID`='$CourseID'";
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
                <input type="text" name="CourseID" class="_form_data d-none" value="<?php echo $row2['CourseID'] ?>">

                <div class="form-group ">
                    <img src="<?php echo $root; ?>/assets/img/courses/<?php echo $row2['TeacherID']; ?>/<?php echo $row2['image']; ?>" class="border" alt="no image">
                    <input type="file" name="image" class="form-control my-3" id="">
                </div>

            </div>
            <button id="submit" type="submit" class="btn btn-dark  w-100 fw-bold btn-sm my-3">Update </button>

        </form>


    </div>
</div>