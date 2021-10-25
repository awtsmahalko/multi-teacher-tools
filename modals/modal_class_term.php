<form action='' method='POST' id='addClassTerm_form'>				
	<div class="modal fade" id="addClassTerm_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title" id="exampleModalLabel">Add New Term</h4>
				</div>
				<div class="modal-body">
					<div class="form-group col-md-12">
						<label for="recipient-name" class="control-label">Term Name:</label>
						<input type="text" placeholder="Term Name" class="form-control col-md-6 col-xs-12" name="term_name" required>
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