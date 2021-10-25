<div id="page-wrapper">
	<div class="row">
		<div class="col-lg-6">
			<h3 class="page-header animated flipInX" style="border: 5px solid #286090;border-top: none;border-bottom: none;border-right: none;padding: 5px;color: #286090;"><span class="fa fa-list"></span> Teacher's List of Dropped and Failed</h3>
		</div>
	</div>
    <div class="row" style="margin-bottom: 10px;">
		<div class="col-md-12" style="margin-bottom:10px;">
				<div class="col-sm-3 spaceMe">
					<div class="input-group spaceMe">
					  <span class="input-group-addon" id="basic-addon1"><strong>Faculty:</strong></span>
						<select class="form-control" id="faculty" name="faculty" onchange="getFacSem()">
							<option value="">--Please Select--</option>
							<?php
							$fetch_faculty = mysql_query("SELECT * FROM tbl_faculty");
							while($row_fac = mysql_fetch_array($fetch_faculty)){
							?>
							<option value="<?php echo $row_fac['f_id']; ?>"><?php echo $row_fac['f_lname'].", ".$row_fac['f_fname'];?></option>
							<?php } ?>
						</select>
					</div>
				</div>
				<div class="col-sm-3 spaceMe">
					<div class="input-group spaceMe">
					  <span class="input-group-addon" id="basic-addon1"><strong>Academe:</strong></span>
						<select class="form-control" id="academe" name="academe">
						</select>
					</div>
				</div>
				<div class="col-sm-3 spaceMe">
					<div class="input-group spaceMe">
					  <span class="input-group-addon" id="basic-addon1"><strong>Deficiency:</strong></span>
						<select class="form-control" id="deficiency" name="deficiency" onchange="getListDroppedFailed()">
							<option value=''>--Please Select--</option>
							<option value='0'>All</option>
							<option value='1'>Failed</option>
							<option value='2'>Dropped</option>
						</select>
					</div>
				</div>
				<div class="col-sm-3" style="padding: 2px;">
					<button class="btn btn-default" id="btn_generate_report" onclick="printDiv('seat_plan')"><span class="fa fa-print"></span> Print</button>
				</div>
		</div>
	</div>
        <div class="panel panel-default" id="seat_plan_id">
            <div id='list_dropped_failed'>
			</div>
		</div>
</div>
<script>
function getFacSem(){
	var fac = $("#faculty").val();
	$.post("ajax/admin_getFacultyAcademe.php",{
		fac:fac
	}, function (data){
		$("#academe").html(data);
	});
}
function getListDroppedFailed(){
	var fac = $("#faculty").val();
	var academe = $("#academe").val();
	var def = $("#deficiency").val();
	$.post("ajax/admin_getStudentDroppedFailed.php",{
		fac:fac,
		academe:academe,
		def:def
	}, function (data){
		$("#list_dropped_failed").html(data);
	});
}
function printDiv(container){
	var printContents = document.getElementById(container).innerHTML;
	var originalContents = document.body.innerHTML;

	document.body.innerHTML = printContents;
	window.print();
	document.body.innerHTML = originalContents;
}
</script>