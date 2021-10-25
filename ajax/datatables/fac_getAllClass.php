<?php
include '../../core/config.php';
	$result = mysql_query("SELECT * FROM tbl_class WHERE f_id=".$_SESSION['account_id']." AND class_status != 0 ") or die (mysql_error());
	$count = 1;
	$response['data'] = array();
	while($row = mysql_fetch_array($result)){
		$list = array();
		if($row['is_Submitted'] == 1){
			$disabled = "disabled";
		}else{
			$disabled = "";
		}
		$list['check'] = "<input type='checkbox' value='".$row['class_id']."'>";
		$list['count'] = $count;
		$list['class_code'] = strtoupper($row['class_code']);
		$list['subject'] = strtoupper($row['subject']);
		$list['section'] = strtoupper($row['section']);
		$list['semester'] = $row['semester'];
		$list['year'] = $row['year']."-".($row['year'] + 1);
		$list['action'] = "<button class='btn btn-success' data-toggle='tooltip' data-placement='left' title='Update Class' onclick='updateClassModal(".$row['class_id'].")' ".$disabled."><span class='glyphicon glyphicon-edit'></span></button>&nbsp;<button class='btn btn-default' title='Class Loads' onclick='window.location=\"index.php?page=class-load&class_id=".$row['class_id']."\"' ".$disabled."><span class='fa fa-users fa-fw'></span></button>&nbsp;<button class='btn btn-primary' title='Seat Plan' onclick='window.location=\"index.php?page=seat-plan&class_id=".$row['class_id']."\"' ".$disabled."><span class='glyphicon glyphicon-list'></span></button>";
		array_push($response['data'], $list);
	$count++;
	}
	echo json_encode($response);
?>