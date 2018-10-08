<?php

if ($table == 'wiki_page') {
    $wiki_page = urlencode($row['name']);
    $links[] = <<<HTML
	     <a href="?p=wiki&w=$wiki_page">View in Wiki</a>
HTML;
}
