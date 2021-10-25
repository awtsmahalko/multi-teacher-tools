<?php
include '../core/config.php';
$f_id = $_SESSION['account_id'];
$classes = getClassIdFromGs();

function getSchedDay($class,$day,$from,$to){
$classes = getClassIdFromGs();
	$fetch = mysql_fetch_array(mysql_query("SELECT count(*),room,class_id FROM tbl_class_schedule WHERE class_id IN (".$classes.") AND day='$day' AND time_from='$from' AND time_to='$to'"));
	if($fetch[0] > 0){
		$sub = getSubjectByClassIdSS($fetch[2]);
		$section = "(".getSectionNameByClassIdSS($fetch[2]).")";
	}else{
		$sub = "";
		$section = "";
	}
	return $sub." - ".$section."<br>".$fetch['room'];
}
function getSectionNameByClassIdSS($class_id){
	$fetch = mysql_fetch_array(mysql_query("SELECT section FROM tbl_class WHERE class_id = $class_id"));
	return $fetch[0];
}
function getSubjectByClassIdSS($class_id){
	$fetch = mysql_fetch_array(mysql_query("SELECT subject FROM tbl_class WHERE class_id = $class_id"));
	return $fetch[0];
}
?>
<div class="panel-body">
	<table width="100%" class="table table-striped table-bordered table-hover" id="dt_class">
		<thead>
			<tr>
				<th>Time</th>
				<th>Monday</th>
				<th>Tuesday</th>
				<th>Wednesday</th>
				<th>Thursday</th>
				<th>Friday</th>
				<th>Saturday</th>
			</tr>
		</thead>
		<tbody>
		<?php
		$fetch_stud = mysql_query("SELECT * FROM `tbl_class_schedule` WHERE class_id IN (".$classes.") GROUP BY time_from,time_to");
			while($row = mysql_fetch_array($fetch_stud)){
		?>
			<tr>
				<td><center><?php echo date("h:i A",strtotime($row['time_from']))." - ".date("h:i A",strtotime($row['time_to'])); ?></center></td>
				<td><center><?php echo getSchedDay($row['class_id'],"Monday",$row['time_from'],$row['time_to']) ?></center></td>
				<td><center><?php echo getSchedDay($row['class_id'],"Tuesday",$row['time_from'],$row['time_to']) ?></center></td>
				<td><center><?php echo getSchedDay($row['class_id'],"Wednesday",$row['time_from'],$row['time_to']) ?></center></td>
				<td><center><?php echo getSchedDay($row['class_id'],"Thursday",$row['time_from'],$row['time_to']) ?></center></td>
				<td><center><?php echo getSchedDay($row['class_id'],"Friday",$row['time_from'],$row['time_to']) ?></center></td>
				<td><center><?php echo getSchedDay($row['class_id'],"Saturday",$row['time_from'],$row['time_to']) ?></center></td>
			</tr>
		<?php
			$count++; 
		}
		?>
		</tbody>
	</table>
</div>