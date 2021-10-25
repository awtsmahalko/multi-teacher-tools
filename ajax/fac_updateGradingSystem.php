<?php
include '../core/config.php';
	$f_id = $_SESSION['account_id'];
	$g_id = $_POST['g_id'];
	$g_quiz = $_POST['g_quiz'];
	$g_recitation = $_POST['g_recitation'];
	$g_exam = $_POST['g_exam'];
	$g_skills = $_POST['g_skills'];
	$g_attendance = $_POST['g_attendance'];
	$g_project = $_POST['g_project'];

	$query = mysql_query("UPDATE tbl_grading_system SET g_quiz = $g_quiz, g_recitation = $g_recitation, g_exam = $g_exam, g_skills = $g_skills, g_attendance = $g_attendance, g_project = $g_project WHERE g_id = $g_id");
		//$query = mysql_query("INSERT INTO `tbl_grading_system` (`g_id`, `f_id`, `g_quiz`, `g_recitation`, `g_exam`, `g_skills`, `g_attendance`, `g_project`, `g_status`) VALUES (NULL, '$f_id', '$g_quiz', '$g_recitation', '$g_exam', '$g_skills', '$g_attendance', '$g_project', '1')");

	if($query){
		echo 1;
	}else{
		echo 0;
	}