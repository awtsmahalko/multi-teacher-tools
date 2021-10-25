<?php
include '../core/config.php';
	$class_id = $_POST['class_id'];
	$seat_number = $_POST['seat_number'];

	$fetch_stud = mysql_fetch_array(mysql_query("SELECT student_id FROM tbl_seat_plan WHERE class_id = $class_id AND seat_number = $seat_number"));
	$stu_id = $fetch_stud[0];
	$fetch_att = mysql_query("SELECT att_date,sum(P),sum(L),sum(A) FROM tbl_attendance WHERE class_id=$class_id AND stu_id=$stu_id GROUP BY att_date");
	$p=0;
	$l=0;
	$a=0;
	$data = "<table id='datatable-responsive' class='table table-striped table-bordered dt-responsive nowrap' cellspacing='0' width=100%>
				<thead>
					<th>Date</th>
					<th width='10%'>Present</th>
					<th width='10%'>Late</th>
					<th width='10%'>Absent</th>
				</thead>
	";
	while($row_att = mysql_fetch_array($fetch_att)){
	$data .="
	<tr>
		<td>".date('M d, Y',strtotime($row_att[0]))."</td>
		<td>".$row_att[1]."</td>
		<td>".$row_att[2]."</td>
		<td>".$row_att[3]."</td>
	</tr>
	";
	$p +=$row_att[1];
	$l +=$row_att[2];
	$a +=$row_att[3];
	}
	$data1 ="
	<tr>
		<td>TOTAL:</td>
		<td>".$p."</td>
		<td>".$l."</td>
		<td>".$a."</td>
	</tr>
	</table>
	";
echo $data;
echo $data1;
?>