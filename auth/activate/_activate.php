<?php
session_start();

include '../../db/_db.php';

if(isset($_POST['OTP'])){
	$otp=$_POST['OTP'];
	
	$emailquery="SELECT * from `users` WHERE `otp`='$otp'";
	$query=mysqli_query($con, $emailquery);
	$count=mysqli_num_rows($query);

	if($count>0){
		$updatequery="UPDATE `users` SET `status`='active' where `otp`='$otp'";
		$query= mysqli_query($con,$updatequery);

		$updatequery1="UPDATE `users` SET `otp`='0' where `otp`='$otp'";
		$query1= mysqli_query($con,$updatequery1);
		if($query){
			// echo 2;
			$dataset = array("status" => "success", "path" => "/auth/login/");
			$dataJSON = json_encode($dataset);
			echo $dataJSON;
    		session_destroy();
		}
	}else{
		echo "OTP not matched!";
	}
}
