<?php
include '../core/config.php';
$classid_top = $_POST['class_id'];
$_SESSION['class_id'] = $_POST['class_id'];;
$fetch_row_col = mysql_fetch_array(mysql_query("SELECT `row`,`column` FROM tbl_class WHERE class_id = $classid_top"));
$width = (1000 - ($fetch_row_col[0] * 3)) / $fetch_row_col[0];
$font = 100 / $fetch_row_col[0];
	function get_studentSeatPlan($class_id,$seat_number){
		$seat_plan_result = mysql_fetch_array(mysql_query("SELECT student_id FROM `tbl_seat_plan` WHERE class_id='$class_id' AND seat_number='$seat_number'"));
		if($seat_plan_result[0] == NULL){
			return "<br>";
		}else{
			$student_id = $seat_plan_result[0];
			$seat_plan_result = mysql_fetch_array(mysql_query("SELECT * FROM `tbl_class_load` WHERE class_id='$class_id' AND class_load_id='$student_id'"));
			return "<center>".getStudentNameById($seat_plan_result[0])."</center><br>";
		}
	}
	function getfacultyname(){
		$f_id = $_SESSION['account_id'];
		$fetch = mysql_fetch_array(mysql_query("SELECT f_fname,f_mname,f_lname FROM tbl_faculty WHERE f_id = $f_id"));
		return $fetch[0]." ". $fetch[1]." ". $fetch[2];
	}
	function getRoomName(){
	$id = $_SESSION['class_id'];
	$fetch = mysql_fetch_array(mysql_query("SELECT room FROM tbl_class_schedule WHERE class_id = $id"));
	return $fetch[0];
	}
?>
	<?php
	$seat_number = 1;
	$rcount = 1; while($rcount <= $fetch_row_col[1]){ ?>
	<div class="panel-body">
		<?php $td_count = 1; while($td_count <= $fetch_row_col[0] ){?>
			<div style="float: left; border:1px solid;margin-left:3px;color: #444; box-shadow: 0px 0px 10px 3px #b7b7b7; padding: 10px;font-size:<?php echo $font ?>pt; height:<?php echo $width ?>px;width:<?php echo $width ?>px;cursor:pointer;" >
				<center>
					<br><?php echo get_studentSeatPlan($classid_top,$seat_number); ?>
				</center>
			</div>
    	<?php $td_count ++; $seat_number ++;} ?>
	</div>
	<?php $rcount ++;} ?>
	<div class="panel-body">
		<div style="float: left;border:2px solid; margin-top:15px;margin-left:40%;color: #444; box-shadow: 0px 0px 10px 3px #b7b7b7; padding: 5px; height: 100px;width:240px;">
			<center>
				<strong>SUBJECT : <?php echo getSubjectByClassId()?></strong><br>
				<i><?php echo getfacultyname(); ?></i><br>
				<i><?php echo getSectionNameByClassId()?></i>
			</center>
		</div>
	</div>