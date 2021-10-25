<?php
include 'core/config.php';
checkLoginStatus();
$page = (isset($_GET['page']) && $_GET['page'] !='') ? $_GET['page'] : '';
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Teachers Tool</title>
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="vendor/metisMenu/metisMenu.min.js"></script>
    <script src="dist/js/sb-admin-2.js"></script>
    <script src="vendor/moment/min/moment.min.js"></script>
    <script src="vendor/bootstrap-daterangepicker/daterangepicker.js"></script>
    <script src="vendor/bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js"></script>
    <script src="vendor/datatables/js/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables-plugins/dataTables.bootstrap.min.js"></script>
    <script src="vendor/datatables-responsive/dataTables.responsive.js"></script>
    <!-- Bootstrap Core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="vendor/bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.css" rel="stylesheet">
    <link href="vendor/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="dist/css/sb-admin-2.css" rel="stylesheet">

    <link href="vendor/datatables-plugins/dataTables.bootstrap.css" rel="stylesheet">

    <!-- DataTables Responsive CSS -->
    <link href="vendor/datatables-responsive/dataTables.responsive.css" rel="stylesheet">
    <!-- Custom Fonts -->
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <ul class="nav navbar-top-links navbar-right" style="float: right;">
                    <!-- /.dropdown -->
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                            <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                        </a>
                        <ul class="dropdown-menu dropdown-user">
                            <li><a href="#"><i class="fa fa-user fa-fw"></i> User Profile</a>
                            </li>
                            <li><a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a>
                            </li>
                            <li class="divider"></li>
                            <li><a href="auth/logout.php"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                            </li>
                        </ul>
                        <!-- /.dropdown-user -->
                    </li>
                    <a class="navbar-brand" href="#">Teacher's Schedule</a>
                </ul>
            </div>
            <!-- /.navbar-header -->
            <!-- /.navbar-top-links -->
			<?php //include 'side-bar.php';?>
            <!-- /.navbar-static-side -->
        </nav>
		<?php if($_SESSION['user_type'] == 1 ) {?>
            <div id="page-wrapper">
                <div class="row">
                <br>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            View Schedule
                        </div>
                        <div class="panel-body">
                            <?php
                                $f_id = $_SESSION['account_id'];
                                function getDaySchedule($from,$to){
                                $f_id = $_SESSION['account_id'];
                                $loop = mysql_query("SELECT s.sched_id FROM tbl_class_schedule as s INNER JOIN tbl_class as c ON c.class_id = s.class_id WHERE c.f_id=$f_id AND s.time_from='$from' AND s.time_to='$to'");
                                    $day = "";
                                    while ($row_loop = mysql_fetch_array($loop)) {
                                        $fetch = mysql_fetch_array(mysql_query("SELECT day FROM tbl_class_schedule WHERE sched_id = $row_loop[0]"));
                                        $day .= ",".$fetch[0];
                                    }
                                    return substr($day, 1);
                                }
                                function getSectionName($from,$to){
                                $f_id = $_SESSION['account_id'];
                                $loop = mysql_fetch_array(mysql_query("SELECT c.section FROM tbl_class_schedule as s INNER JOIN tbl_class as c ON c.class_id = s.class_id WHERE c.f_id=$f_id AND s.time_from='$from' AND s.time_to='$to'"));
                                    return $loop[0];
                                }
                                $fetch_sched = mysql_query("SELECT s.time_from,s.time_to,c.subject,c.class_id FROM tbl_class_schedule as s INNER JOIN tbl_class as c ON c.class_id = s.class_id WHERE c.f_id=$f_id GROUP BY s.time_from,s.time_to,c.subject");
                                $count = 1;
                                while($row_sched = mysql_fetch_array($fetch_sched)){
                                    if($count %2 != 0){
                                        $alert_type = "alert-success";
                                    }elseif($count %3 != 0){
                                        $alert_type = "alert-info";
                                    }
                            ?>
                            <div class="alert <?php echo $alert_type; ?>">
                                <center>
                                    <?php echo date("h:i A",strtotime($row_sched[0]))." - ".date("h:i A",strtotime($row_sched[1])); ?> <br>
                                    <?php echo getDaySchedule($row_sched[0],$row_sched[1]);?> <br>
                                    <?php echo $row_sched[2]." (".getSectionName($row_sched[0],$row_sched[1]).")"; ?>
                                </center>
                            </div>
                            <?php $count++; } ?>
                        </div>
                    </div>
                </div>
            </div>
            <?php } else{ ?>
                <script> window.location="index.php?page=restrict"; </script>
        <?php } ?>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
</body>
</html>