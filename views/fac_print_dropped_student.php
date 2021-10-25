<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="lib/FileSaver.js"></script>
<script src="lib/jquery.wordexport.js"></script>
<div id="page-wrapper">
	<div class="row">
		<div class="col-lg-6">
			<h3 class="page-header animated flipInX" style="border: 5px solid #286090;border-top: none;border-bottom: none;border-right: none;padding: 5px;color: #286090;"><span class="fa fa-list"></span> List of Dropped Students</h3>
		</div>
	</div>
    <div class="row" style="margin-bottom: 10px;">
		<div class="col-md-12" style="margin-bottom:10px;border-bottom: 1px solid #aaa;">
				<div class="col-sm-8 spaceMe">
					<div class="input-group spaceMe">
					  <span class="input-group-addon" id="basic-addon1"><strong>Semester:</strong></span>
						<select class="form-control" id="semester" name="semester" >
							<option value="First">First Semester</option>
							<option value="Second">Second Semester</option>
						</select>
					  <span class="input-group-addon" id="basic-addon1"><strong>Year:</strong></span>
						<select id="year" name="year" class="form-control col-md-3 col-xs-12">
							<?php
							$year = date('Y');
							$i = 1;
							while($i <= 5){
							?>
							<option value='<?php echo $year?>'><?php echo $year."-".($year+1)?></option>
							<?php $year--;$i++;} ?>
						</select>
					  <span class="input-group-addon" id="basic-addon1"><strong>Deficiency:</strong></span>
						<select class="form-control" id="deficiency" name="deficiency" onchange="getListDroppedFailed()">
							<option value=''>--Select--</option>
							<option value='0'>All</option>
							<option value='1'>Failed</option>
							<option value='2'>Dropped</option>
						</select>
					</div>
				</div>
			<div class="col-sm-4" style="padding: 2px;">
				<button class='btn btn-primary' id='btn_generate' onclick='generateListDroped()'><span class='fa fa-check-circle'></span> Generate Report</button>
				<button class="btn btn-default" id="btn_generate_report" onclick="printDiv('dropped_students')"><span class="fa fa-print"></span> Print Report</button>
			</div>
		</div>

	</div>
        <div class="panel panel-default" id="seat_plan_id">
            <div id='dropped_students'>
			</div>
		</div>
</div>
<script>
function generateListDroped(){
	var sem = $('#semester').val();
	var year = $('#year').val();
	var deficiency = $('#deficiency').val();
	
	$("#btn_generate").prop('disabled', true);
	$("#btn_generate").html("<span class='fa fa-spinner'></span> Loading ...");

	$.ajax({
		type:"POST",
		url:"ajax/fac_getStudentDropped.php",
		data:{
			deficiency:deficiency,
			sem:sem,
			year:year
		},
		success:function(data){
			$("#dropped_students").html(data);
			$("#btn_generate").prop('disabled', false);
			$("#btn_generate").html("<span class='fa fa-check-circle'></span> Generate Report");
		}
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