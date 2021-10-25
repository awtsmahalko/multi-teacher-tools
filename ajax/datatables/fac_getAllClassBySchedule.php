<?php
include '../../core/config.php';
	$result = mysql_query("SELECT * FROM tbl_class WHERE f_id=".$_SESSION['account_id']." AND class_status != 0 ") or die (mysql_error());
	$count = 1;
	$response['data'] = array();
	while($row = mysql_fetch_array($result)){
		$list = array();
		$list['check'] = "<input type='checkbox' value='".$row['class_id']."'>";
		$list['count'] = $count;
		$list['class_code'] = strtoupper($row['class_code']);
		$list['subject'] = strtoupper($row['subject']);
		$list['section'] = strtoupper($row['section']);
		$list['semester'] = $row['semester'];
		$list['year'] = $row['year']."-".($row['year'] + 1);
		$list['action'] = "<button class='btn btn-primary' title='Update Class' onclick='window.location=\"index.php?page=class-schedule&class_id=".$row['class_id']."\"'><span class='fa fa-calendar '></span></button>";
		array_push($response['data'], $list);
	$count++;
	}
	echo json_encode($response);
?>