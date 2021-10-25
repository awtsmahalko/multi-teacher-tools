<?php
include '../core/config.php';

	$class_id = $_POST["class_id"];
	$row = $_POST["row"];
	$column = $_POST["column"];

	mysql_query("UPDATE `tbl_class` SET `row`='$row',`column`='$column' WHERE `class_id`='$class_id'");

	function getAbsent($class_id,$seat_number){
		$fetch_stu = mysql_fetch_array(mysql_query("SELECT student_id FROM tbl_seat_plan WHERE class_id = $class_id AND seat_number = $seat_number"));
		if($fetch_stu[0] == NULL){
			return 0;
		}else{
			$stu_id = $fetch_stu[0];		
			$fetch = mysql_fetch_array(mysql_query("SELECT sum(A) FROM tbl_attendance WHERE class_id = $class_id AND stu_id = $stu_id"));
			return $fetch[0];
		}
	}
	function getLate($class_id,$seat_number){
		$fetch_stu = mysql_fetch_array(mysql_query("SELECT student_id FROM tbl_seat_plan WHERE class_id = $class_id AND seat_number = $seat_number"));
		if($fetch_stu[0] == NULL){
			return 0;
		}else{
			$stu_id = $fetch_stu[0];		
			$fetch = mysql_fetch_array(mysql_query("SELECT sum(L) FROM tbl_attendance WHERE class_id = $class_id AND stu_id = $stu_id"));
			return $fetch[0];
		}
	}
	function get_studentSeatPlan($class_id,$seat_number){
	
		$seat_plan_result = mysql_fetch_array(mysql_query("SELECT student_id FROM `tbl_seat_plan` WHERE class_id='$class_id' AND seat_number='$seat_number'"));
		if($seat_plan_result[0] == NULL){
			return "<br>";
		}else{
			$student_id = $seat_plan_result[0];
			$seat_plan_result = mysql_fetch_array(mysql_query("SELECT * FROM `tbl_class_load` WHERE class_id='$class_id' AND class_load_id='$student_id'"));

			return "<br><strong>".getStudentNameById($seat_plan_result[0])."</strong><br> Absent: <font color='red'>".getAbsent($class_id,$seat_number)."</font> Late: <font color='red'>".getLate($class_id,$seat_number)."</font>";
		}
	}
	function checkSeatNumberHadSeater($class_id,$seat_number){
		$seat_plan_result = mysql_fetch_array(mysql_query("SELECT student_id FROM `tbl_seat_plan` WHERE class_id='$class_id' AND seat_number='$seat_number'"));
		if($seat_plan_result[0] == NULL){
			return "<br><br><br>";
		}else{
			return '
    		<span class="fa fa-th-list" type="button" onclick="diplay_seatPlanModal('.$class_id.','.$seat_number.');" style="float: right; color: #337ab7;"></span>';
		}
	}
?>

<div style="max-width: 100%;overflow:auto;">
<table border='1' class="table table-striped" style="border: 1px solid #000;">

	<?php
	$seat_number = 1;

	$rcount = 1; while($rcount <= $column){ ?>
	<tr>
		<?php $td_count = 1; while($td_count <= $row ){ ?>
			<td style='width: 100px !important; height: 33px !important; padding: 5px; border-color: #ccc; min-width: 100px !important;
    min-height: 33px !important;border: solid 1px #ccc'>
    		<center style="cursor:pointer;">
    		<span class="fa fa-edit" type="button" onclick="update_seatPlanModal(<?php echo $class_id ?>,<?php echo $seat_number ?>);" style="float: left; color: #337ab7;margin-right: 3px;"></span>
			<?php echo checkSeatNumberHadSeater($class_id,$seat_number);?>
	    		<?php echo get_studentSeatPlan($class_id,$seat_number); ?><br>
    		</center>
    		</td>
    		
    	<?php $td_count ++; $seat_number ++;} ?>
	</tr>

	<?php $rcount ++;} ?>
</table>
</div>