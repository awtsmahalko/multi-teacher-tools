<form action='' method='POST' id='updateClass_form'>
	<div class="modal fade" id="updateClass_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title" id="exampleModalLabel">Update Class</h4>
				</div>
				<div class="modal-body">
					<input type="hidden" id="hidden_class_id" name="u_class_id">
					<div class="form-group col-md-4">
						<label for="recipient-name" class="control-label">Class Code:</label>
						<input type="text" placeholder="Class Code" class="form-control col-md-6 col-xs-12" id="u_class_code"  name="u_class_code" required>
					</div>
					<div class="form-group col-md-4">
						<label for="recipient-name" class="control-label">Subject:</label>
						<input type="text" placeholder="Subject" class="form-control col-md-6 col-xs-12" id="u_subject" name="u_subject" required>
					</div>
					<div class="form-group col-md-4">
						<label for="recipient-name" class="control-label">Course Year - Sec:</label>
						<input type="text" placeholder="Course Year - Sec" class="form-control col-md-6 col-xs-12" id="u_section" name="u_section" required>
					</div>
					<div class="form-group col-md-6">
						<label for="recipient-name" class="control-label">Semester:</label>
						<select id="u_semester" name="u_semester" class="form-control col-md-3 col-xs-12" required>
							<option value="">--Select--</option>
							<option value='First'>First</option>
							<option value='Second'>Second</option>
						</select>
					</div>
					<div class="form-group col-md-6">
						<label for="recipient-name" class="control-label">Year:</label>
						<select id="u_year" name="u_year" class="form-control col-md-3 col-xs-12" required>
							<option value="">--Select--</option>
							<?php
							$year = date('Y');
							$i = 1;
							while($i <= 5){
							?>
							<option value='<?php echo $year?>'><?php echo $year."-".($year+1)?></option>
							<?php $year--;$i++;} ?>
						</select>
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
<form action='' method='POST' id='addClass_form'>				
	<div class="modal fade" id="addClass_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title" id="exampleModalLabel">Add New Class</h4>
				</div>
				<div class="modal-body">
					<div class="form-group col-md-4">
						<label for="recipient-name" class="control-label">Class Code:</label>
						<input type="text" placeholder="Class Code" class="form-control col-md-6 col-xs-12" name="class_code" required>
					</div>
					<div class="form-group col-md-4">
						<label for="recipient-name" class="control-label">Subject:</label>
						<input type="text" placeholder="Subject" class="form-control col-md-6 col-xs-12" name="subject" required>
					</div>
					<div class="form-group col-md-4">
						<label for="recipient-name" class="control-label">Course Year - Sec:</label>
						<input type="text" placeholder="Course Year - Sec" class="form-control col-md-6 col-xs-12" name="section" required>
					</div>
					<div class="form-group col-md-6">
						<label for="recipient-name" class="control-label">Semester:</label>
						<select name="semester" class="form-control col-md-3 col-xs-12" required>
							<option value="">--Select--</option>
							<option value='First'>First</option>
							<option value='Second'>Second</option>
						</select>
					</div>
					<div class="form-group col-md-6">
						<label for="recipient-name" class="control-label">Year:</label>
						<select id="year" name="year" class="form-control col-md-3 col-xs-12" required>
							<option value="">--Select--</option>
							<?php
							$year = date('Y');
							$i = 1;
							while($i <= 5){
							?>
							<option value='<?php echo $year?>'><?php echo $year."-".($year+1)?></option>
							<?php $year--;$i++;} ?>
						</select>
					</div>
				</div>
				<div class="clearfix"></div>
				<div class="modal-footer">
					<button type="submit" class="btn btn-primary" name="submit" id="submit" onclick=""><span class="fa fa-plus-circle"></span> ADD</button>
					<button type="button" class="btn btn-danger" data-dismiss="modal"><span class="fa fa-times-circle"></span> CANCEL</button>
				</div>
			</div>
		</div>
	</div>
</form>