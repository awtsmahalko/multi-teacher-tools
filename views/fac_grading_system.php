<?php if($_SESSION['user_type'] == 1 ) {?>
<div id="page-wrapper">
	<div class="row">
	<br><br>
              <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
					<button style="float:right;margin:5px 1px 0 5px;" role="" type="button" class="btn btn-primary" data-toggle="modal" data-target="#addGradingSystem_modal"> <span class="glyphicon glyphicon-plus-sign"></span> Add</button>
				</div>
              </div>
        <div class="panel panel-default">
            <div class="panel-heading">
                Manage Grading System
            </div>
            <div class="panel-body">
				<table width="100%" class="table table-striped table-bordered table-hover" id="dt_gSystem">
					<thead>
						<tr>
							<th>Class Code</th>
							<th>Quizzes</th>
							<th>Recitation</th>
							<th>Exam</th>
							<th>Skills</th>
							<th>Attendance</th>
							<th>Project</th>
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
<?php include 'modals/modal_grading_system.php'; ?>
<?php } else{ ?>
	<script> window.location="index.php?page=restrict"; </script>
<?php } ?>
<script>
$(document).ready(function (){
getAllGradingSystem();
});
function updateGradingSystem(id){
	$.post("ajax/fac_getGradingSystem.php",{
		id:id
	}, function (data, status){
		var o = JSON.parse(data);
		$("#quiz").val(o.g_quiz);
		$("#recit").val(o.g_recitation);
		$("#exam").val(o.g_exam);
		$("#skills").val(o.g_skills);
		$("#att").val(o.g_attendance);
		$("#proj").val(o.g_project);
	}
	);
	$("#hidden_g_id").val(id);
	$("#updateGradingSystem_modal").modal('show');
}
$('#updateGradingSystem_form').submit(function(e){
	e.preventDefault();

	$("#u_submit").prop('disabled', true);
	$("#u_submit").html("<span class='fa fa-spinner'></span> Updating ...");
	$.ajax({
		type:"POST",
		url:"ajax/fac_updateGradingSystem.php",
		data:$('#updateGradingSystem_form').serialize(),
		success: function(data){
			alert(data);
			$("#updateGradingSystem_modal").modal('hide');
			$("#u_submit").prop('disabled', false);
			$("#u_submit").html("<span class='fa fa-edit'></span> UPDATE");
			$("#dt_gSystem").DataTable().destroy();
			getAllGradingSystem();
				$('#updateGradingSystem_form').each(function(){
				this.reset();
				})
			}
	});
});
$('#addGradingSystem_form').submit(function(e){
	e.preventDefault();

	$("#a_submit").prop('disabled', true);
	$("#a_submit").html("<span class='fa fa-spinner'></span> Adding ...");
	$.ajax({
		type:"POST",
		url:"ajax/fac_addGradingSystem.php",
		data:$('#addGradingSystem_form').serialize(),
		success: function(data){
			alert(data);
			$("#addGradingSystem_modal").modal('hide');
			$("#a_submit").prop('disabled', false);
			$("#a_submit").html("<span class='glyphicon glyphicon-plus-sign'></span> ADD");
			location.reload();
			//$("#dt_gSystem").DataTable().destroy();
			//getAllGradingSystem();
				$('#addGradingSystem_form').each(function(){
				this.reset();
				})
			}
	});
});
function getAllGradingSystem(){
	$("#dt_gSystem").DataTable({
		"processing":true,
		"responsive": true,
		"ajax":"ajax/datatables/fac_getAllGradingSystem.php",
		"columns":[
			{
				"data":"class_code"
			},
			{
				"data":"quiz"
			},
			{
				"data":"recitation"
			},
			{
				"data":"exam"
			},
			{
				"data":"skills"
			},
			{
				"data":"attendance"
			},
			{
				"data":"project"
			},
			{
				"data":"action"
			}
		]
	});
}
</script>