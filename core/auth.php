<?php
function checkLoginStatus(){
if (!isset($_SESSION['user_id'])){
		header("Location: auth/login.php");
		exit;
	}

}

function clean($str) {
        $str = @trim($str);
        if(get_magic_quotes_gpc()) {
            $str = stripslashes($str);
        }
        return mysql_real_escape_string($str);
}

function encryptIt( $q ) {
    $cryptKey  = 'qJB0rGtIn5UB1xG03efyCp';
    $qEncoded      = base64_encode( mcrypt_encrypt( MCRYPT_RIJNDAEL_256, md5( $cryptKey ), $q, MCRYPT_MODE_CBC, md5( md5( $cryptKey ) ) ) );
    return( $qEncoded );
}

function decryptIt( $q ) {
    $cryptKey  = 'qJB0rGtIn5UB1xG03efyCp';
    $qDecoded      = rtrim( mcrypt_decrypt( MCRYPT_RIJNDAEL_256, md5( $cryptKey ), base64_decode( $q ), MCRYPT_MODE_CBC, md5( md5( $cryptKey ) ) ), "\0");
    return( $qDecoded );
}

function processLogin(){

		$userlogin = clean($_POST['userlogin']);

		if(passwordHashing == true)
		{
			$userpassword =  encryptIt($_POST['userpassword']);
		}else
		{
			$userpassword = clean($_POST['userpassword']);
		}

	$query = "SELECT * FROM ";
	$query .= table;
	$query .=" WHERE username = '$userlogin' AND password = '$userpassword'";

	$result = mysql_query($query) or die (mysql_error());

	if(mysql_num_rows($result) == 1){
	require_once '../lib/mobile_detect.php';
	$detect = new Mobile_Detect;

		$row = mysql_fetch_assoc($result);
		$_SESSION['user_id'] = $row['user_id'];
		$_SESSION['username'] = $row['username'];
		$_SESSION['user_type'] = $row['user_type'];
		$_SESSION['account_id'] = $row['account_id'];
		if ( $detect->isMobile() ) {
 			header("Location:../mobile.php");
		}else{
			header("Location:../index.php");
		}
		exit;
	}else {
		$_SESSION['error']  = error_message;
		header("Location:../auth/login.php");
		exit;
	}

}
