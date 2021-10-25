<?php
include '../core/config.php';
$f_id = $_SESSION['account_id'];

$values = explode(',', $_POST['post_data']);
$student_id = $values[0];
$score = $values[1];

$date_added = $_POST['date_of_scoring'];
$perfect_score = $_POST['perfect_score'];
$grading_system = $_POST['component'];
$class_id = $_POST['class_id'];
$sequence_number = $_POST['sequence_number'];

$class_term = mysql_fetch_array(mysql_query("SELECT class_term_id from tbl_class_term where f_id='$f_id' and class_term_status=1 "));
$value_for_zero = mysql_fetch_array(mysql_query("SELECT value_for_zero from tbl_settings where f_id='$f_id' and set_status=1 "));

//$grading_system = mysql_fetch_array(mysql_query("SELECT $grading_system from tbl_grading_system where class_id='$class_id' and g_status=1 "));

$d = (100 - $value_for_zero[0])/$perfect_score;
$percentage_score = ($value_for_zero[0]) + ($score * $d);

$sql = mysql_query("INSERT INTO `tbl_scores`(score_no, `grading_system`, `class_id`, `class_term`, `faculty_id`, `student_id`, `score`, `perfect_score`, `percentage_score`, `date_added`) VALUES ('$sequence_number', '$grading_system','$class_id','$class_term[0]','$f_id','$student_id','$score','$perfect_score','$percentage_score','$date_added')") or die(mysql_error());

$student_row = mysql_fetch_array(mysql_query("SELECT * from tbl_class_load where class_load_id='$student_id' "));

if($sql){
	echo "<div style='color:green;'><span class='fa fa-check-circle'></span> Successfully added score for <span style='text-transform: capitalize;'><strong>".$student_row['stu_fname'].' '.$student_row['stu_mname'].' '.$student_row['stu_lname']."</strong></span></div>";
}else{
	echo "<div style='color:red;'><span class='fa fa-close-circle'></span> Error: Failed in executing query. Unable to add score for <span style='text-transform: capitalize;'><strong>".$student_row['stu_fname'].' '.$student_row['stu_mname'].' '.$student_row['stu_lname']."</strong></span></div>";
}



?>