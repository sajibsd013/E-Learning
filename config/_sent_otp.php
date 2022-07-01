<?php
session_start();
include '../db/_db.php';
$db = new DB();

if(isset($_POST['email'])){
	$email=$_POST['email'];
    $emailquery = "SELECT * from `users` WHERE `email`='$email'";
	$emailcount = $db->getCount($emailquery);

	$OTP = mt_rand(100000,999999);
	if($emailcount>0){
        $subject="Email Activation";
        $body="OTP code id = $OTP";
        $sender_email="From: elearningpw2@gmail.com";

        if(mail($email,$subject,$body,$sender_email)){
		    $updatequery="UPDATE `users` SET  `otp`='$OTP' where `email`='$email' ";
            $iquery=$db->execute($updatequery);
            if($iquery){
                echo "check your mail to get OTP";
            }else{
                echo"Error Found! Please try again...";
            }
        }else{
            echo"Email sending failed! Please try again";
            // $updatequery="UPDATE `users` SET  `otp`='$OTP' where `email`='$email' ";
            // $iquery=$db->execute($updatequery);
            // echo "check your mail to get OTP";
        }
	}else{
		echo'Email Not exists';
    }
}

$db->close();
?>
