<?php 
require_once '../core/config.php';

if(isset($_SESSION['userid'])){
	header("Location: ../index.php");
	exit;
}

if(isset($_POST['userlogin'])){
	$result = processLogin();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>TEACHERS TOOL</title>

    <!-- Bootstrap Core CSS -->
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="../vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <center><h3 class="panel-title">Teacher's Multi Tool Web Based System</h3></center>
                    </div>
                    <div class="panel-body">
                        <form method="POST">
                            <fieldset>
                                <div class="form-group">
                                    <input type="text" name="userlogin" class="form-control" placeholder="Username" style="background-color: transparent;" required autofocus>
                                </div>
                                <div class="form-group">
                                    <input type="password" name="userpassword" class="form-control" placeholder="Password" style="background-color: transparent;">
                                </div>
                                <div class="checkbox">
                                    <label>
                                        <input name="remember" type="checkbox" value="Remember Me">Remember Me
                                    </label>
                                </div>
                                <!-- Change this to a button or input when using this as a form -->
								<div class="col-sm-12" style="padding: 0px;">
									<span>
										<button type="submit" name="submit"  class="btn btn-sm btn-success btn-block" id="btn-login"><span class="fa fa-check-circle" ></span> Login </button>
									</span>
									<div style="margin-bottom: 10px;">
										<center>
											<span style="font-size:10px;">
												&copy;Copyright TEACHERS TOOL <?php echo date("Y")?>. All Rights Reserved.</br>
												Powered by LevelJuan.
											</span>
										</center>
									</div>
									<div>
										<span style="text-align:center;font-size:12px;">
										<?php
										  if(isset($_SESSION['error'])){
											$message = $_SESSION['error'];
											if(!empty($message)){
											  echo '<div id="warning" class="animated shake" style="color:#c62828; margin-top: 3px; margin-bottom: 3px;" class="isa_error">
												 <i class="fa fa-times-circle"></i>
												 '.$message.'
											  </div>';
											}
										  }
										?>
										</span>
									</div>
								</div>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- jQuery -->
    <script src="../vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="../vendor/metisMenu/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script>
</body>
</html>