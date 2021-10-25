<?php if($_SESSION['user_type'] == 1 ) {?>
<div id="page-wrapper">
	<div class="row">
        <div class="panel panel-default">
            <div class="panel-heading">
                Add Scores for classes
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
							<th>No. of Students</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
					</tbody>
				</table>
			</div>
		<div>
	</div>
</div>
<?php include 'modals/modal_class.php'; ?>
<?php } else{ ?>
	<script> window.location="index.php?page=restrict"; </script>
<?php } ?>
<script>
$(document).ready(function (){
getAllClass();
});
function getAllClass(){
	$("#dt_class").DataTable({
		"processing":true,
		"responsive": true,
		"ajax":"ajax/datatables/fac_getAllClassesForScoring.php",
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
				"data":"no_of_students"
			},
			{
				"mRender":function(data,type,row){
					if(row.is_Submitted == 1){
						var isDisabled = 'disabled';
					}else{
						var isDisabled = '';
					}
					return "<button class='btn btn-default btn-sm' title='Add Scores' onclick='window.location=\"index.php?page=add-scores&id="+row.class_id+"\"' "+isDisabled+"><span class='fa fa-plus-circle fa-fw'></span> </button>";
				}
			}
		]
	});
}
</script>