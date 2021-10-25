<option value=''>--Please Select--</option>
<?php
include '../core/config.php';
$f_id = $_POST['fac'];
$academe = $_POST['academe'];
$data = explode(",", $academe);
$sem = $data[0];
$year = $data[1];
$fetch = mysql_query("SELECT * FROM tbl_class WHERE f_id=$f_id AND semester='$sem' AND `year`='$year' AND is_Submitted = 1");
while($row = mysql_fetch_array($fetch)){
?>
	<option value="<?php echo $row['class_id'];?>"><?php echo $row['class_code']; ?></option>
<?php } ?>