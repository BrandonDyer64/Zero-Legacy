<?php

if (check_user_permission(['admin'])) {
	$help_lines = json_decode(file_get_contents("$update_host/black/help_lines.json"),true);
	$help_line = $help_lines[array_rand($help_lines)];
	$help_name = $help_line['name'];
	$help_number = $help_line['number'];
	$content .= <<<HTML
	<h3>&nbsp;</h3>
	<div class="panel panel-black">
		<div class="panel-heading">Zero Black</div>
		<div class="panel-body">
			<h4>Need Help?</h4>
			<p>Call <b>$help_number</b> for $help_name</p>
		</div>
	</div>
	<br>
	<div class="black-deck">
		<h4>Manage Black</h4>
		<p>Click <a href="?p=black">here</a> to manage your Black Tier perks</p>
	</div>
HTML;
}