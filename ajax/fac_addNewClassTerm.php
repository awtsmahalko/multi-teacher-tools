<?php
include '../core/config.php';
	$term_name = clean($_POST['term_name']);
	$f_id = $_SESSION['account_id'];
	$class_term_status = 0;
	
	$check_dup = mysql_fetch_array(mysql_query("SELECT count(class_term_id) FROM tbl_class_term WHERE f_id=$f_id AND term_name = '$term_name'"));
	if($check_dup[0] > 0){
		echo 2;
	}else{
		$query = mysql_query("INSERT INTO tbl_class_term (f_id,term_name,class_term_status) VALUES('$f_id','$term_name','$class_term_status')");
			if($query){
				echo 1;
			}else{
				echo 0;
			}
	}
?>