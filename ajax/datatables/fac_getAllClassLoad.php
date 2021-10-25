<?php
include '../../core/config.php';
	$class_id = $_POST['id'];
	$result = mysql_query("SELECT * FROM tbl_class_load WHERE class_id='".$class_id."' AND class_load_status != 0 ORDER by stu_lname ASC") or die (mysql_error());
	$count = 1;
	$response['data'] = array();
	while($row = mysql_fetch_array($result)){
		$list = array();
		$list['check'] = "<input type='checkbox' value='".$row['class_load_id']."'>";
		$list['count'] = $count;
		$list['student'] = ucfirst($row['stu_lname']).",".ucfirst($row['stu_fname'])." ".ucfirst($row['stu_mname']);
		$list['action'] = "<button class='btn btn-primary' onclick='updateStudentModal(".$row['class_load_id'].")'><span class='glyphicon glyphicon-edit'></span></button>";
		array_push($response['data'], $list);
	$count++;
	}
	echo json_encode($response);
?>