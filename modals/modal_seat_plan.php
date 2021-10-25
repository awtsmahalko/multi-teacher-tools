<form action='' method='POST' id='modal_seat_plan_form'>				
	<div class="modal fade" id="modal_seat_plan" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		<div class="modal-dialog" role="document">
			<input type="hidden" id="hidden_class_id" name="class_id">
			<input type="hidden" id="hidden_seat_number" name="seat_number">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title" id="exampleModalLabel">Update Seat</h4>
				</div>
				<div class="modal-body">
					<div class="form-group">
						<label for="recipient-name" class="control-label">Student:</label>
						<select class="form-control getStudentsDropDown" id="student_seat_plan" name="student_id">
							
						</select>
					</div>
				</div>
				<div class="clearfix"></div>
				<div class="modal-footer">
					<button type="submit" class="btn btn-primary" name="submit" id="submit" onclick=""><span class="fa fa-check-circle"></span> SAVE</button>
					<button type="button" class="btn btn-danger" data-dismiss="modal"><span class="fa fa-times-circle"></span> CANCEL</button>
				</div>
			</div>
		</div>
	</div>
</form>