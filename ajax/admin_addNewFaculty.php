<?php
include '../core/config.php';
$fac_lname = $_POST['fac_lname'];
$fac_mname = $_POST['fac_mname'];
$fac_fname = $_POST['fac_fname'];
$fac_address = $_POST['address'];
$fac_gender = $_POST['gender'];
$bdate = $_POST['bdate'];
$fac_con = $_POST['con'];
	
$Month = date( 'm', strtotime($bdate) );
$Day   = date( 'd', strtotime($bdate) );
$Year  = date( 'Y', strtotime($bdate) );
$fac_bdate = date($Year)."-".date($Month)."-".date($Day);

$id_num =strtoupper(substr($fac_lname,0,1))."".strtoupper(substr($fac_fname,0,1))."".strtoupper(substr($fac_mname,0,1))."".date($Month)."". date($Day)."".substr(date($Year),2,2)."00";
$username = $id_num;
$password = encryptIt($fac_lname);
$user_type = '1';
//$user_img = 'user.png';
$user_status = 1;
$check_dup = mysql_fetch_array(mysql_query("SELECT count(f_id) FROM tbl_faculty WHERE f_id_no = '$id_num'"));
if($check_dup[0] > 0 ){
	echo 2;
}else{
	mysql_query("INSERT INTO tbl_faculty (f_id_no,f_fname,f_mname,f_lname,f_gender,f_bdate,f_address,f_con,f_status) VALUES ('$id_num','$fac_fname','$fac_mname','$fac_lname','$fac_gender','$fac_bdate','$fac_address','$fac_con',1)");
	$account_id = mysql_insert_id();
	$query = mysql_query("INSERT INTO tbl_user (username,password,user_type,account_id,user_status) VALUES ('$username','$password','$user_type','$account_id','$user_status')");
	if($query){
		echo 1;
	}else{
		echo 0;
	}
}
?>