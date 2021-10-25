<?php if($_SESSION['user_type'] == 0 ) {?>
<div id="page-wrapper">
	<div class="row">
	<br><br>
              <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
					<button style="float:right;margin-bottom:5px;margin-top:5px;margin-right:5px;" role="" type="button" class="btn btn-danger" id="btn_delete" onclick="deleteFaculty()"> <span class="glyphicon glyphicon-trash"></span> Delete</button>&nbsp;
					<button style="float:right;margin-bottom:5px;margin-top:5px;margin-right:5px;" role="" type="button" class="btn btn-primary" data-toggle="modal" data-target="#addFacultyModal"> <span class="glyphicon glyphicon-plus-sign"></span> Add</button>&nbsp;&nbsp;
				</div>
              </div>
        <div class="panel panel-default">
            <div class="panel-heading">
                Manage Faculty Details
            </div>
            <div class="panel-body">
				<table width="100%" class="table table-striped table-bordered table-hover" id="dt_faculty">
					<thead>
						<tr>
							<th><input type="checkbox" name="" onchange="checkAll(this)"></th>
							<th>#</th>
							<th>ID No</th>
							<th>Name</th>
							<th>Gender</th>
							<th>Birthdate</th>
							<th>Address</th>
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
<?php include 'modals/modal_faculty.php'; ?>
<?php } else{ ?>
	<script> window.location="index.php?page=restrict"; </script>
<?php } ?>
<script>
$(document).ready(function (){
getAllFaculty();
});
function getAllFaculty(){
	$("#dt_faculty").DataTable({
		"processing":true,
		"responsive": true,
		"ajax":"ajax/datatables/admin_getAllFaculty.php",
		"columns":[
			{
				"data":"check"
			},
			{
				"data":"count"
			},
			{
				"data":"id_no"
			},
			{
				"data":"name"
			},
			{
				"data":"gender"
			},
			{
				"data":"birthdate"
			},
			{
				"data":"address"
			},
			{
				"data":"action"
			}
		]
	});
}
function updateFacultyModal(id){
	$.post("ajax/admin_getFacultyDetails.php",{
		id:id
	}, function (data, status){
		var o = JSON.parse(data);
		$("#u_f_fname").val(o.f_fname);
		$("#u_f_lname").val(o.f_lname);
		$("#u_f_mname").val(o.f_mname);
		$("#u_gender").val(o.f_gender);
		$("#u_address").val(o.f_address);
		$("#u_con").val(o.f_con);
		$("#u_bdate").val(o.f_bdate);
		$("#u_id").val(o.f_id);
	}
	);
	$("#editFacultyModal").modal('show');
}
$('#addFacultyModal_form').submit(function(e){
	e.preventDefault();

	$("#submit").prop('disabled', true);
	$("#submit").html("<span class='fa fa-spinner'></span> Submitting ...");
	$.ajax({
		type:"POST",
		url:"ajax/admin_addNewFaculty.php",
		data:$('#addFacultyModal_form').serialize(),
		success: function(data){
			//alert(data);
			$("#addFacultyModal").modal('hide');
			$("#submit").prop('disabled', false);
			$("#submit").html("<span class='fa fa-check-circle'></span> SUBMIT");
			$("#dt_faculty").DataTable().destroy();
			getAllFaculty();
			$('#addFacultyModal_form').each(function(){
			this.reset();
			})
		}
	});
});
$('#editFacultyModal_form').submit(function(e){
	e.preventDefault();

	$("#u_submit").prop('disabled', true);
	$("#u_submit").html("<span class='fa fa-spinner'></span> Updating ...");
	$.ajax({
		type:"POST",
		url:"ajax/admin_updateFaculty.php",
		data:$('#editFacultyModal_form').serialize(),
		success: function(data){
			//alert(data);
			$("#editFacultyModal").modal('hide');
			$("#u_submit").prop('disabled', false);
			$("#u_submit").html("<span class='fa fa-edit'></span> UPDATE");
			$("#dt_faculty").DataTable().destroy();
			getAllFaculty();
			$('#editFacultyModal_form').each(function(){
			this.reset();
			})
		}
	});
});
function deleteFaculty(){
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
			$.post("ajax/admin_deleteFaculty.php", {
					id: checkedValues
				},
				function (data, status) {
					//alert(data);
					$("#dt_faculty").DataTable().destroy();
					getAllFaculty();
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