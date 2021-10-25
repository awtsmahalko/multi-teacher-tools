<?php if($_SESSION['user_type'] == 1 ) {?>
<?php

$class_id = $_GET['id'];
$f_id = $_SESSION['account_id'];
$class_row = mysql_fetch_array(mysql_query("SELECT * from tbl_class where class_id='$class_id'"));
$class_term = mysql_fetch_array(mysql_query("SELECT term_name from tbl_class_term where f_id='$f_id' and class_term_status=1 "));
$settings = mysql_fetch_array(mysql_query("SELECT value_for_zero, passing_grade from tbl_settings where f_id='$f_id' and set_status=1 "));
$grading_system = mysql_fetch_array(mysql_query("SELECT * from tbl_grading_system where class_id='$class_id' and g_status=1 "));
$value_for_zero = mysql_fetch_array(mysql_query("SELECT value_for_zero from tbl_settings where f_id='$f_id' and set_status=1 "));
function calculate_equivalent_grade($zero,$raw,$perfect){
	if($perfect == 0){
		return 0;
	}else{
		$d = (100 - $zero)/$perfect;
		$equivalent_score = ($zero) + ($raw * $d);
		return number_format($equivalent_score,2);	
	}
}
function getAttendanceOver($class_id){
	$fetch = mysql_fetch_array(mysql_query("SELECT count(att_id) FROM tbl_attendance WHERE class_id = $class_id AND stu_id = -1"));
	return number_format($fetch[0],0);
}
function getStudentAttPresent($class_id,$stu_id){
	$fetch = mysql_fetch_array(mysql_query("SELECT sum(P) FROM tbl_attendance WHERE class_id = $class_id AND stu_id = $stu_id"));
	return number_format($fetch[0],0);
}
?>
<div id="page-wrapper">
	<div class="row">
        <div class="panel panel-default">
            <div class="panel-heading">
                Students' grades for <strong><span style='color:green; text-transform: uppercase !important;'><?php echo $class_row['class_code']; ?> <span class='fa fa-angle-double-right'></span> <?php echo $class_row['subject']; ?></strong> </span>
            </div>
            <div class="panel-body" style='max-width: 100%; overflow: auto;'>
            	<?php
            	//count quizzes
            	$count_quizzes = mysql_fetch_array(mysql_query("SELECT count(distinct(score_no)) from tbl_scores where grading_system='g_quiz' and class_id='$class_id' and faculty_id='$f_id'"));

            	//count exams
            	$count_exams = mysql_fetch_array(mysql_query("SELECT count(distinct(score_no)) from tbl_scores where grading_system='g_exam' and class_id='$class_id' and faculty_id='$f_id'"));

            	//count proj
            	$count_projects = mysql_fetch_array(mysql_query("SELECT count(distinct(score_no)) from tbl_scores where grading_system='g_project' and class_id='$class_id' and faculty_id='$f_id'"));

            	//count skills
            	$count_skills = mysql_fetch_array(mysql_query("SELECT count(distinct(score_no)) from tbl_scores where grading_system='g_skills' and class_id='$class_id' and faculty_id='$f_id'"));

            	//count skills
            	$count_reci = mysql_fetch_array(mysql_query("SELECT count(distinct(score_no)) from tbl_scores where grading_system='g_recitation' and class_id='$class_id' and faculty_id='$f_id'"));
            	?>
				<table class="table table-striped table-bordered" id='dt_grades' style='width: 100%; max-width: 100%; overflow: auto;'>
						<thead>
							<tr>
								<th>#</th>
								<th>Student Name</th>
								<th colspan='<?php if($count_quizzes[0] > 0){ echo $count_quizzes[0]; }else{ echo 1; } ?>'><center>Quizzes</center></th>
								<th style='color: green;'><center><?php echo $grading_system['g_quiz']; ?>%</center></th>
								<th colspan='<?php if($count_exams[0] > 0){ echo $count_exams[0]; }else{ echo 1; } ?>'><center>Exams</center></th>
								<th style='color: green;'><center><?php echo $grading_system['g_exam']; ?>%</center></th>
								<th colspan='<?php if($count_projects[0] > 0){ echo $count_projects[0]; }else{ echo 1; } ?>'><center>Projects</center></th>
								<th style='color: green;'><center><?php echo $grading_system['g_project']; ?>%</center></th>
								<th colspan='<?php if($count_skills[0] > 0){ echo $count_skills[0]; }else{ echo 1; } ?>'><center>Skills</center></th>
								<th style='color: green;'><center><?php echo $grading_system['g_skills']; ?>%</center></th>
								<th colspan='<?php if($count_reci[0] > 0){ echo $count_reci[0]; }else{ echo 1; } ?>'><center>Recitation</center></th>
								<th style='color: green;'><center><?php echo $grading_system['g_recitation']; ?>%</center></th>
								<th><center>Attendance</center></th>
								<th style='color: green;'><center><?php echo $grading_system['g_attendance']; ?>%</center></th>
								<th><center>Final Grade</center></th>
								<th><center>Remarks</center></th>
							</tr>
						</thead>
						<tbody id='students_data'>
							<tr>
								<td></td>
								<td></td>
								<?php
								//for quizzes header
								if($count_quizzes[0] > 0){
								$counter_quizzes = 1;
									while($count_quizzes[0] >= $counter_quizzes){
										$score_row_quizzes = mysql_fetch_array(mysql_query("SELECT date_added from tbl_scores where grading_system='g_quiz' and class_id='$class_id' and faculty_id='$f_id' and score_no='$counter_quizzes' "));
										echo "<td style='padding: 2px;'><center><span style='font-size: 11px;'>#".$counter_quizzes."</span><br><i><span style='font-size: 10px;'>".date('M d, Y', strtotime($score_row_quizzes['date_added']))."</span></i></center></td>";
										$counter_quizzes ++;
									}

								}else{
									echo "<td></td>";
								}

								?>
								<td></td>


								<?php
								//for exams header
								if($count_exams[0] > 0){
									$counter_exams = 1;
									while($count_exams[0] >= $counter_exams){
										$score_row_exam = mysql_fetch_array(mysql_query("SELECT date_added from tbl_scores where grading_system='g_exam' and class_id='$class_id' and faculty_id='$f_id' and score_no='$counter_exams' "));
										echo "<td style='padding: 2px;'><center><span style='font-size: 11px;'>#".$counter_exams."</span><br><i><span style='font-size: 10px;'>".date('M d, Y', strtotime($score_row_exam['date_added']))."</span></i></center></td>";
										$counter_exams ++;
									}
								}else{
									echo "<td></td>";
								}

								?>
								<td></td>

								<?php
								//for proj header
								if($count_projects[0] > 0){
									$counter_project = 1;
									while($count_projects[0] >= $counter_project){
										$score_row = mysql_fetch_array(mysql_query("SELECT date_added from tbl_scores where grading_system='g_project' and class_id='$class_id' and faculty_id='$f_id' and score_no='$counter_project' "));
										echo "<td style='padding: 2px;'><center><span style='font-size: 11px;'>#".$counter_project."</span><br><i><span style='font-size: 10px;'>".date('M d, Y', strtotime($score_row['date_added']))."</span></i></center></td>";
										$counter_project ++;
									}
								}else{
									echo "<td></td>";
								}

								?>
								<td></td>

								<?php
								//for skills header
								if($count_skills[0] > 0){
									$counter_skills = 1;
									while($count_skills[0] >= $counter_skills){
										$score_row = mysql_fetch_array(mysql_query("SELECT date_added from tbl_scores where grading_system='g_skills' and class_id='$class_id' and faculty_id='$f_id' and score_no='$counter_skills' "));
										echo "<td style='padding: 2px;'><center><span style='font-size: 11px;'>#".$counter_skills."</span><br><i><span style='font-size: 10px;'>".date('M d, Y', strtotime($score_row['date_added']))."</span></i></center></td>";
										$counter_skills ++;
									}
								}else{
									echo "<td></td>";
								}

								?>
								<td></td>

								<?php
								//for recitation header
								if($count_reci[0] > 0){
									$counter_reci = 1;
									while($count_reci[0] >= $counter_reci){
										$score_row = mysql_fetch_array(mysql_query("SELECT date_added from tbl_scores where grading_system='g_recitation' and class_id='$class_id' and faculty_id='$f_id' and score_no='$counter_reci' "));
										echo "<td style='padding: 2px;'><center><span style='font-size: 11px;'>#".$counter_reci."</span><br><i><span style='font-size: 10px;'>".date('M d, Y', strtotime($score_row['date_added']))."</span></i></center></td>";
										$counter_reci ++;
									}
								}else{
									echo "<td></td>";
								}

								?>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
							</tr>
							<?php
							$count = 1;
								$fetch_students = mysql_query("SELECT * from tbl_class_load where class_id='$class_id' order by stu_lname ASC") or die(mysql_error());
								while($students_row = mysql_fetch_array($fetch_students)){
									$counter = $count ++;

									$student_id = $students_row['class_load_id'];

									// get quizzes
									$fetch_quizzes = mysql_query("SELECT * from tbl_scores where grading_system='g_quiz' and class_id='$class_id' and faculty_id='$f_id' and student_id='$student_id' order by score_no ASC ") or die(mysql_error());

									// get exams
									$fetch_exams = mysql_query("SELECT * from tbl_scores where grading_system='g_exam' and class_id='$class_id' and faculty_id='$f_id' and student_id='$student_id' order by score_no ASC ") or die(mysql_error());

									// get project
									$fetch_prj = mysql_query("SELECT * from tbl_scores where grading_system='g_project' and class_id='$class_id' and faculty_id='$f_id' and student_id='$student_id' order by score_no ASC ") or die(mysql_error());

									// get skills
									$fetch_skills = mysql_query("SELECT * from tbl_scores where grading_system='g_skills' and class_id='$class_id' and faculty_id='$f_id' and student_id='$student_id' order by score_no ASC ") or die(mysql_error());

									// get reci
									$fetch_reci = mysql_query("SELECT * from tbl_scores where grading_system='g_recitation' and class_id='$class_id' and faculty_id='$f_id' and student_id='$student_id' order by score_no ASC ") or die(mysql_error());
							?>
							<tr>
								<td><?php echo $counter; ?></td>
								<td style='text-transform: capitalize;'><?php echo $students_row['stu_lname'].', '.$students_row['stu_fname'].' '.$students_row['stu_mname']; ?></td>
								<?php if($students_row['remarks'] == "dropped"){?>
								<td colspan='18'><center><font color='red'> STUDENT ALREADY DROPPED</font></center></td>
								<?php }else{?>
								<?php
								//loop for quizzes
								if(mysql_num_rows($fetch_quizzes) > 0){
								while($quizzes_row = mysql_fetch_array($fetch_quizzes)){ ?>
									<td style='font-size: 12px;'><center><?php echo number_format($quizzes_row['percentage_score'], 2); ?></center></td>
								<?php }
								}else{
									echo "<td></td>";
								} ?>
								<td style='color:green; font-weight: bold;'>
									<center>
									<?php
									$average_score = mysql_fetch_array(mysql_query("SELECT avg(percentage_score) from tbl_scores where grading_system='g_quiz' and class_id='$class_id' and faculty_id='$f_id' and student_id='$student_id'"));
									if($average_score[0] > 0){
										echo number_format(($average_score[0] * ($grading_system['g_quiz']/100)), 2);
									}

									$quiz_ave = ($average_score[0] * ($grading_system['g_quiz']/100));
									?>
								</center>
								</td>

								<?php
								//loop for exams
								if(mysql_num_rows($fetch_exams) > 0){
								while($exams_row = mysql_fetch_array($fetch_exams)){ ?>
									<td style='font-size: 12px;'><center><?php echo number_format($exams_row['percentage_score'],2); ?></center></td>
								<?php }
								}else{
									echo "<td></td>";
								} ?>
								<td style='color:green; font-weight: bold;'>
									<center>
									<?php
									$average_score = mysql_fetch_array(mysql_query("SELECT avg(percentage_score) from tbl_scores where grading_system='g_exam' and class_id='$class_id' and faculty_id='$f_id' and student_id='$student_id'"));
									if($average_score[0] > 0){
										echo number_format(($average_score[0] * ($grading_system['g_exam']/100)), 2);
									}

									$exam_ave = ($average_score[0] * ($grading_system['g_exam']/100));
									?>
								</center>
								</td>

								<?php
								//loop for proj
								if(mysql_num_rows($fetch_prj) > 0){
								while($proj_row = mysql_fetch_array($fetch_prj)){ ?>
									<td style='font-size: 12px;'><center><?php echo number_format($proj_row['percentage_score'], 2); ?></center></td>
								<?php }
								}else{
									echo "<td></td>";
								} ?>
								<td style='color:green; font-weight: bold;'>
									<center>
									<?php
									$average_score = mysql_fetch_array(mysql_query("SELECT avg(percentage_score) from tbl_scores where grading_system='g_project' and class_id='$class_id' and faculty_id='$f_id' and student_id='$student_id'"));
									if($average_score[0] > 0){
										echo number_format(($average_score[0] * ($grading_system['g_project']/100)), 2);
									}

									$project_ave = ($average_score[0] * ($grading_system['g_project']/100));
									?>
								</center>
								</td>

								<?php
								//loop for skills
								if(mysql_num_rows($fetch_skills) > 0){
								while($skills_row = mysql_fetch_array($fetch_skills)){ ?>
									<td style='font-size: 12px;'><center><?php echo number_format($skills_row['percentage_score'], 2); ?></center></td>
								<?php }
								}else{
									echo "<td></td>";
								} ?>
								<td style='color:green; font-weight: bold;'>
									<center>
									<?php
									$average_score = mysql_fetch_array(mysql_query("SELECT avg(percentage_score) from tbl_scores where grading_system='g_skills' and class_id='$class_id' and faculty_id='$f_id' and student_id='$student_id'"));
									if($average_score[0] > 0){
										echo number_format(($average_score[0] * ($grading_system['g_skills']/100)), 2);
									}

									$skills_ave = ($average_score[0] * ($grading_system['g_skills']/100));
									?>
								</center>
								</td>

								<?php
								//loop for reci
								if(mysql_num_rows($fetch_reci) > 0){
								while($reci_row = mysql_fetch_array($fetch_reci)){ ?>
									<td style='font-size: 12px;'><center><?php echo number_format($reci_row['percentage_score'], 2); ?></center></td>
								<?php }
								}else{
									echo "<td></td>";
								} ?>
								
								
								<td style='color:green; font-weight: bold;'>
									<center>
									<?php
									$average_score = mysql_fetch_array(mysql_query("SELECT avg(percentage_score) from tbl_scores where grading_system='g_recitation' and class_id='$class_id' and faculty_id='$f_id' and student_id='$student_id'"));
									if($average_score[0] > 0){
										echo number_format(($average_score[0] * ($grading_system['g_recitation']/100)), 2);
									}

									$recitation_ave = ($average_score[0] * ($grading_system['g_recitation']/100));
									?>
								</center>
								</td>
								
								<td>
									<center>
									<?php
									$zero_value = $value_for_zero[0] * 1;
									$raw_score = getStudentAttPresent($class_id,$student_id);
									$perfect_score = getAttendanceOver($class_id);
										echo $raw_score."/".$perfect_score;
									?>
									</center>
								</td>
								<td style='color:green; font-weight: bold;'>
									<?php
										$average_att = calculate_equivalent_grade($zero_value,$raw_score,$perfect_score);
										$attendance_ave = ($average_att * ($grading_system['g_attendance']/100));
										echo $average_att;
									?>
								</td>
								
								
								<td><strong><?php

								$final_grade = ($quiz_ave + $exam_ave + $project_ave + $skills_ave + $recitation_ave + $attendance_ave);

								if($final_grade >= $settings['passing_grade']){ echo "<span style='color:green;'>".number_format($final_grade, 3)."</span>"; }else{ echo "<span style='color:red;'>".number_format($final_grade, 3)."</span>"; } ?></strong></td>
								<td><?php if($final_grade >= $settings['passing_grade']){ echo "<span style='color:green;'>Passed</span>"; }else{ echo "<span style='color:red;'>Failed</span>"; }?></td>
							</tr>
							<?php } }?>
						</tbody>
					</table>
			</div>
		<div>
	</div>
</div>
<?php } else{ ?>
	<script> window.location="index.php?page=restrict"; </script>
<?php } ?>
<script>
$(document).ready(function (){
	$("#dt_grades").dataTable({
		"lengthMenu": [[-1], ["All"]],
		"bPaginate": false
	});

});
</script>