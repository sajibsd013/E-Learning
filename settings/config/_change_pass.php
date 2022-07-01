<?php
session_start();

include '../../db/_db.php';

$db = new DB();

$user_id =  $_SESSION['userId'];
if (isset($_POST['cpassword'])) {
	  $cpassword=$_POST['cpassword'];
      
    $email_search="SELECT * from users where `UserID`='$user_id'";
    $row=$db->getRow($email_search);

    $user_pass_hash = $row["password"];

    $pass_decode=password_verify($cpassword, $user_pass_hash);
    if($pass_decode){
          $pass1=mysqli_real_escape_string($con,$_POST['password1']);
          $pass2=mysqli_real_escape_string($con,$_POST['password2']);

  
          if ($pass1 == $pass2) {
            $hashpass = password_hash($pass1, PASSWORD_BCRYPT);
            $sql = "UPDATE `users` SET `password` = '$hashpass' WHERE `UserID` =$user_id";
            $result =$db->execute($sql);
            echo "reload";
          }else{
              echo "Password Not Matched!";
          }
        
      }else{
          echo "Incorrect Current Password!";
      }
  }
