<?php
include '../core/config.php';
	$class_code = clean($_POST['class_code']);
	$f_id = $_SESSION['account_id'];
	$subject = clean($_POST['subject']);
	$section = clean($_POST['section']);
	$semester = clean($_POST['semester']);
	$year = clean($_POST['year']);
	$class_status = 1;
	$row = 5;
	$column = 4;
	
	$check_dup = mysql_fetch_array(mysql_query("SELECT count(class_id) FROM tbl_class WHERE f_id='$f_id' AND subject='$subject' AND section='$section' AND semester='$semester' AND year='$year'"));
	if($check_dup[0] > 0){
		echo 2;
	}else{
		$query = mysql_query("INSERT INTO tbl_class (`class_code`,`f_id`,`subject`,`section`,`semester`,`year`,`row`,`column`,`class_status`) VALUES('$class_code','$f_id','$subject','$section','$semester','$year','$row','$column','$class_status')");
			if($query){
				echo 1;
			}else{
				echo 0;
			}
	}
?>