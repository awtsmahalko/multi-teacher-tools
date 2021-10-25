<?php
include '../core/config.php';
	$class_id = $_POST["class_id"];
	$student_id = $_POST["student_id"];
	$seat_number = $_POST["seat_number"];
	
	$checker = mysql_fetch_array(mysql_query("SELECT COUNT(seat_plan_id) FROM `tbl_seat_plan` WHERE class_id='$class_id' AND student_id='$student_id'"));
	
	if($checker[0] > 0){
		mysql_query("UPDATE `tbl_seat_plan` SET seat_number='$seat_number' WHERE class_id='$class_id' AND `student_id`='$student_id' ");
	}else{
		mysql_query("INSERT INTO `tbl_seat_plan`(`class_id`, `student_id`, `seat_number`, `seat_status`) VALUES ('$class_id','$student_id','$seat_number','0')");
	}
	
?>