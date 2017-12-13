<?php

if ($table == 'client') {
	$links[] = <<<HTML
	<a href="?p=invoice&client=$id">Labor Invoice</a>
HTML;
}
