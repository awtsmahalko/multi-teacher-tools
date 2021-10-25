<table class='table table-stripped table-borderless'>
	<thead>
		<th>Rank #</th>
		<th>Student Name</th>
		<th>Final Grade</th>
	</thead>
	<tbody>
<?php
include '../core/config.php';
$f_id = $_SESSION['account_id'];
$class_id = $_POST['class_id'];


$fetch_students = mysql_query("SELECT * from tbl_class_load where class_id='$class_id' and remarks='Passed' group by final_grade order by final_grade DESC") or die(mysql_error());

$counter = 1;
$ranking_number = 0;
while($students_row = mysql_fetch_array($fetch_students)){
	$final_grade = $students_row['final_grade'];

	if($counter <= 10){
		$ranking_number = $ranking_number + 1;
		// this is for students grade
		$fetch_all_students_by_grade = mysql_query("SELECT * from tbl_class_load where class_id='$class_id' and final_grade='$final_grade' and remarks='Passed' ") or die(mysql_error());
		while($students_by_grade_row = mysql_fetch_array($fetch_all_students_by_grade)){
			$student_name = $students_by_grade_row['stu_lname'].', '.$students_by_grade_row['stu_fname'].' '.$students_by_grade_row['stu_mname'];
			?>
			<tr>
				<td><?php echo $ranking_number; ?></td>
				<td style='text-transform: capitalize;'><?php echo $student_name; ?></td>
				<td><?php echo $final_grade; ?></td>
			</tr>
		<?php
		$counter = $counter + 1; 
			}

		// end for students grade
	}

}

?>
	</tbody>
</table>