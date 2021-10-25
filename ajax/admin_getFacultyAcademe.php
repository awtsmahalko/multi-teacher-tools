<option value=''>--Please Select--</option>
<?php
include '../core/config.php';
$f_id = $_POST['fac'];
$fetch = mysql_query("SELECT * FROM tbl_class WHERE f_id=$f_id GROUP BY semester,year ORDER BY year DESC");
while($row = mysql_fetch_array($fetch)){
?>
	<option value="<?php echo $row['semester'].",".$row['year'];?>"><?php echo $row['semester']." Sem , ".$row['year']."-".($row['year']+1); ?></option>
<?php } ?>