<?php
include '../core/config.php';

if(isset($_POST["id"]) && isset($_POST["id"]) != ""){
	$f_id = $_POST['id'];
	
	foreach ($f_id as $val) {
		$exist = checkIfAlreadyHaveClass($val);
		if($exist > 0){
			echo "Cannot Delete Faculty ";
		}else{
			mysql_query("DELETE FROM tbl_faculty WHERE f_id = '$val'");
			$result = mysql_query("DELETE FROM tbl_user WHERE user_type=1 AND account_id='$val'");
				if($result){
					echo 1;
				}else{
					echo 0;
				}
		}
	}
}
function checkIfAlreadyHaveClass($val){
	$fetch = mysql_fetch_array(mysql_query("SELECT count(class_id) FROM tbl_class WHERE f_id in ('$val')"));
	return $fetch[0];
}