<?php if($_SESSION['user_type'] == 1 ) {?>
<div id="page-wrapper">
	<div class="row">
	<br><br>
              <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
					<button style="float:right;margin-bottom:5px;margin-top:5px;margin-right:5px;" role="" type="button" class="btn btn-primary" data-toggle="modal" data-target="#addClassTerm_modal"> <span class="glyphicon glyphicon-plus-sign"></span> Add</button>&nbsp;&nbsp;
				</div>
              </div>
        <div class="panel panel-default">
            <div class="panel-heading">
                Manage Class Details
            </div>
            <div class="panel-body">
				<table width="100%" class="table table-striped table-bordered table-hover" id="dt_class_term">
					<thead>
						<tr>
							<th width="7%">#</th>
							<th>Term</th>
							<th>Status</th>
							<th width="10%">Action</th>
						</tr>
					</thead>
					<tbody>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
<?php include 'modals/modal_class_term.php'; ?>
<?php } else{ ?>
	<script> window.location="index.php?page=restrict"; </script>
<?php } ?>
<script>
$(document).ready(function (){
getAllClassTerm();
});
function closeTerm(id){
	var close_term = confirm("Are you sure to Closed Term?");
	var status = "1";
	if(close_term == true){
		$.post("ajax/fac_updateClassTermStatus.php",{
			id:id,
			status:status
		},function (data,status){
			//alert(data);
			$("#dt_class_term").DataTable().destroy();
			getAllClassTerm();
		});
	}
}
function openTerm(id){
	var open_term = confirm("Are you sure to Open Term?");
	var status = "0";
	if(open_term == true){
		$.post("ajax/fac_updateClassTermStatus.php",{
			id:id,
			status:status
		},function (data,status){
			//alert(data);
			$("#dt_class_term").DataTable().destroy();
			getAllClassTerm();
		});
	}
}
function getAllClassTerm(){
	$("#dt_class_term").DataTable({
		"processing":true,
		"responsive": true,
		"ajax":"ajax/datatables/fac_getAllClassTerm.php",
		"columns":[
			{
				"data":"count"
			},
			{
				"data":"term_name"
			},
			{
				"data":"status"
			},
			{
				"data":"action"
			}
		]
	});
}
$('#addClassTerm_form').submit(function(e){
	e.preventDefault();

	$("#submit").prop('disabled', true);
	$("#submit").html("<span class='fa fa-spinner'></span> Submitting ...");
	$.ajax({
		type:"POST",
		url:"ajax/fac_addNewClassTerm.php",
		data:$('#addClassTerm_form').serialize(),
		success: function(data){
			//alert(data);
			$("#addClassTerm_modal").modal('hide');
			$("#submit").prop('disabled', false);
			$("#submit").html("<span class='fa fa-check-circle'></span> SUBMIT");
			$("#dt_class_term").DataTable().destroy();
			getAllClassTerm();
			$('#addClassTerm_form').each(function(){
			this.reset();
			})
		}
	});
});
</script>