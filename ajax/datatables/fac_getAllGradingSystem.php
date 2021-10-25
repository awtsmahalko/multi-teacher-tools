<?php
include '../../core/config.php';

	/*
	$checkIfExist = mysql_fetch_array(mysql_query("SELECT count(g_id) FROM tbl_grading_system WHERE f_id=".$_SESSION['account_id']." AND g_status != 0 "));

	$response['data'] = array();
	if($checkIfExist[0] > 0){
		$result = mysql_query("SELECT * FROM tbl_grading_system WHERE f_id=".$_SESSION['account_id']." AND g_status != 0 ") or die (mysql_error());
		while($row = mysql_fetch_array($result)){
			$list = array();
				$list['quiz'] = $row['g_quiz'];
				$list['recitation'] = $row['g_recitation'];
				$list['exam'] = $row['g_exam'];
				$list['skills'] = $row['g_skills'];
				$list['attendance'] = $row['g_attendance'];
				$list['project'] = $row['g_project'];
				$list['action'] = "<button class='btn btn-success' title='Update Class' onclick='updateGradingSystem(".$row['g_id'].")'><span class='glyphicon glyphicon-edit'></span></button>";
			array_push($response['data'], $list);
		}
	}else{
		$result = mysql_query("SELECT * FROM tbl_grading_system WHERE f_id=0 AND g_status != 0 ") or die (mysql_error());
		while($row = mysql_fetch_array($result)){
			$list = array();
				$list['quiz'] = $row['g_quiz'];
				$list['recitation'] = $row['g_recitation'];
				$list['exam'] = $row['g_exam'];
				$list['skills'] = $row['g_skills'];
				$list['attendance'] = $row['g_attendance'];
				$list['project'] = $row['g_project'];
				$list['action'] = "<button class='btn btn-success' title='Update Class' onclick='updateGradingSystem(".$row['g_id'].")'><span class='glyphicon glyphicon-edit'></span></button>";
			array_push($response['data'], $list);
		}
	}
	*/
	$response['data'] = array();
		$result = mysql_query("SELECT * FROM tbl_grading_system as s INNER JOIN tbl_class as c ON c.class_id = s.class_id WHERE c.f_id=".$_SESSION['account_id']." AND s.g_status != 0 ") or die (mysql_error());
		while($row = mysql_fetch_array($result)){
			$list = array();
				$list['class_code'] = $row['class_code'];
				$list['quiz'] = $row['g_quiz'];
				$list['recitation'] = $row['g_recitation'];
				$list['exam'] = $row['g_exam'];
				$list['skills'] = $row['g_skills'];
				$list['attendance'] = $row['g_attendance'];
				$list['project'] = $row['g_project'];
				$list['action'] = "<button class='btn btn-success' title='Update Class' onclick='updateGradingSystem(".$row['g_id'].")'><span class='glyphicon glyphicon-edit'></span></button>";
			array_push($response['data'], $list);
		}
	echo json_encode($response);
?>