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
    $action_url_sent_otp = '/E-Learning/config/_sent_otp.php';
    $action_url_recover = '/E-Learning/auth/recover/_recover.php';


    ?>
    <div class="container">
        <div class="row justify-content-center my-3 g-1">
            <div class="col-lg-5 col-md-7 col-sm-10 bg-white shadow-lg rounded p-4">

                <div class="" id="confirm_account">
                    <h3 class="text-center my-3 fw-normal">Recover your password </h3>
                    <form onsubmit="submitForm(event,'<?php echo $action_url_sent_otp ?>')">
                        <div class="form-floating my-2 text-muted">
                            <input type="text" minlength="3" class="form-control _form_data me-2 my-2" id="email" name="email" value="" placeholder="Enter your Email" required>
                            <label for="email">Enter your email to sent OTP </label>
                            <button type="submit" id="submit" name="" class="btn btn-dark btn-sm px-3">GET OTP</button>
                        </div>
                    </form>

                    <hr>

                    <form onsubmit="submitForm(event,'<?php echo $action_url_recover ?>')" class="my-3">
                        <div class="form-floating  text-muted">
                            <input type="text" minlength="6" maxlength="6" class="form-control _form_data  me-2 " id="OTP" name="OTP" placeholder="Enter OTP" required>
                            <label for="OTP">Enter the OTP code here </label>
                        </div>
                        <button type="submit" id="submit" class="btn btn-dark btn-sm my-2 px-3">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>





    <!--  JS Files -->
    <?php include '../../partials/_js_files.php' ?>



</body>

</html>