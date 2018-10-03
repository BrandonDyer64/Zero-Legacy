<?php

if ($page == 'bottle_graph') {
	/*[
				{ x: 10, y: 10 },
				{ x: 20, y: 12 },
				{ x: 30, y: 8 },
				{ x: 40, y: 14 },
				{ x: 50, y: 6 },
				{ x: 60, y: 24 },
				{ x: 70, y: -4 },
				{ x: 80, y: 10 }
			]*/
	$data_points = [];
	$stmt = db_select('bottling_snapshot',['bottles'],['bottling_record'=>$id]);
	$x = 0;
	while ($row = $stmt->fetch()) {
		$color = ((int)$row['bottles'] > 3 * 5 ? 'green' : 'red');
		$data_points[] = [
			'x' => $x,
			'y' => ((int)$row['bottles'] / 5),
			'lineColor' => $color,
			'color' => $color
		];
		$x += 5;
	}
	$data_points = json_encode($data_points);
	$content .= <<<HTML
	<script type="text/javascript" src="https://canvasjs.com/assets/script/jquery.canvasjs.min.js"></script>
	<div id="chartContainer" style="height: 300px; width: 100%;"></div>
	<script>
	$(function () {
	//Better to construct options first and then pass it as a parameter
	var options = {
		title: {
			text: "Bottles Per Minute"
		},
        animationEnabled: true,
        animationDuration: 400,
        exportEnabled: true,
		data: [
		{
			type: "spline", //change it to line, area, column, pie, etc
			markerType: "none",  //"circle", "square", "cross", "none"
			dataPoints: $data_points
		}
		]
	};

	$("#chartContainer").CanvasJSChart(options);

});
	</script>
HTML;
}