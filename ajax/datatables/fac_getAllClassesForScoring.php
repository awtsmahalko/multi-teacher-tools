<?php
include '../../core/config.php';
	$result = mysql_query("SELECT * FROM tbl_class WHERE f_id=".$_SESSION['account_id']." AND class_status != 0 ") or die (mysql_error());
	$count = 1;
	$response['data'] = array();
	while($row = mysql_fetch_array($result)){
		$list = array();

		$class_id = $row['class_id'];
		$no_of_students = mysql_fetch_array(mysql_query("SELECT count(class_load_id) from tbl_class_load where class_id='$class_id' "));

		$list['check'] = "<input type='checkbox' value='".$row['class_id']."'>";
		$list['count'] = $count;
		$list['class_id'] = $class_id;
		$list['class_code'] = strtoupper($row['class_code']);
		$list['subject'] = strtoupper($row['subject']);
		$list['section'] = strtoupper($row['section']);
		$list['semester'] = $row['semester'];
		$list['is_Submitted'] = $row['is_Submitted'];
		$list['no_of_students'] = $no_of_students[0];
		
		$list['year'] = $row['year']."-".($row['year'] + 1);
		$list['action'] = "<button class='btn btn-default' title='Add Scores' onclick='window.location=\"index.php?page=add-scores&id=".$row['class_id']."\"'><span class='fa fa-plus-circle fa-fw'></span></button>";
		array_push($response['data'], $list);
		$count++;
	}
	
	echo json_encode($response);
?>