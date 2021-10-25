<?php
include '../core/config.php';
	$f_id = $_SESSION['account_id'];
	$class_id = $_POST['aclass_id'];
	$g_quiz = $_POST['ag_quiz'];
	$g_recitation = $_POST['ag_recitation'];
	$g_exam = $_POST['ag_exam'];
	$g_skills = $_POST['ag_skills'];
	$g_attendance = $_POST['ag_attendance'];
	$g_project = $_POST['ag_project'];
	$sum = $g_quiz + $g_recitation + $g_exam + $g_skills + $g_attendance + $g_project;
	if($sum != 100){
		echo "Sum of all components must be equal to 100";
	}else{
	$query = mysql_query("INSERT INTO `tbl_grading_system` (`g_id`, `class_id`, `g_quiz`, `g_recitation`, `g_exam`, `g_skills`, `g_attendance`, `g_project`, `g_status`) VALUES (NULL, '$class_id', '$g_quiz', '$g_recitation', '$g_exam', '$g_skills', '$g_attendance', '$g_project', '1')");

	if($query){
		echo "Successfully Added";
	}else{
		echo "Error occur while saving";
	}
	}