<?php if($_SESSION['user_type'] == 1 ) {
$stu_id = $_GET['id'];
$class_id = $_GET['class_id'];
$f_id = $_GET['f_id'];
$notif_id = $_GET['notif'];
mysql_query("UPDATE tbl_notification SET notif_status=0 WHERE notif_id=$notif_id");
	$fetch_att = mysql_query("SELECT att_date,sum(P),sum(L),sum(A) FROM tbl_attendance WHERE class_id=$class_id AND stu_id=$stu_id GROUP BY att_date");
	$p=0;
	$l=0;
	$a=0;
	$count = 1;
?>
<div id="page-wrapper">
	<div class="row">
	<br><br>
        <div class="panel panel-default">
            <div class="panel-heading">
                Students Attendance
            </div>
            <div class="panel-body ">
				<table width="100%" class="table table-striped table-bordered table-hover" id="dt_class">
					<thead>
						<tr>
							<th>#</th>
							<th>Date</th>
							<th>Present</th>
							<th>Late</th>
							<th>Absent</th>
						</tr>
					</thead>
					<tbody>
					<?php while($row_att = mysql_fetch_array($fetch_att)){ ?>
						<tr>
							<td><?php echo $count ?></td>
							<td><?php echo date('F d, Y',strtotime($row_att[0])) ?></td>
							<td><?php echo $row_att[1] ?></td>
							<td><?php echo $row_att[2] ?></td>
							<td><?php echo $row_att[3] ?></td>
						</tr>
					<?php
						$p +=$row_att[1];
						$l +=$row_att[2];
						$a +=$row_att[3];
						$count++;
					}?>
						<tr>
							<td colspan='2'>TOTAL:</td>
							<td><?php echo $p ?></td>
							<td><?php echo $l ?></td>
							<td><?php echo $a ?></td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
<?php } else{ ?>
	<script> window.location="index.php?page=restrict"; </script>
<?php } ?>