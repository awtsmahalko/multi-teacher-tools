<form id="checkAttendance_form" method="post" action="">
	<div id="checkAttendance_modal" class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                    <h4 class="modal-title" id="myModalLabel2">Check Attendance</h4>
                </div>
                <div class="modal-body">
				<input type='hidden' id='hidden_classid' name='hidden_class_id' value='<?php echo $_SESSION['class_id']; ?>'>
					<div class="form-group">
						<label style="margin-right: 20px">CLASS: <font color='green'><?php echo "<i>".getClassCodeByClassId()."</i>";?></font></label>
						<label style="margin-right: 20px">SUBJECT: <font color='green'><?php echo "<i>".getSubjectByClassId()."</i>";?></font></label>
						<label>SECTION: <font color='green'><?php echo "<i>".getSectionNameByClassId()."</i>";?></font></label>
					</div>
							  <div class="form-group">
							  		<input type="date" name="date" class="form-control" required="true">
							  </div>
					<table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%" style='margin-bottom:-5px'>
						<thead>
							<th width='12%'>P&nbsp;&nbsp;&nbsp;L&nbsp;&nbsp;&nbsp;A</th>
							<th>Student Name</th>
						</thead>
					</table>
					<div class='form-group' style='max-height: 300px; overflow: auto;'>
					<table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
						<?php
						$fetch_att = mysql_query("SELECT * FROM tbl_class_load WHERE class_id = ".$_SESSION['class_id']."");
						while($row_att = mysql_fetch_array($fetch_att)){
						?>
						<tr>
							<td  width='12%'>
								<input type='radio' title='Present' name='name_<?php echo $row_att[0]?>' value='P' required>
								<input type='radio' title='Late' name='name_<?php echo $row_att[0]?>' value='L' required>
								<input type='radio' title='Absent' name='name_<?php echo $row_att[0]?>' value='A' required>
							</td>
							<td><?php echo $row_att['stu_lname'].", ".$row_att['stu_fname']." ".$row_att['stu_mname'] ?></td>
						</tr>
						<?php } ?>
						</table>
					</div>
                </div>
                <div class="modal-footer">
					<button type="submit" class="btn btn-primary" name="upload" id="add_btn" onclick=""><span class="fa fa-check-circle"></span> SUBMIT</button>
					<button type="button" class="btn btn-danger" data-dismiss="modal"> <span class="fa fa-times-circle"></span> CLOSE</button>
                </div>
            </div> 
        </div>
    </div>
</form>
