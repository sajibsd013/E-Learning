<?php
session_start();
if (isset($_GET['course'])) {

    $image = "certi.png";

    $createimage = imagecreatefrompng($image);
    $UserID = $_SESSION['userId'];
    $id = $_GET['id'];


    $output = "certificate" . $UserID . "-" . $id . ".png";

    $white = imagecolorallocate($createimage, 205, 245, 255);
    $black = imagecolorallocate($createimage, 0, 0, 0);

    $rotation = 0;


    //font directory for 
    $drFont = dirname(__FILE__) . "/developer.ttf";

    $name = $_SESSION['userName'];
    $course = $_GET['course'];
    $date = new DateTime();
    $datestr = $date->format('d-m-Y');

    $name_text = imagettftext($createimage, 16, $rotation, 180, 170, $black, $drFont, $name);
    $course_text = imagettftext($createimage, 17, $rotation, 180, 255, $black, $drFont, $course);
    $date_text = imagettftext($createimage, 11, $rotation, 355, 300, $black, $drFont, $datestr);

    imagepng($createimage, $output, 3);

    echo "reload";

}
