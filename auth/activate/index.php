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

        $action_url_sent_otp = '/E-Learning/config/_sent_otp.php';
        $action_url_active = '/E-Learning/auth/activate/_activate.php';
    ?>

        <div class="container">
            <div class="row justify-content-center my-3 g-3">
                <div class="col-lg-5 col-md-7 col-sm-10 bg-white shadow-lg rounded p-4">

                    <h6 class="my-3 fw-normal heading_color">
                        <?php
                        if (isset($_SESSION['msg'])) {
                            echo $_SESSION['msg'];
                        } else {
                            echo "Check your mail to activate your account";
                        }
                        ?>
                    </h6>


                    <form onsubmit="submitForm(event,'<?php echo $action_url_sent_otp ?>')">
                        <?php
                        if (isset($_SESSION['email'])) {

                        ?>
                            <!-- <label for="sent" class="text-primary text-center fw-bold d-block mx-auto" style="cursor: pointer;">Resent OTP </label> -->
                            <div class="d-flex">
                                <input type="text" minlength="3" class="form-control me-2 d-none _form_data" id="email" name="email" value="<?php echo $_SESSION['email'] ?>" placeholder="Enter your Email" required>
                                <button type="submit" id="sent" name="" class="btn btn-outline-dark btn-sm mx-auto">Resent OTP</button>
                            </div>

                        <?php
                        } else {
                        ?>
                            <small class="mt-4">Don't have OTP? Resent now...</small>
                            <div class="form-floating my-2 text-muted">
                                <input type="email" minlength="3" class="form-control me-2 my-2 _form_data" id="email" name="email" value="" placeholder="Enter your Email" required>
                                <label for="email">Enter your email to resent OTP </label>
                                <button type="submit" id="sbmit" name="" class="btn btn-outline-dark btn-sm px-3">Re-Sent OTP</button>
                            </div>
                        <?php
                        }
                        ?>
                    </form>
                    <hr>

                    <form onsubmit="submitForm(event,'<?php echo $action_url_active ?>')" class="my-3">
                        <div class="form-floating  text-muted">
                            <input type="text" minlength="6" maxlength="6" class="form-control _form_data me-2 " id="OTP" name="OTP" placeholder="Enter OTP" required>
                            <label for="OTP">Enter the Verification code here </label>
                        </div>
                        <button type="submit" id="submit" class="btn btn-primary my-2 px-3">Submit</button>
                    </form>


                </div>
            </div>
        </div>
    <?php

    }
    ?>


    <?php include '../../partials/_footer.php' ?>



    <!--  JS Files -->
    <?php include '../../partials/_js_files.php' ?>


</body>

</html>