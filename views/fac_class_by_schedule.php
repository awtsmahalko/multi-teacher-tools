<?php if($_SESSION['user_type'] == 1 ) {?>
<div id="page-wrapper">
	<div class="row">
	<br><br>
        <div class="panel panel-default">
            <div class="panel-heading">
                Manage Class By Schedules
            </div>
            <div class="panel-body">
				<table width="100%" class="table table-striped table-bordered table-hover" id="dt_class">
					<thead>
						<tr>
							<th>#</th>
							<th>Class Code</th>
							<th>Subject</th>
							<th>Section</th>
							<th>Semester</th>
							<th>Year</th>
							<th>Assign</th>
						</tr>
					</thead>
					<tbody>
					</tbody>
				</table>
			</div>
		<div>
	</div>
</div>
<?php } else{ ?>
	<script> window.location="index.php?page=restrict"; </script>
<?php } ?>
<script>
$(document).ready(function (){
getAllClassBySchedule();
});
function getAllClassBySchedule(){
	$("#dt_class").DataTable({
		"processing":true,
		"responsive": true,
		"ajax":"ajax/datatables/fac_getAllClassBySchedule.php",
		"columns":[
			{
				"data":"count"
			},
			{
				"data":"class_code"
			},
			{
				"data":"subject"
			},
			{
				"data":"section"
			},
			{
				"data":"semester"
			},
			{
				"data":"year"
			},
			{
				"data":"action"
			}
		]
	});
}
</script>