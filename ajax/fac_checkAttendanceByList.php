<?php
include '../core/config.php';
$class_id = $_POST['hidden_class_id'];
$date = $_POST['date'];
$date = date('Y-m-d', strtotime($date));
$term = getOpenTerm();
$fetch = mysql_query("SELECT class_load_id FROM tbl_class_load WHERE class_id=$class_id");
$success_checker ='';
$errors_checker ='';
mysql_query("INSERT INTO `tbl_attendance` (`att_id`, `att_date`, `class_id`, `stu_id`, `term`, `att_status`) VALUES (NULL, '$date', '$class_id', '-1', '$term', '1')");
while($row = mysql_fetch_array($fetch)){
	$post = "name_".$row[0];
	$remark = $_POST[''.$post.''];
	if($remark == 'P'){
		$remark_name = '<font color="blue">PRESENT</font>';
		$p = 1;
		$l = 0;
		$a = 0;
	}elseif($remark == 'L'){
		$remark_name = '<font color="red">LATE</font>';
		$p = 0;
		$l = 1;
		$a = 0;
	}elseif($remark == 'A'){
		$remark_name = '<font color="red">ABSENT</font>';
		$p = 0;
		$l = 0;
		$a = 1;
	}
	$query = mysql_query("INSERT INTO `tbl_attendance` (`att_id`, `att_date`, `P`, `L`, `A`, `class_id`, `stu_id`, `term`, `att_status`) VALUES (NULL, '$date', $p, $l, $a, '$class_id', '$row[0]', '$term', '1')");
	if($query){
		$success_checker .=  "<div style='color:green;'><span class='fa fa-check-circle'></span> Successfully marked <span style='text-transform: capitalize;'><strong>".getStudentNameById($row[0])."</strong> as ".$remark_name."</span></div>";
	}else{
		$errors_checker .=  "<span style='color: red; class='fa fa-close-circle''>FAILED! <strong>(".getStudentNameById($row[0]).")</strong>: Attendance Error!</span><br>";
	}
}
echo "Attendance DATE : ".date('F d, Y',strtotime($date))."<br>";
echo $success_checker;
echo $errors_checker;
?>
