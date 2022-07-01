<?php
    session_start();
    include '../../db/_db.php';
    if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"]==true) {
        $user_id = $_SESSION["userId"];
        if(isset($_POST['problem_title'])){
            $blog_title=mysqli_real_escape_string($con,$_POST['problem_title']);
            $blog_desc=mysqli_real_escape_string($con,$_POST['elaborate_problem']);
            $short_desc=mysqli_real_escape_string($con,$_POST['short_desc']);

            $sql = "INSERT INTO `blog` (`blog_title`, `UserID`, `blog_desc`,`short_desc`) VALUES ('$blog_title', '$user_id', '$blog_desc','$short_desc')";
            $result = mysqli_query($con,$sql);
            if($result){
                $dataset = array("status" => "success", "path" => "/blog/");
                $dataJSON = json_encode($dataset);
                echo $dataJSON;
            }
        }
    }

?>