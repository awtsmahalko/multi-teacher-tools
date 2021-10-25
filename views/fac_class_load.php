<?php if($_SESSION['user_type'] == 1 ) {
$get_class_id = $_GET['class_id'];
$_SESSION['class_id'] = $get_class_id;
?>
<div id="page-wrapper">
	<div class="row">
	<br><br>
              <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
					<button style="float:right;margin:5px 1px 0 5px;" role="" type="button" class="btn btn-danger" id="btn_delete" onclick="removeStudent()"> <span class="glyphicon glyphicon-minus-sign"></span> Remove</button>
					<button style="float:right;margin:5px 1px 0 5px;" role="" type="button" class="btn btn-default" id="btn_delete" onclick="download_template()"> <span class="fa fa-download fa-fw"></span> Download</button>
					<button style="float:right;margin:5px 1px 0 5px;" role="" type="button" class="btn btn-success" data-toggle="modal" data-target="#uploadClassLoad_modal"> <span class="fa fa-upload fa-fw"></span> Upload</button>
					<button style="float:right;margin:5px 1px 0 5px;" role="" type="button" class="btn btn-primary" data-toggle="modal" data-target="#addClassLoad_modal"> <span class="glyphicon glyphicon-plus-sign"></span> Add</button>
				</div>
              </div>
        <div class="panel panel-default">
            <div class="panel-heading">
                Manage Class Students
            </div>
            <div class="panel-body">
				<table width="100%" class="table table-striped table-bordered table-hover" id="dt_class_load">
					<thead>
						<tr>
							<th width='5%'><input type="checkbox" name="" onchange="checkAll(this)"></th>
							<th width='6%'>#</th>
							<th>Student Name</th>
							<th width='10%'>Action</th>
						</tr>
					</thead>
					<tbody>
					</tbody>
				</table>
			</div>
		<div>
	</div>
</div>
<?php include 'modals/modal_class_load.php'; ?>
<?php include 'modals/modal_response_log.php'; ?>
<?php } else{ ?>
	<script> window.location="index.php?page=restrict"; </script>
<?php } ?>
<script>
$(document).ready(function (){
getAllClassLoad();
});
function removeStudent(){
	var checkedValues = $('input:checkbox:checked').map(function() {
		return this.value;
	}).get();
	
	id = [];

	if(checkedValues == ""){
		alert("Please Check Student to be removed!");
	}else{
		var retVal = confirm("Are you sure to Remove?");
		if( retVal == true ){
			$("#btn_delete").prop('disabled', true);
			$("#btn_delete").html("<span class='fa fa-spin fa-spinner'></span> Loading ...");
			$.post("ajax/fac_removeStudent.php", {
					id: checkedValues
				},
				function (data, status) {
					alert(data);
					$("#dt_class_load").DataTable().destroy();
					getAllClassLoad();
					$("#btn_delete").prop("disabled",false);
					$("#btn_delete").html("<span class='glyphicon glyphicon-minus-sign'></span> Remove");
				}
			);
			return true;
			}
		else{

		}

	}
}
function updateStudentModal(id){
	$.post("ajax/fac_getClassLoadStudent.php",{
		id:id
	}, function (data, status){
		var o = JSON.parse(data);
		$("#u_first").val(o.stu_fname);
		$("#u_middle").val(o.stu_mname);
		$("#u_last").val(o.stu_lname);
	}
	);
	$("#hidden_class_load_id").val(id);
	$("#updateClassLoad_modal").modal('show');
}
$('#updateClassLoad_form').submit(function(e){
	e.preventDefault();

	$("#u_submit").prop('disabled', true);
	$("#u_submit").html("<span class='fa fa-spinner'></span> Updating ...");
	$.ajax({
		type:"POST",
		url:"ajax/fac_updateClassLoadStudent.php",
		data:$('#updateClassLoad_form').serialize(),
		success: function(data){
			alert(data);
			$("#updateClassLoad_modal").modal('hide');
			$("#u_submit").prop('disabled', false);
			$("#u_submit").html("<span class='fa fa-edit'></span> UPDATE");
			$("#dt_class_load").DataTable().destroy();
			getAllClassLoad();
				$('#updateClassLoad_form').each(function(){
				this.reset();
				})
			}
	});
});
function getAllClassLoad(){
	var id = $("#hidden_class_id").val();
	$("#dt_class_load").DataTable({
		"processing":true,
		"responsive": true,
		"ajax":{
			"url":"ajax/datatables/fac_getAllClassLoad.php",
			"type":"POST",
			"data":{id:id},
			"dataSrc":"data"
		},
		"columns":[
			{
				"data":"check"
			},
			{
				"data":"count"
			},
			{
				"data":"student"
			},
			{
				"data":"action"
			}
		]
	});
}
$('#addClassLoad_form').submit(function(e){
	e.preventDefault();

	$("#submit").prop('disabled', true);
	$("#submit").html("<span class='fa fa-spinner'></span> Submitting ...");
	$.ajax({
		type:"POST",
		url:"ajax/fac_addNewClassLoad.php",
		data:$('#addClassLoad_form').serialize(),
		success: function(data){
			alert(data);
			$("#addClassLoad_modal").modal('hide');
			$("#submit").prop('disabled', false);
			$("#submit").html("<span class='fa fa-check-circle'></span> SUBMIT");
			$("#dt_class_load").DataTable().destroy();
			getAllClassLoad();
			$('#addClassLoad_form').each(function(){
			this.reset();
			})
		}
	});
});
$('#uploadClassLoad_form').submit(function(e){
	e.preventDefault();

	$("#upload").prop('disabled', true);
	$("#upload").html("<span class='fa fa-spinner'></span> Uploading ...");
	$.ajax({
		type:"POST",
		url:"ajax/fac_importClassLoadStudent.php",
		data:new FormData(this),
		contentType:false,          // The content type used when sending data to the server.
		cache:false,                // To unable request pages to be cached
		processData:false,          // To send DOMDocument or non processed data file it is set to false
		success: function(data){
			//alert(data);
			$("#uploadClassLoad_modal").modal('hide');
			$("#response_log_div").html(data);
			$("#modalResponseLog").modal('show');
			$("#upload").prop('disabled', false);
			$("#upload").html("<span class='fa fa-check-circle'></span> UPLOAD");
			$("#dt_class_load").DataTable().destroy();
			getAllClassLoad();
			$("#file").val("");
		}
	});
});
function download_template(){
	var dl = confirm("You are about to download template for class load student (csv file).");
		if(dl == true){
			window.location = 'ajax/fac_exportClassLoadStudent.php';
		}
}
</script>