<?php
$columnHeader ='';
$columnHeader = "LAST NAME" . "," . "FIRST NAME" . "," . "MIDDLE NAME";

$setData='';
header("Content-type: application/octet-stream");
header("Content-Disposition: attachment; filename=class_load_student.csv");
header("Pragma: no-cache");
header("Expires: 0");

echo ucwords($columnHeader)."\n".$setData."\n";
?>