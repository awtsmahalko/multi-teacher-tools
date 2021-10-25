<?php
include '../core/config.php';
if(isset($_POST["class_id"]) && isset($_POST["class_id"]) != ""){
	$class_id = $_POST['class_id'];
	$seat_number = $_POST['seat_number'];
	
	$query = "SELECT * FROM tbl_seat_plan WHERE class_id = $class_id AND seat_number='$seat_number'";
	$result = mysql_query($query) or die(mysql_error());
	$response = array();
	
	if(mysql_num_rows($result) > 0){
		while ($row = mysql_fetch_assoc($result)) {
			
			$student_result = mysql_fetch_array(mysql_query("SELECT * FROM `tbl_class_load` WHERE class_load_id='$row[student_id]'"));
			
            $response["student_name"] = $student_result["stu_lname"].", ".$student_result["stu_fname"]." ".$student_result["stu_mname"];
		}
	}else
    {
        $response['status'] = 200;
        $response['message'] = "Data not found!";
    }
    echo json_encode($response);
}
?>