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
    include '../../partials/_header.php';
    $action_url = "/E-Learning/auth/recover/_change_pass.php";

    ?>
    <div class="container">
        <div class="row justify-content-center my-3 g-1">
            <div class="col-lg-5 col-md-7 col-sm-10 bg-white shadow-lg rounded p-4">

                <form onsubmit="submitForm(event,'<?php echo $action_url ?>')" class="my-4  text-muted" id="change_pass_form">
                    <h3 class="text-center my-3 fw-normal">Enter new password </h3>
                    <div class="form-floating ">
                        <input type="email" minlength="8" class="form-control d-none _form_data" id="email" name="email" placeholder=" " value="<?php
                                                                                                                                                if (isset($_SESSION['current_email'])) {
                                                                                                                                                    echo $_SESSION['current_email'];
                                                                                                                                                }
                                                                                                                                                ?>" required>
                    </div>
                    <div class="form-floating ">
                        <input type="password" minlength="8" class="form-control _form_data" id="password1" name="password1" placeholder=" " required>
                        <label for="password1">Password</label>

                    </div>
                    <div class="form-floating my-2">
                        <input type="password" minlength="8" class="form-control _form_data" id="password2" name="password2" placeholder=" " required>
                        <label for="password2">Confirm Password</label>

                    </div>
                    <button type="submit" id="submit" class="btn btn-primary w-100 my-2 px-3">Submit</button>
                </form>

            </div>
        </div>
    </div>





    <!--  JS Files -->
    <?php include '../../partials/_js_files.php' ?>



</body>

</html>