<?php

if (check_user_permission(['employee'])) {
	$content .= <<<HTML
	<h2>Hive Mind</h2>
	<div class="list-group">
		<a href="#" class="list-group-item">
			<h4 class="list-group-item-heading">How do I...</h4>
			<p class="list-group-item-text">I don't know how to..</p>
		</a>
		<a href="#" class="list-group-item">
			<h4 class="list-group-item-heading">When does one...</h4>
			<p class="list-group-item-text">I don't know when one might...</p>
		</a>
		<a href="#" class="list-group-item">
			<h4 class="list-group-item-heading">Why is...</h4>
			<p class="list-group-item-text">Why is it that for the...</p>
		</a>
	</div>
	<p></p>
HTML;
}