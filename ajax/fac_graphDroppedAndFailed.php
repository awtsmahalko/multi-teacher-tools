<?php
include '../core/config.php';

$f_id = $_SESSION['account_id'];
$deficiency = $_GET["deficiency"];
$semester = $_GET["semester"];
$year = $_GET["year"];

if($deficiency == 0){
	$remarks = "Dropped";
}else{
	$remarks = "Failed";
}

	$query = "SELECT * FROM `tbl_class` WHERE f_id='$f_id' AND year='$year' AND semester='$semester'";
	$result = mysql_query($query) or die(mysql_error());
	
	$data = array();
	while ($row = mysql_fetch_assoc($result)) {

		$item = array();


		$count_drop_or_failed = mysql_fetch_array(mysql_query("SELECT COUNT(class_load_id) FROM `tbl_class_load` WHERE class_id='$row[class_id]' AND UCASE(remarks)=UCASE('$remarks')"));
		$number_of_dropped_or_failed_students = $count_drop_or_failed[0]*1;
		
		$item['name'] = $row["subject"]." <strong>(".$remarks."</strong>:". $number_of_dropped_or_failed_students.")";
		$item['y'] = $number_of_dropped_or_failed_students;
		

		array_push($data, $item);

	}

echo json_encode($data);
