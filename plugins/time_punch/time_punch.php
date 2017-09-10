<?php

$time_punch_config = json_decode(file_get_contents("config/plugins/time_punch.json"), true);

if (check_user_permission($time_punch_config['groups'])) {
	if (!table_exists('time_punch_entry')) {
		run_remote_sql('time_punch_entry');
	}
	if (isset($_GET['time_punch'])) {
		if ($_GET['time_punch'] == 'out') {
			$stmt = db_select('time_punch_entry',['id'],['user'=>$user['id'],'time_end'=>null]);
			$row = $stmt->fetch();
			$entry_id = $row['id'];
			maj_update('time_punch_entry',['time_end'=>date("Y-m-d H:i:s"),'duration'=>''],$entry_id);
			header("Location: ?");
			exit;
		} else {
			db_insert('time_punch_entry',['user' => $user['id'],'time_start' => date("Y-m-d H:i:s")]);
			header("Location: ?");
			exit;
		}
	}
	$time_span = '';
	$stmt = db_select('time_punch_entry',['*'],['user'=>$user['id'],'time_end'=>null]);
	$clock_link = 'in';
	$row = $stmt->fetch();
	if ($row) {
		$clock_link = 'out';
		$time_span = '<span id="time_punch_time" style="font-size: 20px;">0:0:0</span><br>';
	}
	$content .= <<<HTML
	<h2>Time Punch</h2>
	<p>
		$time_span
		<a href="?time_punch=$clock_link">Clock $clock_link</a>
		 &bull;  
		<a href='?p=list&t=time_punch_entry&where={"user":${user["id"]}}'>My Clock</a>
	</p>
	<script>
	var start = new Date("${row['time_start']}");
	start = new Date(start.getTime() - start.getTimezoneOffset() * 60000);
	function pretty_time_string(num) {
   		return ( num < 10 ? "0" : "" ) + num;
	}
	setInterval(function() {
      var total_seconds = (new Date - start) / 1000;

      var hours = Math.floor(total_seconds / 3600);
      total_seconds = total_seconds % 3600;

      var minutes = Math.floor(total_seconds / 60);
      total_seconds = total_seconds % 60;

      var seconds = Math.floor(total_seconds);

      hours = pretty_time_string(hours);
      minutes = pretty_time_string(minutes);
      seconds = pretty_time_string(seconds);

      var currentTimeString = hours + ":" + minutes + ":" + seconds;

      $('#time_punch_time').text(currentTimeString);
   }, 1000);</script>
HTML;
}