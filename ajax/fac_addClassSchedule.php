<?php
include '../core/config.php';

if(isset($_POST["id"]) && isset($_POST["id"]) != ""){
	$id = $_POST['id'];
	$time_from = $_POST['time_from'];
	$time_to = $_POST['time_to'];
	$room = $_POST['room'];
	$class_id = $_SESSION['class_id'] ;
	
	foreach ($id as $day) {
			$dup = checkDuplicateSched($class_id,$day,$room,$time_from,$time_to);
			if($dup > 0){
				echo "Duplicate Entry";
			}else{
				$result = mysql_query("INSERT INTO tbl_class_schedule (class_id,day,room,time_from,time_to,sched_status) VALUES ($class_id,'$day','$room','$time_from','$time_to',1)");
			}
	}
}
function checkDuplicateSched($class_id,$day,$room,$from,$to){
	$fetch = mysql_fetch_array(mysql_query("SELECT count(sched_id) FROM tbl_class_schedule WHERE class_id = $class_id AND day = '$day'  AND time_from = '$from' AND time_to = '$to'"));
	return $fetch[0];
}