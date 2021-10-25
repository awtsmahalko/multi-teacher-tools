<?php
include '../core/config.php';
	$class_term_id = $_POST['id'];
	$status = $_POST['status'];
	$f_id = $_SESSION['account_id'];

	if($status == '0'){
		$open = checkIfMayOpenNa();
		if($open > 0){
			echo 2;
		}else{
			$query = mysql_query("UPDATE tbl_class_term SET class_term_status=1 WHERE f_id=$f_id AND class_term_id=$class_term_id");
		}
	}else{
		$query = mysql_query("UPDATE tbl_class_term SET class_term_status=0 WHERE f_id=$f_id");
	}

	if($query){
		echo 1;
	}else{
		echo 0;
	}
function checkIfMayOpenNa(){
	$f_id = $_SESSION['account_id'];

	$fetch = mysql_fetch_array(mysql_query("SELECT count(class_term_status) FROM tbl_class_term WHERE f_id=$f_id AND class_term_status=1"));
	return $fetch[0];
}