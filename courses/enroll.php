<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include '../partials/_css_files.php' ?>


    <title>E-learning</title>
</head>

<body>
    <div class="container">
        <?php
        include '../db/_db.php';
        include '../partials/_header.php';
        $db = new DB();

        $action_url = $root.'/courses/config/_create_course.php';
        $UserID = $_SESSION['userId'];
        $CourseID = $_GET['p'];

        $sql2 = "SELECT * FROM `courses` WHERE `CourseID`='$CourseID'";
        $row2 = $db->getRow($sql2);

        $sql3 = "SELECT * FROM `users` WHERE `UserID`='$UserID'";
        $row3 = $db->getRow($sql3);

        $action_url = $root."/courses/config/_enroll_course.php";


        ?>
        <div class="row justify-content-center g-3 my-2">
            <div class="col-lg-6 bg-white shadow-lg rounded p-4">

                <h4 class="my-2">Course Title : <span class="fw-normal"> <?php echo $row2['course_title']; ?></span></h4>
                <h6 class=" mb-4">Course price : <span class="fw-normal"> $<?php echo $row2['price']; ?></span></h4>

                <form action="" method="POST" onsubmit="submitForm(event,'<?php echo $action_url ?>')">
                    <div class="row g-2 justify-content-center">

                        <div class="form-floating  col-md-12">
                            <input type="text" class="form-control _form_data" id="name" value="<?php echo $row3['username']; ?>" name="name" placeholder=" " disabled required>
                            <label for="name">Name</label>
                        </div>
                        
                        <div class="form-floating  col-md-12">
                            <input type="email" class="form-control _form_data" id="email" value="<?php echo $row3['email']; ?>" name="email" placeholder=" " disabled required>
                            <label for="email">email</label>
                        </div>
                        
                        <div class="form-floating  col-md-12">
                            <input type="text" class="form-control _form_data" id="mobile" value="<?php echo $row3['mobile']; ?>" name="mobile" placeholder=" " disabled required>
                            <label for="mobile">Mobile</label>
                        </div>
                        <input type="text" class="_form_data d-none" id="CourseID" value="<?php echo $CourseID; ?>" name="CourseID" >
                        <input type="text" class="_form_data d-none" id="price" value="<?php echo $row2['price']; ?>" name="price" >
 
                        <button id="submit" type="submit" class="btn btn-dark  w-100 fw-bold btn-sm my-3">Enroll Now</button>

                    </div>
                </form>


            </div>
        </div>
    </div>
    <?php include '../partials/_footer.php' ?>



    <!--  JS Files -->
    <?php include '../partials/_js_files.php' ?>



</body>

</html>