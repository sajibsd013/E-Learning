<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include '../../partials/_css_files.php' ?>

    <title>E-learning</title>
</head>

<body>



    <?php
    if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] == true) {
        include '../../partials/_page_not_found.php';
    } else {
        include '../../partials/_header.php';
        $action_url = "/E-Learning/auth/registration/_registration.php";

    ?>
        <section class="container">
            <div class="row justify-content-center g-3 my-2">
                <div class="col-lg-8 bg-white shadow-lg rounded p-4">

                    <h3 class="heading_color">Hi There,</h3>
                    <p class="mb-4 lead">Register now to explore more</p>

                    <form action="" class="text-muted" method='post' id="signup_form" onsubmit="submitForm(event,'<?php echo $action_url ?>')">
                        <div class="row g-2 justify-content-center">
                            <div class="form-floating  col-md-6">
                                <input type="text" minlength="5" class="form-control _form_data" id="signupName" name="signupName" placeholder=" " required>
                                <label for="signupName">Full Name </label>
                            </div>
                            <div class="form-floating  col-md-6">
                                <input type="email" minlength="6" class="form-control _form_data" id="signupEmail" name="signupEmail" aria-describedby="emailHelp" placeholder=" " required>
                                <label for="signupEmail">Email address</label>

                            </div>
                            <div class="form-floating  col-md-6">
                                <input type="txet" minlength="7" class="form-control _form_data" id="signupNumber" name="signupNumber" placeholder=" " required>
                                <label for="signupNumber">Phone Number</label>

                            </div>
                            <div class="form-floating  col-md-6">
                                <input type="date" class="form-control _form_data" id="signupBirthday " name="signupBirthday" placeholder=" " required>
                                <label for="signupBirthday">Date of Birth</label>

                            </div>
                            <div class="form-floating  col-md-6">
                                <input type="password" minlength="8" class="form-control _form_data" id="password1" name="signupPassword1" placeholder=" " required>
                                <label for="password1">Password</label>

                            </div>
                            <div class="form-floating  col-md-6">
                                <input type="password" minlength="8" class="form-control _form_data" id="password2" name="signupPassword2" placeholder=" " required>
                                <label for="password2">Confirm Password</label>

                            </div>
                            <button id="submit" type="submit" class="btn btn-primary px-5 my-3">Signup</button>

                        </div>
                    </form>
                    <p class="text-center text-muted fw-bold">or</p>
                    <button id="" onclick="redirectTo('/E-learning/auth/login')" class="btn btn-sm btn-success m-auto d-block my-3 fw-bold px-4">Login Now</button>


                </div>
            </div>
        </section>

    <?php

    }
    ?>


    <?php include '../../partials/_footer.php' ?>


    <!--  JS Files -->
    <?php include '../../partials/_js_files.php' ?>





</body>

</html>