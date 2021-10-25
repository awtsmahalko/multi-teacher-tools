<?php
include '../core/config.php';
	$stu_fname = strtolower(clean($_POST['first']));
	$stu_lname = strtolower(clean($_POST['last']));
	$stu_mname = strtolower(clean($_POST['middle']));
	$class_id = $_POST['class_id'];
	$class_load_status = 1;
	
	$check_dup = mysql_fetch_array(mysql_query("SELECT count(class_load_id) FROM tbl_class_load WHERE class_id='$class_id' AND stu_lname='$stu_lname' AND stu_fname='$stu_fname' AND stu_mname='$stu_mname'"));
	if($check_dup[0] > 0){
		echo 2;
	}else{
		$query = mysql_query("INSERT INTO tbl_class_load (class_id,stu_fname,stu_mname,stu_lname,class_load_status) VALUES('$class_id','$stu_fname','$stu_mname','$stu_lname',$class_load_status)");
		$stu_id = mysql_insert_id();
		addZeroScoreNewStud($class_id,$stu_id);
			if($query){
				echo "Successfully Added";
			}else{
				echo 0;
			}
	}
?>