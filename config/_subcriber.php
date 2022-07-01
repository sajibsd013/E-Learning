<?php
session_start();

include '../db/_db.php';
$db = new DB();

if(isset($_GET['email'])){
	$email=$_GET['email'];
    $inserquery="INSERT INTO subcriber(`email`) values('$email')";
    $iquery=$db->execute($inserquery);
    if($iquery){
        echo "Subcribe success";
    }else{
        echo "Already Subcribed";
    }
}
$db->close();
?>
