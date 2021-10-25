<?php
include '../../core/config.php';
	$result = mysql_query("SELECT * FROM tbl_faculty WHERE f_status != 0 ") or die (mysql_error());
	$count = 1;
	$response['data'] = array();
	while($row = mysql_fetch_array($result)){
		if($row['f_gender'] == 0){
			$gender = "Female";
		}else{
			$gender = "Male";
		}
		$list = array();
		$list['check'] = "<input type='checkbox' value='".$row['f_id']."'>";
		$list['count'] = $count;
		$list['id_no'] = $row['f_id_no'];
		$list['name'] = $row['f_lname'].", ".$row['f_fname']." ".$row['f_mname'];
		$list['gender'] = $gender;
		$list['birthdate'] = date('F d, Y', strtotime($row['f_bdate']));
		$list['address'] = $row['f_address'];
		$list['action'] = "<button class='btn btn-success' onclick='updateFacultyModal(".$row['f_id'].")'><span class='glyphicon glyphicon-edit'></span></button>";
		array_push($response['data'], $list);
	$count++;
	}
	echo json_encode($response);
?>