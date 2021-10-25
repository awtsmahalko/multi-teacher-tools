<option value='0'>Please Choose:</option>
<?php
include '../core/config.php';
	$class_id = $_POST["class_id"];
	$seat_number = $_POST["seat_number"];

	$get_student_id = mysql_fetch_array(mysql_query("SELECT student_id FROM `tbl_seat_plan` WHERE class_id='$class_id' AND seat_number='$seat_number'"));
	$student_id = $get_student_id[0];
	
	$fetch_class_load = mysql_query("SELECT * FROM `tbl_class_load` WHERE class_id='$class_id'");
	while($class_load_result = mysql_fetch_array($fetch_class_load)){
	
	if($student_id != null){
?>
	
	<option value="<?php echo $class_load_result["class_load_id"] ?>" selected><?php echo $class_load_result["stu_lname"].", ".$class_load_result["stu_fname"]." ".$class_load_result["stu_mname"]; ?></option>

<?php }else{ ?>

	<option value="<?php echo $class_load_result["class_load_id"] ?>"><?php echo $class_load_result["stu_lname"].", ".$class_load_result["stu_fname"]." ".$class_load_result["stu_mname"]; ?></option>
	
	<?php }} ?>
