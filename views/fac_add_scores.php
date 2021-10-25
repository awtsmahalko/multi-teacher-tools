<?php if($_SESSION['user_type'] == 1 ) {?>

<?php

$class_id = $_GET['id'];

$f_id = $_SESSION['account_id'];

$class_row = mysql_fetch_array(mysql_query("SELECT * from tbl_class where class_id='$class_id'"));

$class_term = mysql_fetch_array(mysql_query("SELECT term_name from tbl_class_term where f_id='$f_id' and class_term_status=1 "));

$value_for_zero = mysql_fetch_array(mysql_query("SELECT value_for_zero from tbl_settings where f_id='$f_id' and set_status=1 "));

?>

<div id="page-wrapper">

	<div class="row">

        <div class="panel panel-default">

            <div class="panel-heading">

                Add Scores for <strong><span style='color:green; text-transform: uppercase !important;'><?php echo $class_row['class_code']; ?> <span class='fa fa-angle-double-right'></span> <?php echo $class_row['subject']; ?></strong> </span>

            </div>

            <div class="panel-body">

            	<form action='' method="POST" id='frm_add_scores'>

					<div class='col-sm-12' style='padding: 0px; margin-bottom: 15px;'>

						<div class='col-sm-3' style='padding: 2px;'>

							<div class='input-group'>

								<span class='input-group-addon'><strong>What to score?</strong></span>

								<select class='form-control' name='component' id='component' required onchange="getSquenceNumber()">

									<option value=''>-- Please select --</option>

									<option value='g_quiz'>Quizzes</option>

									<option value='g_exam'>Exams</option>

									<option value='g_project'>Project</option>

									<option value='g_skills'>Skills</option>

									<option value='g_recitation'>Recitation</option>

								</select>

								<input type="hidden" id='class_id' value="<?php echo $_GET['id']; ?>">

								<input type="hidden" id='sequence_number'>

							</div>

						</div>

						<div class='col-sm-3' style='padding: 2px;'>

							<div class='input-group'>

								<span class='input-group-addon'><strong>Perfect Score</strong></span>

								<input type='number' min='0' class='form-control' required name='perfect_score' id='perfect_score'>

							</div>

						</div>

						<div class='col-sm-3' style='padding: 2px;'>

							<div class='input-group'>

								<div class='input-group'>

									<span class='input-group-addon'><strong>Date</strong></span>

									<input type='date' class='form-control' required name='date_of_scoring' id='date_of_scoring'>

								</div>

							</div>

						</div>

						<div class='col-sm-3' style='padding: 2px;'>

							<div class='input-group'>

								<div class='input-group'>

									<span class='input-group-addon'><strong> Term</strong></span>

									<input type='text' class='form-control' value='<?php echo $class_term[0]; ?>' readonly required>

									<input type='hidden' class='form-control' id='value_of_zero' value='<?php echo $value_for_zero[0] * 1; ?>' readonly>

								</div>

							</div>

						</div>

					</div>

					

					<table width="100%" class="table table-striped table-bordered table-hover">

						<thead>

							<tr>

								<th>#</th>

								<th>Student Name</th>

								<th>Score</th>

								<th>Percentage Score</th>

							</tr>

						</thead>

						<tbody id='students_data'>

							<?php

							$count = 1;

								$fetch_students = mysql_query("SELECT * from tbl_class_load where class_id='$class_id' and remarks !='dropped' order by stu_lname ASC") or die(mysql_error());

								while($students_row = mysql_fetch_array($fetch_students)){

									$counter = $count ++;

							?>

							<tr>

								<td><?php echo $counter; ?><input type='hidden' value='<?php echo $students_row['class_load_id']; ?>' id='student_id'></td>

								<td style='text-transform: capitalize;'><?php echo $students_row['stu_lname'].', '.$students_row['stu_fname'].' '.$students_row['stu_mname']; ?></td>

								<td><input type='number' class='form-control score<?php echo $students_row['class_load_id']; ?>' id="score" onkeyup="calculate_equivalent_grade(<?php echo $students_row['class_load_id']; ?>)" required></td>

								<td><input type='text' class='form-control' id='percentage_score<?php echo $students_row['class_load_id']; ?>' disabled></td>

							</tr>

								<?php } ?>

								<tr></tr>

						</tbody>

					</table>

					<button class='btn btn-primary pull-right' id='btn_submit_scores'><span class='fa fa-check-circle'></span> Submit Scores</button>
				</form>
			</div>
		</div>
	</div>
</div>

<?php include 'modals/modal_response_log.php'; ?>

<?php } else{ ?>

	<script> window.location="index.php?page=restrict"; </script>

<?php } ?>

<script>

$(document).ready(function (){

	

});



$("#frm_add_scores").submit(function(e){

	e.preventDefault();



	var date_of_scoring = $("#date_of_scoring").val();

	var perfect_score = $("#perfect_score").val();

	var component = $("#component").val();

	var class_id = $("#class_id").val();

	var sequence_number = $("#sequence_number").val();

	



	//$("#error_response").val("----------------");

	$("#error_response").remove();

	$("#response_log_div").html("<span id='error_response'></span>");

	$("#error_response").append("<h4 style='color: green;'>Response:</h4>");

	$("#btn_submit_scores").prop("disabled", true);

	$("#btn_submit_scores").html("<span class='fa fa-spinner fa-spin'></span> Submitting Scores ...");



	var no_of_students = $("#students_data tr").length;



	var counter = 1;



	if(no_of_students > 0){

		$("#students_data tr").each(function(){

			$(this).find("#student_id").each(function(){

				student_id = $(this).val();

			});

			

			$(this).find("#score").each(function(){

				score = $(this).val();

			});

			

			var post_data = student_id+','+score;



			if((no_of_students - 1) >= counter ){

				$.ajax({

					type:"POST",

					url:"ajax/fac_add_scores.php",

					data:{

						post_data:post_data,

						date_of_scoring:date_of_scoring,

						perfect_score:perfect_score,

						component:component,

						class_id:class_id,

						sequence_number:sequence_number

					},

					success:function(data){

						$("#error_response").append(data);

						

					}

				});

				counter ++;



			}else{

				setTimeout(function() {

					$("#btn_submit_scores").prop("disabled", false);

					$("#btn_submit_scores").html("<span class='fa fa-plus-circle'></span> Submit Scores");

					//$("#response_log_div").html($("#error_response").val());

					$("#modalResponseLog").modal('show');

					//$("#error_response").val("");



					$("#frm_add_scores").each(function(){

						this.reset();

					});



				}, 3000);

				

				

			}

		});



		

		



		

	}else{

		alert("No students found.");

	}



});



function calculate_equivalent_grade(ref){



	//$("#error_response").val("Response:");



	var value_of_zero = $("#value_of_zero").val() * 1;

	var perfect_score = $("#perfect_score").val() * 1;

	var score = $(".score"+ref).val();



	var d = (100 - value_of_zero)/perfect_score;

	var equivalent_score = (value_of_zero) + (score * d);

	$("#percentage_score"+ref).val(equivalent_score);



}



function getSquenceNumber(){

	var component = $("#component").val();

	var class_id = $("#class_id").val();



	$.ajax({

		type:"POST",

		url:"ajax/fac_getSequenceNumber.php",

		data:{

			component:component,

			class_id:class_id

		},

		success: function(data){

			$("#sequence_number").val(data);

		}

	});

}

</script>