<?php
function getClassIdFromGs(){
	$fetch_class_from_gs = mysql_query("SELECT s.class_id FROM tbl_grading_system as s INNER JOIN tbl_class as c ON c.class_id = s.class_id WHERE c.f_id=".$_SESSION['account_id']." AND s.g_status != 0 ");
	$class_id_gs = "";
	while ($row_class_from_gs = mysql_fetch_array($fetch_class_from_gs)) {
		$class_id_gs .=",".$row_class_from_gs[0];
	}
	return substr($class_id_gs, 1);
}
function getClassCodeById($class_id){
	$fetch = mysql_fetch_array(mysql_query("SELECT class_code FROM tbl_class WHERE class_id = $class_id"));
	return $fetch[0];
}
function getSectionNameByClassId(){
	$class_id = $_SESSION['class_id'];
	$fetch = mysql_fetch_array(mysql_query("SELECT section FROM tbl_class WHERE class_id = $class_id"));
	return $fetch[0];
}
function getClassCodeByClassId(){
	$class_id = $_SESSION['class_id'];
	$fetch = mysql_fetch_array(mysql_query("SELECT class_code FROM tbl_class WHERE class_id = $class_id"));
	return $fetch[0];
}
function getSubjectByClassId(){
	$class_id = $_SESSION['class_id'];
	$fetch = mysql_fetch_array(mysql_query("SELECT subject FROM tbl_class WHERE class_id = $class_id"));
	return $fetch[0];
}
function getSubjectByClassIds($class_id){
	$fetch = mysql_fetch_array(mysql_query("SELECT subject FROM tbl_class WHERE class_id = $class_id"));
	return $fetch[0];
}
function getOpenTerm(){
$f_id = $_SESSION['account_id'];
	$fetch = mysql_fetch_array(mysql_query("SELECT class_term_id FROM tbl_class_term WHERE f_id = $f_id AND class_term_status = 1"));
	return $fetch[0];
}
function getStudentNameById($id){
	$fetch = mysql_fetch_array(mysql_query("SELECT * FROM tbl_class_load WHERE class_load_id = $id"));
	return ucfirst($fetch['stu_lname']).", ".ucfirst($fetch['stu_fname'])." ".ucfirst($fetch['stu_mname']);
}
function getLateEqualAbsent(){
$f_id = $_SESSION['account_id'];
	$fetch = mysql_fetch_array(mysql_query("SELECT late FROM tbl_settings WHERE f_id=$f_id"));
	return $fetch[0];
}
function getAbsentToDrop(){
$f_id = $_SESSION['account_id'];
	$fetch = mysql_fetch_array(mysql_query("SELECT absent FROM tbl_settings WHERE f_id=$f_id"));
	return $fetch[0];
}
function saveDBDropping($stu_id,$class_id){
$f_id = $_SESSION['account_id'];
$date = date('Y-m-d');
	$check = mysql_fetch_array(mysql_query("SELECT count(notif_id) FROM tbl_notification WHERE f_id=$f_id AND class_id = $class_id AND stu_id = $stu_id"));
	if($check[0] > 0){
	}else{
		mysql_query("INSERT INTO tbl_notification (f_id,class_id,stu_id,message,`date`,notif_status) VALUES($f_id,$class_id,$stu_id,'Dropped','$date',1)");
		mysql_query("UPDATE tbl_class_load SET remarks = 'Dropped', date_remark = '$date' WHERE class_id = $class_id AND class_load_id = $stu_id");
	}
}
function getCandidateForDrop($class_id){
$f_id = $_SESSION['account_id'];
	$late_st = getLateEqualAbsent();
	$absent_st = getAbsentToDrop();
	$fetch_stu_id = mysql_query("SELECT class_load_id FROM tbl_class_load WHERE class_id = '$class_id'");
	while($row = mysql_fetch_array($fetch_stu_id)){
		$fetch = mysql_fetch_array(mysql_query("SELECT sum(L),sum(A) FROM tbl_attendance WHERE stu_id=$row[0] AND class_id=$class_id"));
		if($late_st == 0){
			$late = 0;
		}else{
			$late = number_format(($fetch[0]/$late_st),0);
		}
		$total_absent = $late + $fetch[1];
		if($absent_st > 0){
			if($total_absent >= $absent_st){
				//notify
				saveDBDropping($row[0],$class_id);
			}
		}
	}
}
function getNotificationNo(){
$f_id = $_SESSION['account_id'];
$fetch = mysql_fetch_array(mysql_query("SELECT count(*) FROM tbl_notification WHERE f_id=$f_id and notif_status=1"));
return $fetch[0];
}
function addZeroScoreNewStud($class_id,$stu_id){
$f_id = $_SESSION['account_id'];
$term_id = getOpenTerm();
	$fetch_grading_system = mysql_query("SELECT grading_system FROM `tbl_scores` WHERE faculty_id = $f_id GROUP BY grading_system");
	while($row_grading_system = mysql_fetch_array($fetch_grading_system)){
		$fetch_scores = mysql_query("SELECT * FROM tbl_scores WHERE grading_system = '$row_grading_system[0]' AND faculty_id = $f_id AND class_id = $class_id GROUP BY score_no");
			while($row_scores = mysql_fetch_array($fetch_scores)){
				$score_no = $row_scores['score_no'];
				$grading_system = $row_scores['grading_system'];
				$class_id = $row_scores['class_id'];
				$class_term = $row_scores['class_term'];
				$faculty_id = $row_scores['faculty_id'];
				$perfect_score = $row_scores['perfect_score'];
				$percentage_score = getValueOfZero();
				$date_added = $row_scores['date_added'];
				mysql_query("INSERT INTO tbl_scores (score_no,grading_system,class_id,class_term,faculty_id,student_id,score,perfect_score,percentage_score,date_added) VALUES ('$score_no','$grading_system','$class_id','$class_term',$faculty_id,$stu_id,0,'$perfect_score','$percentage_score','$date_added')");
			}
	}
}
function getValueOfZero(){
$f_id = $_SESSION['account_id'];
	$fetch = mysql_fetch_array(mysql_query("SELECT value_for_zero from tbl_settings where f_id='$f_id' and set_status=1 "));
	return $fetch[0] * 1;
}
function deleteStudentZero(){
	mysql_query("DELETE FROM tbl_seat_plan WHERE student_id=0");
}
?>