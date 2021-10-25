<?php
include '../core/config.php';
$class_id = $_SESSION['class_id'];
$mimes = array('application/vnd.ms-excel','text/plain','text/csv','text/tsv');
if(in_array($_FILES['file']['type'],$mimes)){
	if(!empty($_FILES["file"]["tmp_name"])){
			$file = $_FILES['file']['tmp_name'];
			$handle = fopen($file, "r");
			$c = 1;
			$errors_checker = '';
			$success_checker = '';
			
			while(($filesop = fgetcsv($handle, 10000, ",")) !== false){
				if($c > 1){
					$lname = $filesop[0];
					$fname = $filesop[1];
					$mname = $filesop[2];

					$checkDup = checkStudentIfExist($class_id,$lname,$fname,$mname);
						if($checkDup > 0){
							$errors_checker .=  "<span style='color: red;'>FAILED! <strong>(".$lname.",".$fname.")</strong>: Already Exists!</span><br>";
						}else{
							saveStudentToLoad($class_id,$lname,$fname,$mname);
							$success_checker .=  "<span style='color: green;'>SUCCESS! <strong>(".$lname.",".$fname.")</strong> successfully added.</span><br>";
						}
				}
			$c++;
			}
			echo $errors_checker;
			echo $success_checker;
	}else{
	echo "<center><span style='color: red;'>Please Select A file!.</span><br></center>";
	}
}else{
	echo "<center><span style='color: red;'>In appropriate file! Please Import A CSV Format!</span><br></center>";
}
function saveStudentToLoad($class_id,$lname,$fname,$mname){
	$fetch = mysql_query("INSERT INTO tbl_class_load (class_id,stu_fname,stu_mname,stu_lname,class_load_status) VALUES($class_id,'$fname','$mname','$lname',1)");
}
function checkStudentIfExist($class_id,$lname,$fname,$mname){
	$fetch = mysql_fetch_array(mysql_query("SELECT count(class_load_id) FROM tbl_class_load WHERE class_id=$class_id AND stu_fname='$fname' AND stu_lname='$lname' AND stu_mname='$mname'"));
	return $fetch[0];
}
?>