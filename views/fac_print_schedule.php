<script src="lib/FileSaver.js"></script>
<script src="lib/jquery.wordexport.js"></script>
<div id="page-wrapper">

	<div class="row">

		<div class="col-lg-6">

			<h3 class="page-header animated flipInX" style="border: 5px solid #286090;border-top: none;border-bottom: none;border-right: none;padding: 5px;color: #286090;"><span class="fa fa-calendar"></span> Schedule</h3>

		</div>

	</div>

	<form method="post" action="#">

    <div class="row" style="margin-bottom: 10px;">



		<div class="col-md-12" style="margin-bottom:10px;border-bottom: 1px solid #aaa;">
		<div class="col-sm-8" style="padding: 2px;">
			<button class="btn btn-default" id="btn_generate_report" onclick="printDiv('seat_plan')"><span class="fa fa-print"></span> Print Report</button>
			<a class="word-export" href="javascript:void(0)"><button class="btn btn-success" id="btn_generate_report"><span class="fa fa-download"></span> Export to Word</button></a>
		</div>

		</div>

	</div>

</form>
        <div class="panel panel-default" id="seat_plan_id">
            <div class="panel-heading">
                Schedule
            </div>
            <div id='seat_plan'>
			</div>
		</div>
</div>

<script>
$(document).ready(function (){
	getSchedule();
});
function getSchedule(){
	class_id = "";
	$.ajax({

		type:"POST",

		url:"ajax/fac_p_schedule.php",

		data:{

			class_id:class_id

		},

		success:function(data){

			$("#seat_plan").html(data);
		}
	});
}

function printDiv(container){

	var printContents = document.getElementById(container).innerHTML;

	var originalContents = document.body.innerHTML;

	document.body.innerHTML = printContents;

	window.print();

	document.body.innerHTML = originalContents;


}
$("a.word-export").click(function(event) {
	$("#seat_plan_id").wordExport();
});


</script>

