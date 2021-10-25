<div id="page-wrapper">

	<div class="row">

		<div class="col-lg-6">

			<h3 class="page-header animated flipInX" style="border: 5px solid #286090;border-top: none;border-bottom: none;border-right: none;padding: 5px;color: #286090;"><span class="fa fa-trophy"></span> Top 10 Students</h3>

		</div>

	</div>

	<form method="post" action="#">

    <div class="row" style="margin-bottom: 10px;">



		<div class="col-md-12" style="margin-bottom:10px;border-bottom: 1px solid #aaa;">

			<div class="col-md-4 spaceMe">

				<div class="input-group spaceMe">

				  <span class="input-group-addon" id="basic-addon1"><strong>Class Code:</strong></span>

					<select type="text" class="form-control" id="class_id" value="" name="location_rm" aria-describedby="basic-addon1">

					<?php

					$f_id = $_SESSION['account_id'];

					$fetch_class = mysql_query("SELECT * FROM tbl_class WHERE f_id = $f_id");

					while($row_class = mysql_fetch_array($fetch_class)){

					?>

					<option value="<?php echo $row_class['class_id']?>"><?php echo $row_class['class_code']?></option>

					<?php } ?>

					</select>

				</div>

			</div>

		<div class="col-sm-8" style="padding: 2px;">

			<button class='btn btn-primary' id='btn_generate' onclick='getStudentsRanking()'><span class='fa fa-check-circle'></span> Generate Report</button>
			<button class="btn btn-default" id="btn_generate_report" onclick="printDiv('students_ranking')"><span class="fa fa-print"></span> Print Report</button>
			<a class="word-export" href="javascript:void(0)"><button class="btn btn-success" id="btn_generate_report"><span class="fa fa-download"></span> Export to Word</button></a>
		</div>

		</div>

	</div>

</form>
        <div class="panel panel-default" id="students_ranking_id">
            <div class="panel-heading">
                Top 10 Students <span id='class_name'></span>
            </div>
            <div id='students_ranking'>
			</div>
		</div>
</div>

<script>

function getStudentsRanking(){

	var class_id = $("#class_id").val();

	$("#btn_generate").prop('disabled', true);

	$("#btn_generate").html("<span class='fa fa-spinner'></span> Loading ...");

	$.ajax({

		type:"POST",
		url:"ajax/fac_getStudentsRanking.php",
		data:{
			class_id:class_id
		},
		success:function(data){

			$("#students_ranking").html(data);

			$("#btn_generate").prop('disabled', false);

			$("#btn_generate").html("<span class='fa fa-check-circle'></span> Generate Report");

		}

	});

}

function printDiv(container){



	$(".tblhead").hide();



	var printContents = document.getElementById(container).innerHTML;

	var originalContents = document.body.innerHTML;

	document.body.innerHTML = printContents;

	window.print();

	document.body.innerHTML = originalContents;



	$(".tblhead").show();

}
$("a.word-export").click(function(event) {
	$("#students_ranking").wordExport();
});


</script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="lib/FileSaver.js"></script>
<script src="lib/jquery.wordexport.js"></script>
