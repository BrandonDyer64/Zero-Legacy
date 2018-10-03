<?php

if (check_user_permission(['employee'])) {
	$stmt = db_select('hive_mind_question',['*'],['1'=>'1'], 'ORDER BY id DESC');
	$list_content = '';
	$i = 0;
	while (($row = $stmt->fetch()) && ($i++ < 3)) {
		$user_name = maj_get_name('user', $row['user']);
		$list_content .= <<<HTML
		<a href="?p=hive_mind_question&id=${row['id']}" class="list-group-item">
			<h4 class="list-group-item-heading">${row['title']}</h4>
			<p class="list-group-item-text"><em>$user_name </em><!--<span class="glyphicon glyphicon-ok pull-right"></span>--></p>
		</a>
HTML;
	}
	$content .= <<<HTML
	<h2>Hive Mind</h2>
	<p>
        <a href="?p=hive_mind"><span class="glyphicon glyphicon-th-list"></span></a>
        &nbsp;
        <a href="?p=add&amp;t=hive_mind_question"><span class="glyphicon glyphicon-plus"></span></a>
    </p>
	<div class="list-group">
		$list_content
	</div>
	<p></p>
HTML;
}