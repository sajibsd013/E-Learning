<?php
include "../../db/_db.php";
$db = new DB();
$sql =  "SELECT * FROM `blog`  WHERE `status`='approved' ORDER BY `timestand` ASC";
$result = $db->execute($sql);
$db->close();

$labels= [];
$dataset= [];
$data= array(0,0,0,0,0,0,0,0,0,0,0,0);
foreach($rows as $row){
    $timestand= $row["timestand"] ;
    $datetime = new DateTime($timestand,timezone_open("asia/dhaka"));

    $m = $datetime->format("M");
    $y = $datetime->format("Y");

    if(array_key_exists($m,$dataset)){
        $value = $dataset[$m]+1;
        $dataset[$m] = $value;
    }
    else{
       $dataset += [$m => 1];
    }
}
$dataJSON = json_encode($dataset);
echo $dataJSON;
