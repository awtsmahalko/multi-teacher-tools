<?php if($_SESSION['user_type'] == 1 ) {?>
<div id="page-wrapper">
	<div class="row">
	<br><br>
              <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
					<button style="float:right;margin-bottom:5px;margin-top:5px;margin-right:5px;" role="" type="button" class="btn btn-danger" id="btn_delete" onclick="deleteClass()"> <span class="glyphicon glyphicon-trash"></span> Delete</button>
					<button style="float:right;margin-bottom:5px;margin-top:5px;margin-right:5px;" role="" type="button" class="btn btn-primary" data-toggle="modal" data-target="#addClass_modal"> <span class="glyphicon glyphicon-plus-sign"></span> Add</button>&nbsp;&nbsp;
				</div>
              </div>
        <div class="panel panel-default">
            <div class="panel-heading">
                Manage Class Details
            </div>
            <div class="panel-body ">
				<table width="100%" class="table table-striped table-bordered table-hover" id="dt_class">
					<thead>
						<tr>
							<th><input type="checkbox" name="" onchange="checkAll(this)"></th>
							<th>#</th>
							<th>Class Code</th>
							<th>Subject</th>
							<th>Section</th>
							<th>Semester</th>
							<th>Year</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
					</tbody>
				</table>
			</div>
		</div>
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
		"ajax":"ajax/datatables/fac_getAllClass.php",
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
				"data":"action"
			}
		]
	});
}
$('#addClass_form').submit(function(e){
	e.preventDefault();

	$("#submit").prop('disabled', true);
	$("#submit").html("<span class='fa fa-spinner'></span> Submitting ...");
	$.ajax({
		type:"POST",
		url:"ajax/fac_addNewClass.php",
		data:$('#addClass_form').serialize(),
		success: function(data){
			//alert(data);
			$("#addClass_modal").modal('hide');
			$("#submit").prop('disabled', false);
			$("#submit").html("<span class='fa fa-plus-circle'></span> ADD");
			$("#dt_class").DataTable().destroy();
			getAllClass();
			$('#addClass_form').each(function(){
			this.reset();
			})
		}
	});
});
$('#updateClass_form').submit(function(e){
	e.preventDefault();

	$("#u_submit").prop('disabled', true);
	$("#u_submit").html("<span class='fa fa-spinner'></span> Updating ...");
	$.ajax({
		type:"POST",
		url:"ajax/fac_updateClass.php",
		data:$('#updateClass_form').serialize(),
		success: function(data){
			alert(data);
			$("#updateClass_modal").modal('hide');
			$("#u_submit").prop('disabled', false);
			$("#u_submit").html("<span class='fa fa-check-circle'></span> UPDATE");
			$("#dt_class").DataTable().destroy();
			getAllClass();
			$('#updateClass_form').each(function(){
			this.reset();
			})
		}
	});
});
function updateClassModal(id){
	$.post("ajax/fac_getClassDetails.php",{
		id:id
	}, function (data, status){
		var o = JSON.parse(data);
		$("#u_class_code").val(o.class_code);
		$("#u_subject").val(o.subject);
		$("#u_section").val(o.section);
		$("#u_semester").val(o.semester);
		$("#u_year").val(o.year);
	}
	);
	$("#hidden_class_id").val(id);
	$("#updateClass_modal").modal('show');
}
function deleteClass(){
	var checkedValues = $('input:checkbox:checked').map(function() {
		return this.value;
	}).get();
	
	id = [];

	if(checkedValues == ""){
		alert("Please Check Faculty to be deleted!");
	}else{
		var retVal = confirm("Are you sure to delete?");
		if( retVal == true ){
			$("#btn_delete").prop('disabled', true);
			$("#btn_delete").html("<span class='fa fa-spin fa-spinner'></span> Loading ...");
			$.post("ajax/fac_deleteClass.php", {
					id: checkedValues
				},
				function (data, status) {
					//alert(data);
					$("#dt_class").DataTable().destroy();
					getAllClass();
					$("#btn_delete").prop("disabled",false);
					$("#btn_delete").html("<span class='fa fa-trash-o'></span> Delete");
				}
			);
			return true;
			}
		else{

		}

	}
}
</script>