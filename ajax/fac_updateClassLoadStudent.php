<?php
include '../core/config.php';
	$class_load_id = $_POST['class_load_id'];
	$stu_fname = $_POST['u_first'];
	$stu_mname = $_POST['u_middle'];
	$stu_lname = $_POST['u_last'];
	$class_id = $_SESSION['class_id'];

	$query = mysql_query("UPDATE tbl_class_load SET stu_fname='$stu_fname',stu_mname='$stu_mname',stu_lname='$stu_lname' WHERE class_load_id='$class_load_id' AND class_id='$class_id'");
	
	if($query){
		echo 1;
	}else{
		echo 0;
	}