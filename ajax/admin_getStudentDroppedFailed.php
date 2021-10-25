<?php
include '../core/config.php';
$academe = $_POST['academe'];
$data_n = explode(",",$academe);
$sem = $data_n[0];
$year = $data_n[1];
$f_id = $_POST['fac'];
$deficiency = $_POST['def'];
if($deficiency == 0){
	$query_add = "AND cl.remarks = 'Failed' OR cl.remarks = 'Dropped'";
	$name_def = "Dropped and Failed";
	$name_th = "Action";
}else if($deficiency == 1){
	$query_add = "AND cl.remarks = 'Failed'";
	$name_def = "Failed";
	$name_th = "Failed";
}else if($deficiency == 2){
	$query_add = "AND cl.remarks = 'Dropped'";
	$name_def = "Dropped";
	$name_th = "Dropped";
}else{
	$query_add = "AND cl.remarks = 'Failed' OR cl.remarks = 'Dropped'";
	$name_def = "Dropped and Failed";
	$name_th = "Action";
}
?>
<div class="panel-heading">
    List of <?php echo $name_def; ?> Students
</div>
<div class="panel-body">
	<table width="100%" class="table table-striped table-bordered table-hover" id="dt_class">
		<thead>
			<tr>
				<th>#</th>
				<th>Name</th>
				<th>Subject</th>
				<th>Section</th>
				<th>Deficiency</th>
				<th>Date <?php echo $name_th; ?></th>
			</tr>
		</thead>
		<tbody>
		<?php
		$fetch_stud = mysql_query("SELECT cl.class_load_id, c.subject, c.section, cl.remarks, cl.date_remark FROM tbl_class_load as cl INNER JOIN tbl_class as c ON c.class_id=cl.class_id WHERE c.f_id = $f_id $query_add AND c.semester='$sem' AND c.year = '$year' AND c.is_Submitted='1'");
		$count = 1;
		while($row = mysql_fetch_array($fetch_stud)){
		?>
			<tr>
				<td><?php echo $count ?></td>
				<td><?php echo getStudentNameById($row[0])?></td>
				<td><?php echo $row[1] ?></td>
				<td><?php echo $row[2] ?></td>
				<td><?php echo $row[3] ?></td>
				<td><?php echo date("F d, Y", strtotime($row[4])); ?></td>
			</tr>
		<?php $count++; } ?>
		</tbody>
	</table>
</div>