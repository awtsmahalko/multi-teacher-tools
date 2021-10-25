<?php
include '../core/config.php';

if(isset($_POST["id"]) && isset($_POST["id"]) != ""){
	$f_id = $_POST['id'];
	
	foreach ($f_id as $val) {
			$result = mysql_query("DELETE FROM tbl_class_load WHERE class_load_id='$val'");
				if($result){
					echo 1;
				}else{
					echo 0;
				}
	}
}