<?php if($_SESSION['user_type'] == 1 ){
	
$f_id = $_SESSION['account_id'];
$fetch = mysql_fetch_array(mysql_query("SELECT * FROM tbl_settings WHERE f_id='$f_id'"));
if($fetch[0] > 0){
	$late = $fetch['late'];
	$absent = $fetch['absent'];
	$value_for_zero = $fetch['value_for_zero'];
	$passing_grade = $fetch['passing_grade'];
}else{
	$late = 0;
	$absent = 0;
	$quiz = 0;
	$value_for_zero = 0;
	$passing_grade = 0;
}
?>
<div id="page-wrapper">
	<div class="row">
	<br><br>
        <div class="panel panel-default">
            <div class="panel-heading">
                Manage Class Settings
            </div>
            <div class="panel-body">
				<table width="100%" class="table table-striped table-bordered table-hover" id="dt_class_term">
					<thead>
						<tr>
							<th>No of Late for 1 absent</th>
							<th>Maximum Absent For Drop</th>
							<th>Passing grade</th>
							<th>Value for Zero score (this is for permutation table)</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td contenteditable="true"  onBlur="saveToDatabase(this,'late')" onClick="showEdit(this);"><?php echo $late ?></td>
							<td contenteditable="true"  onBlur="saveToDatabase(this,'absent')" onClick="showEdit(this);"><?php echo $absent ?></td>
							<td contenteditable="true"  onBlur="saveToDatabase(this,'passing_grade')" onClick="showEdit(this);"><?php echo $passing_grade ?></td>
							<td contenteditable="true"  onBlur="saveToDatabase(this,'value_for_zero')" onClick="showEdit(this);"><?php echo $value_for_zero ?></td>
							
						</tr>
					</tbody>
				</table>
			</div>
		<div>
	</div>
</div>
<?php include 'modals/modal_class_term.php'; ?>
<?php } else{ ?>
	<script> window.location="index.php?page=restrict"; </script>
<?php } ?>
<script>
function showEdit(editableObj) {
	$(editableObj).css("background","#FFF");
}
function saveToDatabase(editableObj,column) {
	$(editableObj).css("background","#FFF url(loaderIcon.gif) no-repeat right");
	$.ajax({
		url: "ajax/fac_updateSettings.php",
		type: "POST",
		data:'column='+column+'&editval='+editableObj.innerHTML,
		success: function(data){
			$(editableObj).css("background","#FDFDFD");
		}        
	});
}
</script>