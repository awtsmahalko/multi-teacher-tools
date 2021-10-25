<?php
include '../../core/config.php';
	$result = mysql_query("SELECT * FROM tbl_class_term WHERE f_id=".$_SESSION['account_id']."") or die (mysql_error());
	$count = 1;
	$response['data'] = array();
	while($row = mysql_fetch_array($result)){
		$list = array();
		$openTerm = getOpenTerm();
		if($row['class_term_status'] == 0){
			$status = "<font color='#d9534f'>Closed</font>";
			if($openTerm > 0){
				$btn_stat = "";
			}else{
				$btn_stat = "<button class='btn btn-primary' onclick='openTerm(".$row['class_term_id'].")'><span class='glyphicon glyphicon-ok'></span></button>";
			}
		}else{
			$status = "<font color='#337ab7'>Open</font>";
			if($openTerm > 0){
				$btn_stat = "<button class='btn btn-danger' onclick='closeTerm(".$row['class_term_id'].")'><span class='glyphicon glyphicon-remove'></span></button>";
			}else{
				$btn_stat = "";
			}
		}
		$list['check'] = "<input type='checkbox' value='".$row['class_term_id']."'>";
		$list['count'] = $count;
		$list['term_name'] = strtoupper($row['term_name']);
		$list['status'] = $status;
		$list['action'] = $btn_stat;
		array_push($response['data'], $list);
	$count++;
	}
	echo json_encode($response);
	//"<button class='btn btn-success' title='Update Class Term' onclick='updateClassModal(".$row['class_term_id'].")'><span class='glyphicon glyphicon-edit'></span></button>&nbsp;"
?>