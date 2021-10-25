<div id="page-wrapper">
	<div class="row">
		<div class="col-lg-6">
			<h3 class="page-header animated flipInX" style="border: 5px solid #286090;border-top: none;border-bottom: none;border-right: none;padding: 5px;color: #286090;"><span class="fa fa-cubes"></span> Teacher's Class Records</h3>
		</div>
	</div>
    <div class="row" style="margin-bottom: 10px;">
		<div class="col-md-12" style="margin-bottom:10px;">
				<div class="col-sm-4 spaceMe">
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
				<div class="col-sm-4 spaceMe">
					<div class="input-group spaceMe">
					  <span class="input-group-addon" id="basic-addon1"><strong>Academe:</strong></span>
						<select class="form-control" id="academe" name="academe" onchange="getFacClass()" >
						</select>
					</div>
				</div>
				<div class="col-sm-4 spaceMe">
					<div class="input-group spaceMe">
					  <span class="input-group-addon" id="basic-addon1"><strong>Class:</strong></span>
						<select class="form-control" id="class" name="class" onchange="getClassRecord()">
						</select>
					</div>
				</div>
				
		</div>
	</div>
        <div class="panel panel-default" id="class_record">
		</div>
</div>
<script>
function getFacSem(){
	$("#class").val("");
	var fac = $("#faculty").val();
	$.post("ajax/admin_getFacultyAcademe.php",{
		fac:fac
	}, function (data){
		$("#academe").html(data);
	});
}
function getFacClass(){
	var fac = $("#faculty").val();
	var academe = $("#academe").val();
	$.post("ajax/admin_getFacultyClass.php",{
		fac:fac,
		academe:academe
	}, function (data){
		$("#class").html(data);
	});
}
function getClassRecord(){
	var class_id = $("#class").val();
	var fac = $("#faculty").val();
	$.post("ajax/admin_getFacultyClassRecord.php",{
		fac:fac,
		class_id:class_id
	}, function (data){
		$("#class_record").html(data);
	});
}
</script>