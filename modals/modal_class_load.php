<form action='' method='POST' id='addClassLoad_form'>				
	<div class="modal fade" id="addClassLoad_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		<div class="modal-dialog" role="document">
			<input type="hidden" id="hidden_class_id" name="class_id" value="<?php echo $get_class_id; ?>">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title" id="exampleModalLabel">Add New Student</h4>
				</div>
				<div class="modal-body">
					<div class="form-group col-md-4">
						<label for="recipient-name" class="control-label">Last Name:</label>
						<input type="text" placeholder="Lastname" class="form-control col-md-6 col-xs-12" name="last" required>
					</div>
					<div class="form-group col-md-4">
						<label for="recipient-name" class="control-label">First Name:</label>
						<input type="text" placeholder="Firstname" class="form-control col-md-6 col-xs-12" name="first" required>
					</div>
					<div class="form-group col-md-4">
						<label for="recipient-name" class="control-label">Middle Name:</label>
						<input type="text" placeholder="Middlename" class="form-control col-md-6 col-xs-12" name="middle" required>
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
<form action='' method='POST' id='updateClassLoad_form'>				
	<div class="modal fade" id="updateClassLoad_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		<div class="modal-dialog" role="document">
			<input type="hidden" id="hidden_class_load_id" name="class_load_id">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title" id="exampleModalLabel">Update Student</h4>
				</div>
				<div class="modal-body">
					<div class="form-group col-md-4">
						<label for="recipient-name" class="control-label">Last Name:</label>
						<input type="text" class="form-control col-md-6 col-xs-12" id="u_last" name="u_last" required>
					</div>
					<div class="form-group col-md-4">
						<label for="recipient-name" class="control-label">First Name:</label>
						<input type="text" class="form-control col-md-6 col-xs-12" id="u_first" name="u_first" required>
					</div>
					<div class="form-group col-md-4">
						<label for="recipient-name" class="control-label">Middle Name:</label>
						<input type="text" class="form-control col-md-6 col-xs-12" id="u_middle" name="u_middle" required>
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
			<form id="uploadClassLoad_form" method="post" action="" enctype="multipart/form-data">
				<div id="uploadClassLoad_modal" class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
                          </button>
                          <h4 class="modal-title" id="myModalLabel2">Upload Class Load's Students</h4>
                        </div>
                        <div class="modal-body">
						<small>The file to be upload must be a CSV File</small>
                          <input id="file" type="file" name="file"  class="form-control" required/>
                        </div>
                        <div class="modal-footer">
							<button type="submit" class="btn btn-primary" name="upload" id="upload" onclick=""><span class="fa fa-check-circle"></span> UPLOAD</button>
							<button type="button" class="btn btn-danger" data-dismiss="modal"> <span class="fa fa-times-circle"></span> CLOSE</button>
                        </div>
                      </div> 
                    </div>
                </div>
			</form>