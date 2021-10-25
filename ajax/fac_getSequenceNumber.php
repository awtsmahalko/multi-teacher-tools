<?php
include '../core/config.php';
$f_id = $_SESSION['account_id'];
$grading_system = $_POST['component'];
$class_id = $_POST['class_id'];

$max_score_no = mysql_fetch_array(mysql_query("SELECT max(score_no) from tbl_scores where grading_system = '$grading_system' and class_id='$class_id' and faculty_id='$f_id' "));

echo $max_score_no[0] + 1;

?>