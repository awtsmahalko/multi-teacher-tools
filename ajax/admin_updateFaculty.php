<?php
include '../core/config.php';
$f_id = $_POST['u_id'];
$f_fname = $_POST['u_f_fname'];
$f_mname = $_POST['u_f_mname'];
$f_lname = $_POST['u_f_lname'];
$f_address = $_POST['u_address'];
$f_gender = $_POST['u_gender'];
$f_bdate = $_POST['u_bdate'];
$f_bdate = date("Y-m-d", strtotime($f_bdate));
$f_con = $_POST['u_con'];

$query = mysql_query("UPDATE tbl_faculty SET f_fname='$f_fname',f_mname='$f_mname',f_lname='$f_lname',f_gender=$f_gender,f_bdate='$f_bdate',f_address='$f_address',f_con='$f_con' WHERE f_id=$f_id");

if($query){
	echo 1;
}else{
	echo 0;
}