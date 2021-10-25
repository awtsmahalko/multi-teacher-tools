<div id="page-wrapper">
<?php
	$f_id = $_SESSION['account_id'];
?>
	<div class="row">

		<div class="col-lg-6">

			<h3 class="page-header animated flipInX" style="border: 5px solid #286090;border-top: none;border-bottom: none;border-right: none;padding: 5px;color: #286090;"><span class="fa fa-pie-chart"></span> Graph For Dropped And Failed</h3>

		</div>

	</div>

    <div class="row" style="margin-bottom: 10px;">



		<div class="col-md-12" style="margin-bottom:10px;border-bottom: 1px solid #aaa;">

			<div class="col-md-8 spaceMe">

				<div class="input-group spaceMe">

				  <span class="input-group-addon" id="basic-addon1"><strong>Deficiency:</strong></span>
					<select type="text" class="form-control" id="deficiency" name="deficiency" aria-describedby="basic-addon1">
						<option value="0">Dropped</option>
						<option value="1">Failed</option>
					</select>

					 <span class="input-group-addon" id="basic-addon1"><strong>Semester:</strong></span>
						<select class="form-control" id="semester" name="semester" >
							<option value="First">First Semester</option>
							<option value="Second">Second Semester</option>
						</select>
					  <span class="input-group-addon" id="basic-addon1"><strong>Year:</strong></span>
						<select id="year" name="year" class="form-control col-md-3 col-xs-12">
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
			<div class="col-sm-4" style="padding: 2px;">
				<button class='btn btn-primary' id='btn_generate' onclick='generateGraph()'><span class='fa fa-check-circle'></span> Generate</button>
			</div>

		</div>

	</div>

        <div class="panel panel-default">
            <div class="panel-heading">
                Graph For Dropped And Failed
            </div>
            <div class="panel-body" style="max-width: 100%;" id="test">

			</div>
		</div>
</div>

<script>
$(document).ready(function (){

});
function generateGraph(){
	pie_graphUI();
}

function pie_graphUI(){

	var deficiency = $("#deficiency").val();
	var semester = $("#semester").val();
	var year = $("#year").val();

$.getJSON('ajax/fac_graphDroppedAndFailed.php?deficiency='+deficiency+'&semester='+semester+'&year='+year, function (data) {
	Highcharts.chart('test', {
    chart: {
        plotBackgroundColor: null,
        plotBorderWidth: null,
        plotShadow: false,
        type: 'pie'
    },
    title: {
        text: ''
    },
    tooltip: {
        pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
    },
    plotOptions: {
        pie: {
            allowPointSelect: true,
            cursor: 'pointer',
            dataLabels: {
                enabled: true,
                format: '<b>{point.name}</b>: {point.percentage:.1f} %',
                style: {
                    color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
                }
            }
        }
    },
    series: [{
        name: 'Brands',
        colorByPoint: true,
        data: data
    }]
});
});
}

</script>
<script src="lib/graph.js"></script>
<script src="lib/exporting.js"></script>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="lib/FileSaver.js"></script>
<script src="lib/jquery.wordexport.js"></script>
