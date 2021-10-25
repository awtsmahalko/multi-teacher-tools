<?php if($_SESSION['user_type'] == 1 ) {?>
<div id="page-wrapper">
	<div class="row">
        <div class="panel panel-default">
            <div class="panel-heading">
                List of Classes
            </div>
            <div class="panel-body">
				<table width="100%" class="table table-striped table-bordered table-hover" id="dt_class">
					<thead>
						<tr>
							<th style="width: 15px;"></th>
							<th style="width: 15px;">#</th>
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
<?php } else{ ?>
	<script> window.location="index.php?page=restrict"; </script>
<?php } ?>
<script>
$(document).ready(function (){
	getAllClass();
});
function getAllClass(){
	$("#dt_class").DataTable().destroy();
	$("#dt_class").DataTable({
		"processing":true,
		"responsive": true,
		"ajax":"ajax/datatables/fac_getAllClassesForScoring.php",
		"columns":[
			{
				"data":"check"
			},
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
					return "<button class='btn btn-primary btn-sm' onclick='window.location=\"index.php?page=students-grade-per-class&id="+row.class_id+"\"'><span class='fa fa-list-ul'></span> Grades </button> <button class='btn btn-success btn-sm' onclick='submitGrades("+row.class_id+")' "+isDisabled+"><span class='fa fa-check-circle'></span> Submit grades </button>";
				}
			}
		]
	});
}

function submitGrades(id){
	var confirmsubmit = confirm("Are you sure to submit grades?");
	$.ajax({
		type:"POST",
		url:"ajax/fac_submit_grades.php",
		data:{
			id:id
		},
		success: function(data){
			if(data != ''){
				alert(data);
			}else{
				alert('Successfully submitted grades.');
				getAllClass();
			}
		}
	});
}
</script>