<?php
include '../core/config.php';
	$f_id = $_SESSION['account_id'];
	$field = $_POST['column'];
	$val = $_POST['editval'];
	$fetch = mysql_fetch_array(mysql_query("SELECT * FROM tbl_settings WHERE f_id='$f_id'"));
	if($fetch[0] > 0){
		$query = mysql_query("UPDATE tbl_settings SET $field = '$val' WHERE f_id=$f_id");
	}else{
		$query = mysql_query("INSERT INTO tbl_settings(f_id,$field,set_status) VALUES($f_id,'$val',1)");
	}
	if($query){
		echo 1;
	}else{
		echo 0;
	}
?>