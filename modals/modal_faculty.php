<form action='' method='POST' id='addFacultyModal_form'>				
	<div class="modal fade" id="addFacultyModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title" id="exampleModalLabel">Add New Faculty</h4>
				</div>
				<div class="modal-body">
					<div class="form-group col-md-4">
						<label for="recipient-name" class="control-label">Last Name:</label>
						<input type="text" placeholder="Last Name" class="form-control col-md-6 col-xs-12" id="fac_lname" name="fac_lname" required>
					</div>
					<div class="form-group col-md-4">
						<label for="recipient-name" class="control-label">First Name:</label>
						<input type="text" placeholder="First Name" class="form-control col-md-6 col-xs-12" id="fac_fname" name="fac_fname" required>
					</div>
					<div class="form-group col-md-4">
						<label for="recipient-name" class="control-label">Middle Name:</label>
						<input type="text" placeholder="Middle Name" class="form-control col-md-6 col-xs-12" id="fac_mname" name="fac_mname" required>
					</div>
					<div class="form-group col-md-12">
						<label for="recipient-name" class="control-label">Address:</label>
						<textarea id="address" required="required" name="address" placeholder="Address" class="form-control col-md-12 col-xs-12"></textarea>
					</div>
					<div class="form-group col-md-3">
						<label for="recipient-name" class="control-label">Gender:</label>
						<select id="gender" name="gender" class="form-control col-md-3 col-xs-12" required>
							<option value="">--Select--</option>
							<option value="1"> Male</option>
							<option value="0"> Female</option>
						</select>
					</div>
					<div class="form-group col-md-5">
						<label for="recipient-name" class="control-label">Birthdate:</label>
						<input type="date" class="form-control col-md-6 col-xs-12" name="bdate" required>
					</div>
					<div class="form-group col-md-4">
						<label for="recipient-name" class="control-label">Contact:</label>
						<input type="text" class="form-control" name="con" placeholder="09123456789" maxlength="11" aria-describedby="inputSuccess2Status">
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
<form action='' method='POST' id='editFacultyModal_form'>				
	<div class="modal fade" id="editFacultyModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title" id="exampleModalLabel">Update Faculty</h4>
				</div>
				<div class="modal-body">
					<input type="hidden" id="u_id" name="u_id">
					<div class="form-group col-md-4">
						<label for="recipient-name" class="control-label">Last Name:</label>
						<input type="text" placeholder="Last Name" class="form-control col-md-6 col-xs-12" id="u_f_lname" name="u_f_lname" required>
					</div>
					<div class="form-group col-md-4">
						<label for="recipient-name" class="control-label">First Name:</label>
						<input type="text" placeholder="First Name" class="form-control col-md-6 col-xs-12" id="u_f_fname" name="u_f_fname" required>
					</div>
					<div class="form-group col-md-4">
						<label for="recipient-name" class="control-label">Middle Name:</label>
						<input type="text" placeholder="Middle Name" class="form-control col-md-6 col-xs-12" id="u_f_mname" name="u_f_mname" required>
					</div>
					<div class="form-group col-md-12">
						<label for="recipient-name" class="control-label">Address:</label>
						<textarea id="u_address" required="required" name="u_address" placeholder="Address" class="form-control col-md-12 col-xs-12"></textarea>
					</div>
					<div class="form-group col-md-3">
						<label for="recipient-name" class="control-label">Gender:</label>
						<select id="u_gender" name="u_gender" class="form-control col-md-3 col-xs-12" required>
							<option value="">--Select--</option>
							<option value="1"> Male</option>
							<option value="0"> Female</option>
						</select>
					</div>
					<div class="form-group col-md-5">
						<label for="recipient-name" class="control-label">Birthdate:</label>
						<input type="date" class="form-control col-md-6 col-xs-12" name="u_bdate" id="u_bdate" required>
					</div>
					<div class="form-group col-md-4">
						<label for="recipient-name" class="control-label">Contact:</label>
						<input type="text" class="form-control" id="u_con" name="u_con" placeholder="09123456789" maxlength="11" aria-describedby="inputSuccess2Status">
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