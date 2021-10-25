<?php
include '../core/config.php';
$class_id = $_POST['class_id'];
if($class_id != 0){
	$_SESSION['class_id'] = $class_id;
}
echo $_SESSION['class_id'];
?>