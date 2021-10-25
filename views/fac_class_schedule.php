<?php if($_SESSION['user_type'] == 1 ) {
$_SESSION['class_id']  = $_GET['class_id'];
?>
<div id="page-wrapper">
	<div class="row">
	<br>
              <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
					<button style="float:right;margin-bottom:5px;margin-top:5px;margin-right:5px;" role="" type="button" class="btn btn-primary" data-toggle="modal" data-target="#addClassSchedule_modal"> <span class="glyphicon glyphicon-plus-sign"></span> Add</button>&nbsp;&nbsp;
				</div>
              </div>
        <div class="panel panel-default" style="min-height:100px">
            <div class="panel-heading">
                Manage Class Schedule
            </div>
                        <div class="panel-body">
                            <?php
                                $f_id = $_SESSION['account_id'];
                                function getDaySchedule($from,$to){
								$class = $_SESSION['class_id'];
                                $f_id = $_SESSION['account_id'];
                                $loop = mysql_query("SELECT s.sched_id FROM tbl_class_schedule as s INNER JOIN tbl_class as c ON c.class_id = s.class_id WHERE c.f_id=$f_id AND s.class_id = '$class' AND s.time_from='$from' AND s.time_to='$to'");
                                    $day = "";
                                    while ($row_loop = mysql_fetch_array($loop)) {
                                        $fetch = mysql_fetch_array(mysql_query("SELECT day FROM tbl_class_schedule WHERE sched_id = $row_loop[0]"));
                                        $day .= ",".$fetch[0];
                                    }
                                    return substr($day, 1);
                                }
                                function getSectionName($from,$to){
                                $f_id = $_SESSION['account_id'];
                                $loop = mysql_fetch_array(mysql_query("SELECT c.section FROM tbl_class_schedule as s INNER JOIN tbl_class as c ON c.class_id = s.class_id WHERE c.f_id=$f_id AND s.time_from='$from' AND s.time_to='$to'"));
                                    return $loop[0];
                                }
                                $fetch_sched = mysql_query("SELECT s.time_from,s.time_to,c.subject,c.class_id FROM tbl_class_schedule as s INNER JOIN tbl_class as c ON c.class_id = s.class_id WHERE c.f_id=$f_id AND s.class_id = ".$_SESSION['class_id']." GROUP BY s.time_from,s.time_to,c.subject");
                                $count = 1;
                                while($row_sched = mysql_fetch_array($fetch_sched)){
                                    if($count %2 != 0){
                                        $alert_type = "alert-success";
                                    }elseif($count %3 != 0){
                                        $alert_type = "alert-info";
                                    }
                            ?>
                            <div class="alert <?php echo $alert_type; ?>" style="margin-right: 5%;width: 20%;float: left;">
                                <center>
                                    <?php echo date("h:i A",strtotime($row_sched[0]))." -".date("h:i A",strtotime($row_sched[1])); ?> <br>
                                    <?php echo getDaySchedule($row_sched[0],$row_sched[1]);?> <br>
                                    <?php echo $row_sched[2]." (".getSectionName($row_sched[0],$row_sched[1]).")"; ?>
                                </center>
                            </div>
                            <?php $count++; } ?>
                        </div>
		</div>
	</div>
</div>
<?php include 'modals/modal_class_schedule.php'; ?>
<?php } else{ ?>
	<script> window.location="index.php?page=restrict"; </script>
<?php } ?>
<script>
$(function(){
    var requiredCheckboxes = $('.options :checkbox[required]');
    requiredCheckboxes.change(function(){
        if(requiredCheckboxes.is(':checked')) {
            requiredCheckboxes.removeAttr('required');
        } else {
            requiredCheckboxes.attr('required', 'required');
        }
    });
});
$('#addClassSchedule_form').submit(function(e){
	e.preventDefault();
	var time_to = $("#time_to").val();
	var time_from = $("#time_from").val();
	var room = $("#room").val();
	var checkedValues = $('input:checkbox:checked').map(function() {
		return this.value;
	}).get();
	
			id = [];

			$("#add_btn").prop('disabled', true);
			$("#add_btn").html("<span class='fa fa-spin fa-spinner'></span> Loading ...");
			$.post("ajax/fac_addClassSchedule.php", {
					id: checkedValues,
					time_from:time_from,
					time_to:time_to,
					room:room
				},
				function (data, status) {
					$("#add_btn").prop("disabled",false);
					$("#add_btn").html("<span class='glyphicon glyphicon-plus-sign'></span> Add");
					location.reload();
				}
			);
});
</script>