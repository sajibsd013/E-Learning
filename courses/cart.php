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

        if (isset($_GET['id'])) {
            $db = new DB();
            if (!isset($_SESSION['userId'])) {
                $id_p = $_GET['id'];
                $sql_user = "SELECT * from `users` where `UserID`='$id_p'";
                $rows = $db->execute($sql_user);

                foreach ($rows as $row) {
                    $_SESSION["loggedin"] = true;
                    $_SESSION["userName"] =  $row['username'];
                    $_SESSION["userEmail"] = $row['email'];
                    $_SESSION["birthday"] =   $row['dob'];
                    $_SESSION["userId"] =   $row['UserID'];
                    $_SESSION["mobile"] =  $row['mobile'];
                    $_SESSION["type"] =   $row['type'];
                }
            }
            $db->close();
        }


        $db = new DB();
        $sql_c = "SELECT * FROM `enrolls` WHERE `StudentID`='".$_SESSION['userId']."' AND `payment_status`='pending'";
        $count = $db->getCount($sql_c);
        if ($count) {
        ?>
            <h5 class="heading_color mb-2">Checkout courses</h5>
            <div class="row g-3">
                <?php
                $rows2 = $db->execute($sql_c);

                foreach ($rows2 as $row2) {
                    $CourseID = $row2['CourseID'];

                    $sql3 = "SELECT * FROM `courses` WHERE `CourseID`='$CourseID'";
                    $rows3 = $db->execute($sql3);

                    foreach ($rows3 as $row3) {
                ?>
                        <div class="col-lg-3 col-md-4 col-11">
                            <div class="card h-100">
                                <div style="height: 180px;">
                                    <img src="<?php echo $root ?>/assets/img/courses/<?php echo $row3['TeacherID'] ?>/<?php echo $row3['image'] ?>" class="card-img-top mx-auto d-block h-100" alt="...">
                                </div>
                                <div class="card-body">
                                    <h5 class="card-title"><?php echo $row3['course_title'] ?></h5>
                                    <h3 class="text-center "><span>৳</span> <?php echo $row3['price'] ?> </h3>
                                </div>
                                <div class="card-footer bg-white">
                                    <a href="checkout.php?price=<?php echo $row2['price'] ?>&id=<?php echo $row2['EnrollID'] ?>&UserID=<?php echo $_SESSION['userId'] ?>" class="btn btn-sm btn-dark w-100">Checkout Now</a>
                                </div>
                            </div>
                        </div>


                <?php
                    }
                }



                ?>


            </div>


        <?php


        } else {
        ?>

            <div class="mt-5 py-5">
                <div id="" class="alert alert-info text-center py-5 my-5" role="alert">
                    <p class="display-6"> No pending payment!</p>
                </div>
            </div>

        <?php
        }





        ?>



    </div>
    <?php include '../partials/_footer.php' ?>



    <!--  JS Files -->
    <?php include '../partials/_js_files.php' ?>



</body>

</html>