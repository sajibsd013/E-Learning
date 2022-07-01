<?php
session_start();
$UserID = $_SESSION["userId"];
include '../../db/_db.php';
$db = new DB();

if (isset($_POST['name'])) {
    $name =  $_POST['name'];
    $email =  $_POST['email'];
    $mobile =  $_POST['mobile'];
    $CourseID =  $_POST['CourseID'];
    $price =  $_POST['price'];

    $sql = "SELECT `StudentID` from `enrolls` WHERE `StudentID`='$UserID' AND `CourseID`='$CourseID'";
    $count = $db->getCount($sql);


    if ($count) {
        echo "Already Ennrolled!";
    } else {

        $inserquery = "INSERT INTO `enrolls` (`StudentID`, `name`, `email`, `mobile`,`CourseID`,`price`) 
                        VALUES ( '$UserID', '$name', '$email', '$mobile','$CourseID','$price')";

        $iquery = $db->execute($inserquery);
        if ($iquery) {
            $dataset = array("status" => "success", "path" => "/courses/cart.php");
            $dataJSON = json_encode($dataset);
            echo $dataJSON;
        } else {
            echo "Server Error!";
        }
    }
}

$db->close();
