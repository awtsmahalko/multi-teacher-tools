<form action='' method='POST' id='addGradingSystem_form'>				
	<div class="modal fade" id="addGradingSystem_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title" id="exampleModalLabel">Add Grading System</h4>
				</div>
				<div class="modal-body">
					<div class="form-group col-md-12">
						<label for="recipient-name" class="control-label">Class:</label>
						<select class="form-control col-md-6 col-xs-12" name="aclass_id" required>
							<option value="">--Please Select--</option>
							<?php
							$class_id_from_gs = getClassIdFromGs();
							if ($class_id_from_gs == "") {
								$NOT_IN = "";
							}else{
								$NOT_IN = " AND class_id NOT IN ($class_id_from_gs)";
							}
							$fetch_class = mysql_query("SELECT * FROM tbl_class WHERE f_id = ".$_SESSION['account_id']."".$NOT_IN);
							while ($row_class = mysql_fetch_array($fetch_class)) {
							?>
							<option value="<?php echo $row_class['class_id'];?>"><?php echo "<b>[".$row_class['class_code']."]</b> - ".$row_class['subject']." ".$row_class['section'];?></option>
							<?php } ?>
						</select>
					</div>
					<div class="form-group col-md-4">
						<label for="recipient-name" class="control-label">Quizzes:</label>
						<input type="number" placeholder="Quizzes" class="form-control col-md-6 col-xs-12"  name="ag_quiz" required>
					</div>
					<div class="form-group col-md-4">
						<label for="recipient-name" class="control-label">Recitation:</label>
						<input type="number" placeholder="Recitation" class="form-control col-md-6 col-xs-12"  name="ag_recitation" required>
					</div>
					<div class="form-group col-md-4">
						<label for="recipient-name" class="control-label">Exams:</label>
						<input type="number" placeholder="Exams" class="form-control col-md-6 col-xs-12" name="ag_exam" required>
					</div>
					<div class="form-group col-md-4">
						<label for="recipient-name" class="control-label">Skills:</label>
						<input type="number" placeholder="Exams" class="form-control col-md-6 col-xs-12" name="ag_skills" required>
					</div>
					<div class="form-group col-md-4">
						<label for="recipient-name" class="control-label">Attendance:</label>
						<input type="number" placeholder="Attendance" class="form-control col-md-6 col-xs-12" name="ag_attendance" required>
					</div>
					<div class="form-group col-md-4">
						<label for="recipient-name" class="control-label">Project:</label>
						<input type="number" placeholder="Project" class="form-control col-md-6 col-xs-12"  name="ag_project" required>
					</div>
				</div>
				<div class="clearfix"></div>
				<div class="modal-footer">
					<button type="submit" class="btn btn-primary" name="submit" id="a_submit" onclick=""><span class="glyphicon glyphicon-plus-sign"></span> ADD</button>
					<button type="button" class="btn btn-danger" data-dismiss="modal"><span class="fa fa-times-circle"></span> CANCEL</button>
				</div>
			</div>
		</div>
	</div>
</form>
<form action='' method='POST' id='updateGradingSystem_form'>				
	<div class="modal fade" id="updateGradingSystem_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title" id="exampleModalLabel">Update Class Grading System ==> <font color="green" id="class_name"></font></h4>
				</div>
				<div class="modal-body">
					<input type="hidden" id="hidden_g_id" name="g_id">
					<div class="form-group col-md-4">
						<label for="recipient-name" class="control-label">Quizzes:</label>
						<input type="number" placeholder="Quizzes" class="form-control col-md-6 col-xs-12" id="quiz" name="g_quiz" required>
					</div>
					<div class="form-group col-md-4">
						<label for="recipient-name" class="control-label">Recitation:</label>
						<input type="number" placeholder="Recitation" class="form-control col-md-6 col-xs-12" id="recit" name="g_recitation" required>
					</div>
					<div class="form-group col-md-4">
						<label for="recipient-name" class="control-label">Exams:</label>
						<input type="number" placeholder="Exams" class="form-control col-md-6 col-xs-12" id="exam" name="g_exam" required>
					</div>
					<div class="form-group col-md-4">
						<label for="recipient-name" class="control-label">Skills:</label>
						<input type="number" placeholder="Exams" class="form-control col-md-6 col-xs-12" id="skills" name="g_skills" required>
					</div>
					<div class="form-group col-md-4">
						<label for="recipient-name" class="control-label">Attendance:</label>
						<input type="number" placeholder="Attendance" class="form-control col-md-6 col-xs-12" id="att" name="g_attendance" required>
					</div>
					<div class="form-group col-md-4">
						<label for="recipient-name" class="control-label">Project:</label>
						<input type="number" placeholder="Project" class="form-control col-md-6 col-xs-12" id="proj" name="g_project" required>
					</div>
				</div>
				<div class="clearfix"></div>
				<div class="modal-footer">
					<button type="submit" class="btn btn-primary" name="submit" id="u_submit" onclick=""><span class="fa fa-edit"></span> UPDATE</button>
					<button type="button" class="btn btn-danger" data-dismiss="modal"><span class="fa fa-times-circle"></span> CANCEL</button>
				</div>
			</div>
		</div>
	</div>
</form>