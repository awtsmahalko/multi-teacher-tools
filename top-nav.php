<?php
$number = getNotificationNo();
?>
            <ul class="nav navbar-top-links navbar-right">
				<?php if($_SESSION['user_type'] == 1){ if($number > 0){?>
                <li role="presentation" class="dropdown menu_fixed">
                  <a href="javascript:;" class="dropdown-toggle info-number" data-toggle="dropdown" aria-expanded="false">
                    <i class="fa fa-bell"></i>
					<span class="badge bg-red"><?php echo $number ?></span>
                  </a>
                    <ul class="dropdown-menu dropdown-messages" style="max-height:300px;overflow:auto;">
						<?php
						$f_id = $_SESSION['account_id'];
						$fetch_notif = mysql_query("SELECT * FROM tbl_notification WHERE f_id=$f_id AND notif_status='1' ORDER BY date DESC");
						while($row_notif = mysql_fetch_array($fetch_notif)){
						?>
                        <li>
                            <a href="index.php?page=student-attendance&id=<?php echo $row_notif['stu_id']."&class_id=".$row_notif['class_id']."&f_id=".$row_notif['f_id']."&notif=".$row_notif['notif_id']?>">
                                <div>
                                    <span class="pull-right text-muted">
                                        <em><?php echo date("M d, Y", strtotime($row_notif['date']));?></em>
                                    </span>
                                </div>
                                <div style="font-size:12px"><strong><?php echo getStudentNameById($row_notif['stu_id'])?></strong> is already dropped in <font color='red'><?php echo getSubjectByClassIds($row_notif['class_id']);?></font></div>
                            </a>
                        </li>
                        <li class="divider"></li>
						<?php } ?>
                    </ul>
                </li>
				<?php } } ?>
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="auth/logout.php"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>