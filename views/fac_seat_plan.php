<?php 
	if($_SESSION['user_type'] == 1 ) {
	getCandidateForDrop($_GET["class_id"]);
	$class_id = $_GET["class_id"];
	$_SESSION['class_id'] = $_GET["class_id"];
	$class_result = mysql_fetch_array(mysql_query("SELECT * FROM `tbl_class` WHERE class_id='$class_id'"));
?>
<div id="page-wrapper">
	<div class="row">
	<br><br>
              <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search" style="margin: 5px 0px 0px 0px;">
  					<span class="input-group">
  						<!-- Hidden class id -->
  						<input type="hidden" name="class_id" id="class_id" value="<?php echo $class_id; ?>" class="form-control">
						<span class="input-group-addon">Row:</span>
						<input type="number" name="row" id="row" value="<?php echo $class_result['row']; ?>" class="form-control" onkeyup="change_row();">
						<span class="input-group-addon">Column:</span>
						<input type="number" name="column" id="column" value="<?php echo $class_result['column']; ?>" class="form-control" onkeyup="change_row();">
					</span>
				</div>
              </div>


		<button style="float:right;margin-bottom:5px;margin-top:5px;margin-right:5px;" role="" type="button" class="btn btn-primary" data-toggle="modal" data-target="#checkAttendance_modal"> <span class="glyphicon glyphicon-check"></span> Check Attendance</button>

        <div class="panel panel-default">
            <div class="panel-heading">
                Manage Seat plan
            </div>
            <div class="panel-body" style="max-width: 100%;">

			</div>
		</div>
	</div>
</div>
<?php include 'modals/modal_seat_plan.php'; ?>
<?php include 'modals/modal_seat_plan_details.php'; ?>
<?php include 'modals/modal_attendance.php'; ?>
<?php include 'modals/modal_response_log.php'; ?>
<?php } else{ ?>
	<script> window.location="index.php?page=restrict"; </script>
<?php } ?>
<script>
$(document).ready(function (){
	load_seat_plan_ui();
});

function diplay_seatPlanModal(class_id,seat_number){	
	$.post("ajax/fac_getSeatPlanDetails.php",{
		class_id:class_id,
		seat_number:seat_number
	},function(data,status){
		var k = JSON.parse(data);
		$("#sp_details_student_name").html(k.student_name);
		get_spAttendance(class_id,seat_number);
	});
}
function get_spAttendance(class_id,seat_number){
	
	$.post("ajax/fac_getSpAttendanceTable.php",{
		class_id:class_id,
		seat_number:seat_number
	},function(data,status){
		$("#view_datatable").html(data);
	});
	$("#modal_seat_plan_details").modal("show");
}

$('#modal_seat_plan_form').submit(function(e){
	e.preventDefault();
	$.ajax({
		type:"POST",
		url:"ajax/fac_addStudentsInseatPlan.php",
		data:$('#modal_seat_plan_form').serialize(),
		success:function(data){
			$('#modal_seat_plan').modal("hide");
			load_seat_plan_ui();
		}
	});
});

function getStudentsDropDown(){
	var class_id = $("#hidden_class_id").val();
	var seat_number = $("#hidden_seat_number").val();

	$.post("ajax/fac_getSeatplanDetailsDropdown.php",{
		class_id:class_id,
		seat_number:seat_number
	},function(data,status){
		$(".getStudentsDropDown").html(data);
	});
}

function update_seatPlanModal(class_id,seat_number){
	$("#hidden_class_id").val(class_id);
	$("#hidden_seat_number").val(seat_number);
	$("#modal_seat_plan").modal("show");
	getStudentsDropDown();
}

/*function update_seatPlan(){
	var class_id = $("#class_id").val();
	var seat_number = $("#seat_number").val();
	
	$.post("ajax/fac_update_seatPlan.php",{
		class_id:class_id,
		seat_number:seat_number
	},function(data,status){
	});
}*/

function change_row(){
	load_seat_plan_ui();
}

function load_seat_plan_ui(){

	var row = $("#row").val();
	var column = $("#column").val();
	var class_id = $("#class_id").val();

	$.post("ajax/fac_seatPlanUi.php",{
		row:row,
		column:column,
		class_id:class_id
	},function(data,status){
		$(".panel-body").html(data);
	});
	
}
$('#checkAttendance_form').submit(function(e){
	e.preventDefault();
	$.ajax({
		type:"POST",
		url:"ajax/fac_checkAttendanceByList.php",
		data:$('#checkAttendance_form').serialize(),
		success:function(data){
			$('#checkAttendance_modal').modal("hide");
			$("#response_log_div").html(data);
			$("#modalResponseLog").modal('show');
			$('#checkAttendance_form').each(function(){
			this.reset();
			})
		}
	});
});
$('#close').click(function(e){
	e.preventDefault();
	location.reload();
});
</script>