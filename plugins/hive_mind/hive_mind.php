<?php

if ($page == 'hive_mind') {
    check_user_permission_force(['employee']);
    $stmt = db_select('hive_mind_question',['*'],['1'=>'1'], 'ORDER BY id DESC');
    $list_content = '';
    $i = 0;
    while (($row = $stmt->fetch()) && ($i++ < 10)) {
        $question = htmlspecialchars($row['question']);
        $user_name = maj_get_name('user', $row['user']);
        $list_content .= <<<HTML
		<a href="?p=hive_mind_question&id=${row['id']}" class="list-group-item">
			<h4 class="list-group-item-heading">${row['title']}</h4>
			<p>$question</p>
			<p class="list-group-item-text pull-right"><em>$user_name </em><!--<span class="glyphicon glyphicon-ok pull-right"></span>--></p>
			<br />
		</a>
HTML;
    }
    $content .= <<<HTML
	<p>Hello, world@</p>
HTML;
}



