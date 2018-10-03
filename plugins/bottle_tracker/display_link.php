<?php

if ($table == 'bottling_record') {
	$links[] = <<<HTML
	<a href="?p=bottle_graph&id=$id">View Analytics</a>
HTML;
$links[] = <<<HTML
	<a href="?p=bottle&id=$id">Continue Bottling</a>
HTML;
}