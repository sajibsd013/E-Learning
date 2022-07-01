<?php
	session_start();
	include '../../db/_db.php';

if(isset($_POST['signupName'])){
	$username=mysqli_real_escape_string($con,$_POST['signupName']);
	$email=mysqli_real_escape_string($con,$_POST['signupEmail']);
	$dob=mysqli_real_escape_string($con,$_POST['signupBirthday']);
	$mobile=mysqli_real_escape_string($con,$_POST['signupNumber']);
	$password=mysqli_real_escape_string($con,$_POST['signupPassword1']);
	$cpassword=mysqli_real_escape_string($con,$_POST['signupPassword2']);

	$pass=password_hash($password, PASSWORD_BCRYPT);

	$OTP = mt_rand(100000,999999);
	$emailquery="SELECT * from `users` WHERE `email`='$email'";
	$query=mysqli_query($con, $emailquery);
	$emailcount=mysqli_num_rows($query);

	if($emailcount>0){
		echo'Email already exists';
	}else{
		if($password==$cpassword){
			$subject="Email Activation";
			$body="hi,$username. Your OTP code is $OTP";
			$sender_email="From: elearningpw2@gmail.com";

			if(mail($email,$subject,$body,$sender_email)){

				$inserquery="INSERT INTO users(`username`,`email`,`mobile`,`password`,`dob`,`OTP`,`status`) values('$username','$email','$mobile','$pass','$dob','$OTP','inactive')";
				$iquery=mysqli_query($con,$inserquery);
				if($iquery){
					// echo 1;
					$dataset = array("status" => "success", "path" => "/auth/activate");
					$dataJSON = json_encode($dataset);
					echo $dataJSON;

					$_SESSION['msg']="Check your mail to activate your account ($email)";
					$_SESSION['email']=$email;
				}else{
					echo"Error Found! Please try again...";
				}
			}else{
				// echo 1;
				$dataset = array("status" => "success", "path" => "/auth/activate");
				$dataJSON = json_encode($dataset);
				echo $dataJSON;
				
				$_SESSION['msg']="Check your mail to activate your account ($email)";
				$_SESSION['email']=$email;
				$inserquery="INSERT INTO users(`username`,`email`,`mobile`,`password`,`dob`,`OTP`,`status`) values('$username','$email','$mobile','$pass','$dob','$OTP','inactive')";
				$iquery=mysqli_query($con,$inserquery);

				// echo"Email sending failed! Please try again";
			}
		}else{
			echo'Password not matched!';
		}
	}
}

?>
