<?php
session_start();
include '../../db/_db.php';
$db = new DB();

if (isset($_GET['email'])) {
    $email = $_GET['email'];
    $sql = "SELECT * FROM `users` WHERE `email`='$email'";
    $result = $db->execute($sql);

    if ($result) {
        $row = mysqli_fetch_assoc($result);
        $dataJSON = json_encode($row);
        echo $dataJSON;
    }
}


if (isset($_POST['CourseID'])) {
    $CourseID =  $_POST['CourseID'];
    $UserID =  $_POST['UserID'];
    $password =  $_POST['password'];
    if ($UserID == $_SESSION['userId']) {
        echo "sorry, you are Instructor";
    } else {
        $s_user = "SELECT `password` from `users` where `UserID`=" . $_SESSION['userId'];
        $s_row = $db->getRow($s_user);
        $user_pass_hash = $s_row['password'];
        $pass_decode = password_verify($password, $user_pass_hash);
        if ($pass_decode) {

            $sql = "SELECT * FROM `moderators` WHERE `UserID`='$UserID' AND `CourseID`='$CourseID' ";
            $count = $db->getCount($sql);
            if ($count) {
                echo "Already Exist";
            } else {
                $inserquery = "INSERT INTO `moderators` (`UserID`, `CourseID`) 
                                VALUES ( '$UserID', '$CourseID')";

                $iquery = $db->execute($inserquery);
                if ($iquery) {
                    echo "reload";
                } else {
                    echo "Error Found";
                }
            }
        } else {
            echo "Incorrect Password";
        }
    }
}
$db->close();
