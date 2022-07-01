<?php
include '../../db/_db.php';

if(isset($_GET['BlogID'])){
    $BlogID = $_GET['BlogID'];
    $sql = "UPDATE `blog` SET `status` = 'approved' WHERE `BlogID` = '$BlogID'";
    $result = mysqli_query($con,$sql);
    if($result){
      echo "reload";
    }
  }


if(isset($_GET['CourseID'])){
    $CourseID = $_GET['CourseID'];
    $sql = "UPDATE `courses` SET `status` = 'approved' WHERE `CourseID` = '$CourseID'";
    $result = mysqli_query($con,$sql);
    if($result){
      echo "reload";
    }
  }

?>