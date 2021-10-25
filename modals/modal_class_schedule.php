<form id="addClassSchedule_form" method="post" action="" enctype="multipart/form-data">
	<div id="addClassSchedule_modal" class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                    <h4 class="modal-title" id="myModalLabel2">Add New Schedule</h4>
                </div>
                <div class="modal-body">
					<div class="form-group col-md-6 options">
						<div style="border:1px solid;">
							<br>
							<div class="checkbox"><label><input type="checkbox" name='option[]' value="Monday" class="flat" required/> Monday</label></div>
							<div class="checkbox"><label><input type="checkbox" name='option[]' value="Tuesday" class="flat" required/> Tuesday</label></div>
							<div class="checkbox"><label><input type="checkbox" name='option[]' value="Wednesday" class="flat" required/> Wednesday</label></div>
							<div class="checkbox"><label><input type="checkbox" name='option[]' value="Thursday" class="flat" required/> Thursday</label></div>
							<div class="checkbox"><label><input type="checkbox" name='option[]' value="Friday" class="flat" required/> Friday</label></div>
							<div class="checkbox"><label><input type="checkbox" name='option[]' value="Saturday" class="flat" required/> Saturday</label></div><br>
						</div>
					</div>
					<div class="col-md-6" style="border:1px solid;">
						<div class="form-group">
							<label for="recipient-name" class="control-label">From:</label>
							<input type="time" id='time_from' name="time_from" class='form-control' required>
						</div>
						<div class="form-group">
							<label for="recipient-name" class="control-label">To:</label>
							<input type="time" id='time_to' name="time_to" class='form-control' required/>
						</div>
						<div class="form-group">
							<label for="recipient-name" class="control-label">Room:</label>
							<input type="text" id="room" class='form-control' placeholder="Room Name" required>
						</div>
					</div>
                </div>
				<div class="clearfix"></div><br>
                <div class="modal-footer">
					<button type="submit" class="btn btn-primary" name="upload" id="add_btn" onclick=""><span class="fa fa-check-circle"></span> ADD</button>
					<button type="button" class="btn btn-danger" data-dismiss="modal"> <span class="fa fa-times-circle"></span> CLOSE</button>
                </div>
            </div> 
        </div>
    </div>
</form>