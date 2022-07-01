<div class="container">

    <?php
    $db = new DB();

    if (isset($_POST['title'])) {
        $LessonNo = $_POST['LessonNo'];
        $title = $_POST['title'];
        $content = $_POST['content'];

        $video =  $_FILES['video']['name'];
        $tmp_name =  $_FILES['video']['tmp_name'];
        $size =  $_FILES['video']['size'];
        $ext = pathinfo($video, PATHINFO_EXTENSION);

        if ($ext == 'mp4' or $ext == 'mvk') {
            if ($size <= 41943040 ) {
                $video_title = $title . "." . $ext;

                $inserquery = "INSERT INTO `lessons` (`CourseID`, `title`, `content`, `video`,`LessonNo`) 
                            VALUES ( '$CourseID', '$title', '$content', '$video_title','$LessonNo')";

                $result = $db->execute($inserquery);

                if ($result) {
                    $path = "../../assets/video/courses/" . $CourseID;
                    if (!is_dir($path)) {
                        mkdir($path);
                    }
                    move_uploaded_file($tmp_name, $path . "/" . $video_title);
                    $message = "Lesson added!";
                    $redirect_url = $root . "/dashboard/course/?id=" . $CourseID."&q=lesson";
                    header('location: ' . $redirect_url);
                }
            } else {
                $message = "video should be or Less or Equal 40 MB!";
            }
        } else {
            $message = "Your file is invalid! Please upload mp4 or mvk file";
        }
    }


    $message = '';

    ?>
    <div class="row justify-content-center g-3 my-2">
        <div class="col-lg-10 bg-white shadow-lg rounded p-4">

            <h3 class="heading_color">Add lesson</h3>
            <small class="mb-4 d-block text-muted ">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Dignissimos, dolore.</small>

            <form action="" method="POST" enctype="multipart/form-data">
                <div class="row g-2 justify-content-center">
                    <?php
                    if ($message) {
                        echo '
                            <div class="alert alert-success alert-dismissible fade show text-center" role="alert">
                            ' . $message . '
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>

                            ';
                    }
                    ?>

                    <div class="form-floating  col-md-12">
                        <input type="text" class="form-control _form_data" id="LessonNo" name="LessonNo" placeholder=" " required>
                        <label for="LessonNo">Lesson No </label>
                    </div>
                    <div class="form-floating  col-md-12">
                        <input type="text" class="form-control _form_data" id="title" name="title" placeholder=" " required>
                        <label for="title">Lesson title </label>
                    </div>
                    <div class="form-group">
                        <label for="course_Description">Content</label>
                        <textarea class="form-control _form_data" id="editor" onfocus="j_editor()" name="content" placeholder=" " rows=""></textarea>
                    </div>
                    <div class="form-group mb-2">
                        <label for="video">Select video</label>
                        <input type="file" class="form-control-file _form_data" id="video" name="video">
                    </div>
                    <button id="submit" type="submit" class="btn btn-dark  w-100 fw-bold btn-sm my-3">Add lesson</button>

                </div>
            </form>


        </div>
    </div>
</div>