<?php
include '../core/config.php';
$f_id = $_SESSION['account_id'];
$class_id = $_POST['id'];
$date_now = date("Y-m-d");

$settings = mysql_fetch_array(mysql_query("SELECT value_for_zero, passing_grade from tbl_settings where f_id='$f_id' and set_status=1 "));
$grading_system = mysql_fetch_array(mysql_query("SELECT * from tbl_grading_system where class_id='$class_id' and g_status=1 "));
function calculate_equivalent_grade($zero,$raw,$perfect){
	if($perfect == 0){
		return 0;
	}else{
		$d = (100 - $zero)/$perfect;
		$equivalent_score = ($zero) + ($raw * $d);
		return number_format($equivalent_score,2);	
	}
}
function getAttendanceOver($class_id){
	$fetch = mysql_fetch_array(mysql_query("SELECT count(att_id) FROM tbl_attendance WHERE class_id = $class_id AND stu_id = -1"));
	return number_format($fetch[0],0);
}
function getStudentAttPresent($class_id,$stu_id){
	$fetch = mysql_fetch_array(mysql_query("SELECT sum(P) FROM tbl_attendance WHERE class_id = $class_id AND stu_id = $stu_id"));
	return number_format($fetch[0],0);
}


$sql = mysql_query("UPDATE `tbl_class` SET `is_Submitted`='1' WHERE class_id='$class_id' and f_id='$f_id' ") or die(mysql_error());

if($sql){
	$fetch_students = mysql_query("SELECT * FROM `tbl_class_load` WHERE class_id='$class_id' ") or die(mysql_error());
	while($students_row = mysql_fetch_array($fetch_students)){
		$student_id = $students_row['class_load_id'];

		$values = array('g_quiz','g_recitation','g_exam','g_skills','g_attendance','g_project');
		$grade = 0;
		foreach ($values as $components){
			$average_score = mysql_fetch_array(mysql_query("SELECT avg(percentage_score) from tbl_scores where grading_system='$components' and class_id='$class_id' and faculty_id='$f_id' and student_id='$student_id'"));
			
			$grade += ($average_score[0] * ($grading_system[$components]/100));

		}

		//for attendance
		$zero_value = $settings['value_for_zero'] * 1;
		$raw_score = getStudentAttPresent($class_id,$student_id);
		$perfect_score = getAttendanceOver($class_id);
		$average_att = calculate_equivalent_grade($zero_value,$raw_score,$perfect_score);
		$attendance_ave = ($average_att * ($grading_system['g_attendance']/100));

		$final_grade = $grade + $attendance_ave;

		if(strtoupper($students_row['remarks']) != 'DROPPED'){
			if($final_grade >= $settings['passing_grade']){
				$remarks = 'Passed';
			}else{
				$remarks = 'Failed';
			}
		}else{
			$remarks = 'dropped';
		}
		
		$sql_update_grades = mysql_query("UPDATE `tbl_class_load` SET `final_grade`='$final_grade',`remarks`='$remarks',`date_remark`='$date_now' WHERE class_load_id='$student_id' and class_id='$class_id' ") or die(mysql_error());


		if(!$sql_update_grades){
			echo $final_grade;
		}


	}
}
?>