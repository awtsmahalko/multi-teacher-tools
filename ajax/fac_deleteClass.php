<?php
include '../core/config.php';

if(isset($_POST["id"]) && isset($_POST["id"]) != ""){
	$f_id = $_POST['id'];
	
	foreach ($f_id as $val) {
		$exist = checkIfAlreadyHaveLoad($val);
		if($exist > 0){
			echo "Cannot Delete Class ";
		}else{
			$result = mysql_query("DELETE FROM tbl_class WHERE class_id='$val'");
				if($result){
					echo 1;
				}else{
					echo 0;
				}
		}
	}
}
function checkIfAlreadyHaveLoad($val){
	$fetch = mysql_fetch_array(mysql_query("SELECT count(class_load_id) FROM tbl_class_load WHERE class_id IN ('$val')"));
	return $fetch[0];
}