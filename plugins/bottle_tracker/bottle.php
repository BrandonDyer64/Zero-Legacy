<?php


if ($page == 'bottle') {
	if (!isset($id)) {
		$id = 0;
	}
	$content .= <<<HTML

	<link rel="stylesheet" type="text/css" href="plugins/bottle_tracker/button.css">
	Bottles Per: <input type="number" id="bottles_per" value="4">
	Delay: <input type="number" id="delay" value="40">
	<br><br>
	<div class="text-center">
		<a id="button" style="font-size: 6em; " class="btn btn-success">
			BOTTLE
		</a>
	</div>
	<br>
	<p>BPM: <span id="bpm"><span class="label label-default">?</span></span>&nbsp;Benchmark BPM: <span id="bpm_bench" class="label label-default">6</span></p>
	<p>Total: <span class="label label-default" id="total">0</span></p>
	<div id="progress_bar">
	</div>
	<script>
	var bottling_record_id = $id
	</script>
	<script src="plugins/bottle_tracker/script.js">
	</script>
HTML;




}





























