<?php
include '../core/config.php';
	$class_code = $_POST['u_class_code'];
	$subject = $_POST['u_subject'];
	$section = $_POST['u_section'];
	$semester = $_POST['u_semester'];
	$year = $_POST['u_year'];
	$class_id = $_POST['u_class_id'];
	$checkExist = mysql_fetch_array(mysql_query("SELECT count(class_id) FROM tbl_class WHERE class_code='$class_code' AND subject='$subject'AND section='$section' AND semester='$semester' AND `year`='$year' AND class_id != $class_id"));
	if($checkExist[0] > 0){
		echo "Duplicate Entry";
	}else{
		$query = mysql_query("UPDATE tbl_class SET class_code='$class_code',subject='$subject',section='$section',semester='$semester',`year`='$year' WHERE class_id='$class_id'");
		if($query){
			echo "Class ".$class_code." Successfully Update";
		}else{
			echo "Query Error";
		}
	}
?>